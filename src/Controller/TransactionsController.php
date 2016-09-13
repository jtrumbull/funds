<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Transactions controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class TransactionsController extends AppController {
  
  public function index () {
    $transactions = $this->Transactions->find()->contain([
      'Comments',
      'Attachments',
      'CreatedBy',
      'ModifiedBy'
    ]);
    $this->set('transactions', $transactions);
  }
  
  public function read ($id = null) {
    
    $table = $this->Transactions;
    $transaction = $table->get($id, [
      'contain' => [
        'Comments',
        'Attachments',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    
    $this->set('transaction', $transaction);
    
  }
  
  public function import () {
    
  }
  
  public function export () {
    
  }
  
  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->deny();
    $this->Auth->allow([]);
  }
  
  public function isAuthorized ($user = null) {
    return true;
  }
  
}
