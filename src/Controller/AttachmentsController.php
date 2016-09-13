<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Attachments controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class AttachmentsController extends AppController {
  
  public function index () {
    $attachments = $this->Attachments->find()->contain([
      'Comments',
      'Attachments',
      'CreatedBy',
      'ModifiedBy'
    ]);
    $this->set('attachments', $attachments);
  }
  
  public function read ($id = null) {
    
    $table = $this->Attachments;
    $attachment = $table->get($id, [
      'contain' => [
        'Comments',
        'Attachments',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    
    $this->set('attachment', $attachment);
    
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
