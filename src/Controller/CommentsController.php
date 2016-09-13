<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Comments controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class CommentsController extends AppController {
  
  public function index () {
    $comments = $this->Comments->find()->contain([
      'Comments',
      'Attachments',
      'CreatedBy',
      'ModifiedBy'
    ]);
    $this->set('comments', $comments);
  }
  
  public function read ($id = null) {
    
    $table = $this->Comments;
    $comment = $table->get($id, [
      'contain' => [
        'Comments',
        'Attachments',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    
    $this->set('comment', $comment);
    
  }
  
  public function import () {
    
  }
  
  public function export () {
    
  }
  
  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->deny();
    $this->Auth->allow([]);
  }
  
  public function isAuthorized ($user = null) {
    return true;
  }
  
}
