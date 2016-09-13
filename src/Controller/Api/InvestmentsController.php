<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Investments controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\InvestmentsController as AppInvestmentsController;
use Cake\Event\Event;

class InvestmentsController extends AppInvestmentsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Investments;
    $investments = $table->find();
    
    $this->set('investments', $investments);
    $this->set('_serialize', ['investments']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Investments;
    $investment = $table->newEntity($data);
    $success = $table->save($investment);
    
    if (!$success) {
      $this->set('error', 'Could not save investment');  
    }
    
    $this->set('investment', $investment);
    $this->set('_serialize', ['investment', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Investments;
    $investment = $table->get($id);
    
    $this->set('investment', $investment);
    $this->set('_serialize', ['investment']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Investments;
    $investment = $table->get($id);
    $investment = $table->patchEntity($investment, $data);
    $success = $table->save($investment);
    
    if (!$success) {
      $this->set('error', 'Could not save investment');  
    }
    
    $this->set('investment', $investment);
    $this->set('_serialize', ['investment', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Investments;
    $investment = $table->get($id);
    $success = $table->delete($investment);
    
    if (!$success) {
      $this->set('error', 'Could not delete investment');  
    }
    
    $this->set('investment', $investment);
    $this->set('_serialize', ['investment', 'error']);
    
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
