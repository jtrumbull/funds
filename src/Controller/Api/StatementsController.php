<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Statements controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\StatementsController as AppStatementsController;
use Cake\Event\Event;

class StatementsController extends AppStatementsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Statements;
    $statements = $table->find();
    
    $this->set('statements', $statements);
    $this->set('_serialize', ['statements']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Statements;
    $statement = $table->newEntity($data);
    $success = $table->save($statement);
    
    if (!$success) {
      $this->set('error', 'Could not save statement');  
    }
    
    $this->set('statement', $statement);
    $this->set('_serialize', ['statement', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Statements;
    $statement = $table->get($id);
    
    $this->set('statement', $statement);
    $this->set('_serialize', ['statement']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Statements;
    $statement = $table->get($id);
    $statement = $table->patchEntity($statement, $data);
    $success = $table->save($statement);
    
    if (!$success) {
      $this->set('error', 'Could not save statement');  
    }
    
    $this->set('statement', $statement);
    $this->set('_serialize', ['statement', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Statements;
    $statement = $table->get($id);
    $success = $table->delete($statement);
    
    if (!$success) {
      $this->set('error', 'Could not delete statement');  
    }
    
    $this->set('statement', $statement);
    $this->set('_serialize', ['statement', 'error']);
    
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
