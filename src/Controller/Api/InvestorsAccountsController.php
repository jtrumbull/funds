<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: InvestorsAccounts controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\InvestorsAccountsController as AppInvestorsAccountsController;
use Cake\Event\Event;

class InvestorsAccountsController extends AppInvestorsAccountsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->InvestorsAccounts;
    $investorsAccounts = $table->find();
    
    $this->set('investorsAccounts', $investorsAccounts);
    $this->set('_serialize', ['investorsAccounts']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->InvestorsAccounts;
    $investorsAccount = $table->newEntity($data);
    $success = $table->save($investorsAccount);
    
    if (!$success) {
      $this->set('error', 'Could not save investors account');  
    }
    
    $this->set('investorsAccount', $investorsAccount);
    $this->set('_serialize', ['investorsAccount', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->InvestorsAccounts;
    $investorsAccount = $table->get($id);
    
    $this->set('investorsAccount', $investorsAccount);
    $this->set('_serialize', ['investorsAccount']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->InvestorsAccounts;
    $investorsAccount = $table->get($id);
    $investorsAccount = $table->patchEntity($investorsAccount, $data);
    $success = $table->save($investorsAccount);
    
    if (!$success) {
      $this->set('error', 'Could not save investors account');  
    }
    
    $this->set('investorsAccount', $investorsAccount);
    $this->set('_serialize', ['investorsAccount', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->InvestorsAccounts;
    $investorsAccount = $table->get($id);
    $success = $table->delete($investorsAccount);
    
    if (!$success) {
      $this->set('error', 'Could not delete investors account');  
    }
    
    $this->set('investorsAccount', $investorsAccount);
    $this->set('_serialize', ['investorsAccount', 'error']);
    
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
