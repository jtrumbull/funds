<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Funds controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\FundsController as AppFundsController;
use Cake\Event\Event;

class FundsController extends AppFundsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Funds;
    $funds = $table->find();
    
    $this->set('funds', $funds);
    $this->set('_serialize', ['funds']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Funds;
    $fund = $table->newEntity($data);
    $success = $table->save($fund);
    
    if (!$success) {
      $this->set('error', 'Could not save fund');  
    }
    
    $this->set('fund', $fund);
    $this->set('_serialize', ['fund', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Funds;
    $fund = $table->get($id);
    
    $this->set('fund', $fund);
    $this->set('_serialize', ['fund']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Funds;
    $fund = $table->get($id);
    $fund = $table->patchEntity($fund, $data);
    $success = $table->save($fund);
    
    if (!$success) {
      $this->set('error', 'Could not save fund');  
    }
    
    $this->set('fund', $fund);
    $this->set('_serialize', ['fund', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Funds;
    $fund = $table->get($id);
    $success = $table->delete($fund);
    
    if (!$success) {
      $this->set('error', 'Could not delete fund');  
    }
    
    $this->set('fund', $fund);
    $this->set('_serialize', ['fund', 'error']);
    
  }
  
  public function unique ($name) {
    
    $table = $this->Funds;
    $funds = $table->find()->where([ 'name' => $name ]);
    
    $this->set('unique', $funds->count() == 0);
    $this->set('_serialize', ['unique']);
    
  }
  
  protected function _prepare ($data) {
    
    // System generated fields
    
    $blacklist = [ 
      'created',
      'modified',
      'created_by',
      'modified_by',
      'comments',
      'attachments'
    ];
    
    foreach ($blacklist as $key) {
      if (array_key_exists($key, $data)) {
        unset($data[$key]);
      }
    }
    
    // Datetime formatting
    
    $datetimes = [ 
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
