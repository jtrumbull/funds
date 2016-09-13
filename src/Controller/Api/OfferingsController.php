<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Offerings controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\OfferingsController as AppOfferingsController;
use Cake\Event\Event;

class OfferingsController extends AppOfferingsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Offerings;
    $offerings = $table->find();
    
    $this->set('offerings', $offerings);
    $this->set('_serialize', ['offerings']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Offerings;
    $offering = $table->newEntity($data);
    $success = $table->save($offering);
    
    if (!$success) {
      $this->set('error', 'Could not save offering');  
    }
    
    $this->set('offering', $offering);
    $this->set('_serialize', ['offering', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Offerings;
    $offering = $table->get($id);
    
    $this->set('offering', $offering);
    $this->set('_serialize', ['offering']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Offerings;
    $offering = $table->get($id);
    $offering = $table->patchEntity($offering, $data);
    $success = $table->save($offering);
    
    if (!$success) {
      $this->set('error', 'Could not save offering');  
    }
    
    $this->set('offering', $offering);
    $this->set('_serialize', ['offering', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Offerings;
    $offering = $table->get($id);
    $success = $table->delete($offering);
    
    if (!$success) {
      $this->set('error', 'Could not delete offering');  
    }
    
    $this->set('offering', $offering);
    $this->set('_serialize', ['offering', 'error']);
    
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
