<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Investors controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\InvestorsController as AppInvestorsController;
use Cake\Event\Event;

class InvestorsController extends AppInvestorsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Investors;
    $investors = $table->find();
    
    $this->set('investors', $investors);
    $this->set('_serialize', ['investors']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Investors;
    $investor = $table->newEntity($data);
    $success = $table->save($investor);
    
    if (!$success) {
      $this->set('error', 'Could not save investor');  
    }
    
    $this->set('investor', $investor);
    $this->set('_serialize', ['investor', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Investors;
    $investor = $table->get($id);
    
    $this->set('investor', $investor);
    $this->set('_serialize', ['investor']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Investors;
    $investor = $table->get($id);
    $investor = $table->patchEntity($investor, $data);
    $success = $table->save($investor);
    
    if (!$success) {
      $this->set('error', 'Could not save investor');  
    }
    
    $this->set('investor', $investor);
    $this->set('_serialize', ['investor', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Investors;
    $investor = $table->get($id);
    $success = $table->delete($investor);
    
    if (!$success) {
      $this->set('error', 'Could not delete investor');  
    }
    
    $this->set('investor', $investor);
    $this->set('_serialize', ['investor', 'error']);
    
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
