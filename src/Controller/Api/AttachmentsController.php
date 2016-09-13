<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Attachments controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\AttachmentsController as AppAttachmentsController;
use Cake\Event\Event;

class AttachmentsController extends AppAttachmentsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Attachments;
    $attachments = $table->find();
    
    $this->set('attachments', $attachments);
    $this->set('_serialize', ['attachments']);
    
  }
  
  public function create () {
    
    $this->loadComponent('Attachment');
    $file = $_FILES['attachment'];
    $path = $this->Attachment->upload($file);
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    $data['name'] = $file['name'];
    $data['size'] = $file['size'];
    
    $table = $this->Attachments;
    $attachment = $table->newEntity($data);
    $success = $table->save($attachment);
    
    if (!$success) {
      $this->set('error', 'Could not save attachment');  
    }
    
    $this->set('attachment', $attachment);
    $this->set('_serialize', ['attachment', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Attachments;
    $attachment = $table->get($id);
    
    $this->set('attachment', $attachment);
    $this->set('_serialize', ['attachment']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Attachments;
    $attachment = $table->get($id);
    $attachment = $table->patchEntity($attachment, $data);
    $success = $table->save($attachment);
    
    if (!$success) {
      $this->set('error', 'Could not save attachment');  
    }
    
    $this->set('attachment', $attachment);
    $this->set('_serialize', ['attachment', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Attachments;
    $attachment = $table->get($id);
    $success = $table->delete($attachment);
    
    if (!$success) {
      $this->set('error', 'Could not delete attachment');  
    }
    
    $this->set('attachment', $attachment);
    $this->set('_serialize', ['attachment', 'error']);
    
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
