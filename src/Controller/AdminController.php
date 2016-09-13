<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Admin controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;
ini_set('memory_limit','30M');

use DateInterval;
use DatePeriod;
use DateTime;
use DateTimeImmutable;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class AdminController extends AppController {
  
  /*
   |----------------------------------------------------------------------------
   | Sync cached calculated fields
   |----------------------------------------------------------------------------
   */
  
  public function syncCacheFields () {
    
    $investmentsTable = TableRegistry::get('Investments');
    $offeringsTable = TableRegistry::get('Offerings');
    $fundsTable = TableRegistry::get('Funds');
    $accountsTable = TableRegistry::get('Accounts');
    $investorsTable = TableRegistry::get('Investors');
    
    $fundInvestmentsCount = [];
    $fundInvestmentsAmount = [];
    $fundInvestmentsBalance = [];
    
    $offerings = $offeringsTable->find();
    foreach ($offerings as $offering) {
      $query = $investmentsTable->find()->where([ 'offering_id' => $offering->id ]);
      $count = $query->count();
      $amount = array_sum(Hash::extract($query->toArray(), '{n}.amount'));
      $balance = array_sum(Hash::extract($query->toArray(), '{n}.balance'));
      
      $offering->investments_count = $count;
      $offering->investments_amount = $amount;
      $offering->investments_balance = $balance;
      $offeringsTable->save($offering);
      
      if (!array_key_exists($offering->fund_id, $fundInvestmentsCount)) {
        $fundInvestmentsCount[$offering->fund_id] = 0;
      }
      if (!array_key_exists($offering->fund_id, $fundInvestmentsAmount)) {
        $fundInvestmentsAmount[$offering->fund_id] = 0;
      }
      if (!array_key_exists($offering->fund_id, $fundInvestmentsBalance)) {
        $fundInvestmentsBalance[$offering->fund_id] = 0;
      }
      $fundInvestmentsCount[$offering->fund_id] += $count;
      $fundInvestmentsAmount[$offering->fund_id] += $amount;
      $fundInvestmentsBalance[$offering->fund_id] += $balance;
    }
    
    $funds = $fundsTable->find();
    foreach ($funds as $fund) {
      if (array_key_exists($fund->id, $fundInvestmentsCount)) {
        $fund->investments_count = $fundInvestmentsCount[$fund->id];
      } else {
        $fund->investments_count = 0;
      }
      if (array_key_exists($fund->id, $fundInvestmentsAmount)) {
        $fund->investments_amount = $fundInvestmentsAmount[$fund->id];
      } else {
        $fund->investments_amount = 0;
      }
      if (array_key_exists($fund->id, $fundInvestmentsBalance)) {
        $fund->investments_balance = $fundInvestmentsBalance[$fund->id];
      } else {
        $fund->investments_balance = 0;
      }
      $fundsTable->save($fund);
    }
    
    $investorInvestmentsCount = [];
    $investorInvestmentsAmount = [];
    $investorInvestmentsBalance = [];
    
    $accounts = $accountsTable->find()->contain('Investors');
    foreach ($accounts as $account) {
      $query = $investmentsTable->find()->where([ 'account_id' => $account->id ]);
      $count = $query->count();
      $amount = array_sum(Hash::extract($query->toArray(), '{n}.amount'));
      $balance = array_sum(Hash::extract($query->toArray(), '{n}.balance'));
      
      $account->investments_count = $count;
      $account->investments_amount = $amount;
      $account->investments_balance = $balance;
      $accountsTable->save($account);
      
      foreach ($account->investors as $investor) {
        if (!array_key_exists($investor->id, $investorInvestmentsCount)) {
          $investorInvestmentsCount[$investor->id] = 0;
        }
        if (!array_key_exists($investor->id, $investorInvestmentsAmount)) {
          $investorInvestmentsAmount[$investor->id] = 0;
        }
        if (!array_key_exists($investor->id, $investorInvestmentsBalance)) {
          $investorInvestmentsBalance[$investor->id] = 0;
        }
        $investorInvestmentsCount[$investor->id] += $count;
        $investorInvestmentsAmount[$investor->id] += $amount;
        $investorInvestmentsBalance[$investor->id] += $balance;
      }
    }
    
    $investors = $investorsTable->find();
    foreach ($investors as $investor) {
      if (array_key_exists($investor->id, $investorInvestmentsCount)) {
        $investor->investments_count = $investorInvestmentsCount[$investor->id];
      } else {
        $investor->investments_count = 0;
      }
      if (array_key_exists($investor->id, $investorInvestmentsAmount)) {
        $investor->investments_amount = $investorInvestmentsAmount[$investor->id];
      } else {
        $investor->investments_amount = 0;
      }
      if (array_key_exists($investor->id, $investorInvestmentsBalance)) {
        $investor->investments_balance = $investorInvestmentsBalance[$investor->id];
      } else {
        $investor->investments_balance = 0;
      }
      $investorsTable->save($investor);
    }
    
    die('Complete');
  }
  
  /*
   |----------------------------------------------------------------------------
   | Sync transactions
   |----------------------------------------------------------------------------
   */
  
  public function syncTransactions () {
    
    $investmentsTable = TableRegistry::get('Investments');
    $transactionsTable = TableRegistry::get('Transactions');
    
    $investments = $investmentsTable->find()->contain(['Transactions', 'Offerings']);
    foreach ($investments as $investment) {
      
      $transactions = [];
      $investment->status = 0;
      $today = new DateTime();
      $today = new DateTimeImmutable($today->format('Y-m-d'));
      
      $date = new DateTimeImmutable($investment->date);
      $day = (int) $date->format('d');
      $amount = $investment->amount;
      $term = $investment->term;
      $rate = $investment->offering->rate / 100;
      $balance = $amount;
      $payment = round(($balance * ($rate)) / 12, 2);
      $maturity = $date->add(new DateInterval('P' . $term . 'M'));
      $balance = $amount;
      
      $end = ($maturity <= $today) ? $maturity : $today;
      
      // Add initial investment
      $transaction = [
        'type' => 0,
        'date' => $date->format('Y-m-d'),
        'amount' => $investment->amount
      ];
      $transactions[] = $transaction;
      
      $date = new DateTimeImmutable($date->format('Y-m-t'));
      
      if ($today > $date) {
        $investment->status = 1;
      }
      
      // Add prorated first payment
      $transaction = [
        'type' => $day > 1 ? 1 : 2,
        'date' => $date->format('Y-m-t'),
        'amount' => $day > 1 ? round((($payment / 30) * (30 - $day)), 2) : $payment
      ];
      $transactions[] = $transaction;
      
      // Format existing drawdowns
      $drawdowns = [];
      foreach ($investment->transactions as $transaction) {
        if ($transaction->type == 3) {
          $date = new DateTimeImmutable($transaction->date);
          $dateKey = $date->format('Y-m');
          $drawdowns[$dateKey] = [
            'date' => $date->format('Y-m-t'),
            'amount' => $transaction->amount
          ];
        }
      }
      
      // Delete existing transactions
      $transactionsTable->deleteAll([ 'investment_id' => $investment->id ]);
      
      $date = $date->add(new DateInterval('P1D'));
      $range = new DatePeriod($date, new DateInterval('P1M'), $end);
      foreach ($range as $date) {
        
        $dateKey = $date->format('Y-m');
        
        if (array_key_exists($dateKey, $drawdowns)) {
          
          $drawdown = $drawdowns[$dateKey];
          $date = new DateTimeImmutable($drawdown['date']);
          $amount = $drawdown['amount'];
          $day = (int) $date->format('d');
          
          // Add fitst half prorated payment
          if ($day > 1) {
            $transactions[] = [
              'type' => 1,
              'date' => $date->format('Y-m-d'),
              'amount' => Round(($payment / 30) * $day, 2)
            ];
          }
          
          // Add drawdown
          $transactions[] = [
            'type' => 3,
            'date' => $date->format('Y-m-d'),
            'amount' => $amount
          ];
          
          $balance = $balance - $amount;
          
          // Add second half prorated payment
          $transactions[] = [
            'type' => $day > 1 ? 1 : 2,
            'date' => $date->format('Y-m-t'),
            'amount' => $day > 1 ? round((($payment / 30) * (30 - $day)), 2) : $payment
          ];
          
          $payment = round(($balance * ($rate)) / 12, 2);
          
          if ($balance == 0) {
            $investment->status = 2;
          }
          
          continue;
        }
        
        $transactions[] = [ // Regular payment
          'type' => 2,
          'date' => $date->format('Y-m-t'),
          'amount' => $payment
        ];
        
      }
      
      $investment->balance = $balance;
      $investment->transactions = $transactions;
      $investment = $investmentsTable->patchEntity(
        $investment,
        [ 'transactions' => $transactions ],
        [ 'associated' => ['Transactions'] ]
      );
      
      $success = $investmentsTable->save($investment);
      
    }
    
  }
  
  /*
   |----------------------------------------------------------------------------
   | Sync statements
   |----------------------------------------------------------------------------
   */
  
  public function syncStatements () {
    
    $this->loadComponent('Pdf');
    $investmentsTable = TableRegistry::get('Investments');
    $investment = $investmentsTable->get(1);
    
    $this->Pdf->template('statement');
    $this->Pdf->entity($investment);
    return $this->Pdf->render();
    
    $investmentsTable = TableRegistry::get('Investments');
    $statementsTable = TableRegistry::get('Statements');
    $investments = $investmentsTable->find();
    
    foreach ($investments as $investment) {
      
      $start = new DateTimeImmutable($investment->date);
      $today = new DateTimeImmutable((new DateTime())->format('Y-m-t'));
      $today = $today->sub(new DateInterval('P1M'));
      $term = $investment->term;
      $maturity = $start->add(new DateInterval('P' . $term . 'M'));
      if ($start > $today) {
        continue;
      }
      $end = $maturity < $today ? $maturity : $today;
      $interval = new DateInterval('P1M');
      $range = new DatePeriod($start, new DateInterval('P1M'), $end);
      
      $statementsTable->deleteAll([ 'investment_id' => $investment->id ]);
      
      foreach ($range as $date) {
        
        $dateKey = $date->format('F, Y');
        
        $statement = $statementsTable->newEntity();
        $statement->investment_id = $investment->id;
        $statement->name = $dateKey;
        
        $statementsTable->save($statement);
        
      }
      
      die();
      
    }
    
  }
  
  public function populateTimestamps () {
    
    $tables = [
      TableRegistry::get('Funds'),
      TableRegistry::get('Offerings'),
      TableRegistry::get('Investors'),
      TableRegistry::get('Accounts'),
      TableRegistry::get('Investments'),
      TableRegistry::get('Transactions'),
      TableRegistry::get('Comments'),
      TableRegistry::get('Attachments'),
      TableRegistry::get('Statements'),
    ];
    
    $fields = [
      //'created' => '2016-09-06 17:56:05',
      //'modified' => '2016-09-06 17:56:05',
      'created_by_id' => 2,
      'modified_by_id' => 2
    ];
    
    foreach ($tables as $table) {
      $entities = $table->find();
      foreach ($entities as $entity) {
        foreach ($fields as $field => $value) {
          //if (!$entity->{$field}) {
            $entity->{$field} = $value;
          //}
        }
        $table->save($entity);
      }
    }
    
  }
  
  public function populatePreferredPayments () {
    $investmentsTable = TableRegistry::get('Investments');
    $investments = $investmentsTable->find();//->contain([ 'Offerings' ]);
    foreach ($investments as $investment) {
      $investment->preferred_payment = $investment->preferred_payment;
      $investmentsTable->save($investment);
    }
    die('Complete');
  }
  
}
