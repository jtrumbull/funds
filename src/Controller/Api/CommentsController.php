<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Comments controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\CommentsController as AppCommentsController;
use Cake\Event\Event;

class CommentsController extends AppCommentsController {
  
  public function index () {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Comments;
    $comments = $table->find();
    
    $this->set('comments', $comments);
    $this->set('_serialize', ['comments']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Comments;
    $comment = $table->newEntity($data);
    $success = $table->save($comment);
    
    if (!$success) {
      $this->set('error', 'Could not save comment');  
    }
    
    $this->set('comment', $comment);
    $this->set('_serialize', ['comment', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['get']);
    
    $table = $this->Comments;
    $comment = $table->get($id);
    
    $this->set('comment', $comment);
    $this->set('_serialize', ['comment']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $this->_prepare($request->data);
    
    $table = $this->Comments;
    $comment = $table->get($id);
    $comment = $table->patchEntity($comment, $data);
    $success = $table->save($comment);
    
    if (!$success) {
      $this->set('error', 'Could not save comment');  
    }
    
    $this->set('comment', $comment);
    $this->set('_serialize', ['comment', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'delete']);
    
    $table = $this->Comments;
    $comment = $table->get($id);
    $success = $table->delete($comment);
    
    if (!$success) {
      $this->set('error', 'Could not delete comment');  
    }
    
    $this->set('comment', $comment);
    $this->set('_serialize', ['comment', 'error']);
    
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
