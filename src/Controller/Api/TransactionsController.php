<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Transactions controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\TransactionsController as AppTransactionsController;
use Cake\Event\Event;

class TransactionsController extends AppTransactionsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Transactions;
    $transactions = $table->find();
    
    $this->set('transactions', $transactions);
    $this->set('_serialize', ['transactions']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Transactions;
    $transaction = $table->newEntity($data);
    $success = $table->save($transaction);
    
    if (!$success) {
      $this->set('error', 'Could not save transaction');  
    }
    
    $this->set('transaction', $transaction);
    $this->set('_serialize', ['transaction', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Transactions;
    $transaction = $table->get($id);
    
    $this->set('transaction', $transaction);
    $this->set('_serialize', ['transaction']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Transactions;
    $transaction = $table->get($id);
    $transaction = $table->patchEntity($transaction, $data);
    $success = $table->save($transaction);
    
    if (!$success) {
      $this->set('error', 'Could not save transaction');  
    }
    
    $this->set('transaction', $transaction);
    $this->set('_serialize', ['transaction', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Transactions;
    $transaction = $table->get($id);
    $success = $table->delete($transaction);
    
    if (!$success) {
      $this->set('error', 'Could not delete transaction');  
    }
    
    $this->set('transaction', $transaction);
    $this->set('_serialize', ['transaction', 'error']);
    
  }
  
  protected function _prepare ($data) {
    
    // System generated fields
    
    $blacklist = [ 
      'created',
      'modified',
      'created_by',
      'modified_by' 
    ];
    
    foreach ($blacklist as $key) {
      if (array_key_exists($key, $data)) {
        unset($data[$key]);
      }
    }
    
    // Datetime formatting
    
    $datetimes = [
      'created',
      'modified' 
    ];
    
    foreach ($datetimes as $key) {
      if (array_key_exists($key, $data) && $data[$key]) {
        $data[$key] = date("Y-m-d H:i:s", $data[$key]);
      }
    }
    
    // Date formatting
    
    $dates = [
    ];
    
    foreach ($dates as $key) {
      if (array_key_exists($key, $data) && $data[$key]) {
        $data[$key] = date("Y-m-d H:i:s", $data[$key]);
      }
    }
    
    return $data;
    
  }
  
  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->allow();
  }
  
  public function isAuthorized ($user = null) {
    return parent::isAuthorized($user);
  }
  
}
