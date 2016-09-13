<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Investments controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class InvestmentsController extends AppController {
  
  public function index () {
    $investments = $this->Investments->find()->contain([
      'Offerings',
      'Offerings.Funds',
      'Accounts',
      //'Accounts.investors',
      'Comments',
      'Attachments',
    ]);
    $this->set('investments', $investments);
  }
  
  public function read ($id = null) {
    
    $table = $this->Investments;
    $investment = $table->get($id, [
      'contain' => [
        'Offerings',
        'Offerings.Funds',
        'Accounts',
        'Transactions',
        'Statements',
        'Comments',
        'Attachments',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    
    $this->set('investment', $investment);
    
  }
  
  public function import () {
    
  }
  
  public function export () {
    
  }
  
  public function statement ($id = null) {
    $table = $this->Investments;
    $investment = $table->get($id, [
      'contain' => [
        'Offerings',
        'Offerings.Funds',
        'Accounts',
        'Accounts.Investors',
        'Transactions',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    $this->set('investment', $investment);
  }
  
  public function applyDisbursements () {
    $table = $this->Investments;
    $investments = $table->find();
    $this->set('investments', $investments);
  }
  
  public function seed () {
    $table = $this->Investments;
    $records = [
      //[ 'offering_id' => 11, 'account_id' => 1, 'date' => '2014-09-03', 'amount' => 10000, 'term' => 36 ],
    ];
    foreach ($records as $record) {
      $entity = $table->newEntity($record);
      $table->save($entity);
    }
  }
  
  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->deny();
    $this->Auth->allow(['statement']);
  }
  
  public function isAuthorized ($user = null) {
    return true;
  }
  
}
