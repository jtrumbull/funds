<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Accounts controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\AccountsController as AppAccountsController;
use Cake\Event\Event;

class AccountsController extends AppAccountsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Accounts;
    $accounts = $table->find();
    
    $this->set('accounts', $accounts);
    $this->set('_serialize', ['accounts']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Accounts;
    $account = $table->newEntity($data);
    $success = $table->save($account);
    
    if (!$success) {
      $this->set('error', 'Could not save account');  
    }
    
    $this->set('account', $account);
    $this->set('_serialize', ['account', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Accounts;
    $account = $table->get($id);
    
    $this->set('account', $account);
    $this->set('_serialize', ['account']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Accounts;
    $account = $table->get($id);
    $account = $table->patchEntity($account, $data);
    $success = $table->save($account);
    
    if (!$success) {
      $this->set('error', 'Could not save account');  
    }
    
    $this->set('account', $account);
    $this->set('_serialize', ['account', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Accounts;
    $account = $table->get($id);
    $success = $table->delete($account);
    
    if (!$success) {
      $this->set('error', 'Could not delete account');  
    }
    
    $this->set('account', $account);
    $this->set('_serialize', ['account', 'error']);
    
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
