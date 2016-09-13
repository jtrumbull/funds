<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Offerings controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class OfferingsController extends AppController {
  
  public function index () {
    $offerings = $this->Offerings->find()->contain([
      'Comments',
      'Attachments',
      'CreatedBy',
      'ModifiedBy'
    ]);
    $this->set('offerings', $offerings);
  }
  
  public function read ($id = null) {
    
    $table = $this->Offerings;
    $offering = $table->get($id, [
      'contain' => [
        'Comments',
        'Attachments',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    
    $this->set('offering', $offering);
    
  }
  
  public function import () {
    
  }
  
  public function export () {
    
  }
  
  public function seed () {
    $table = $this->Offerings;
    $records = [
    ];
    foreach ($records as $record) {
      $entity = $table->newEntity($record);
      $table->save($entity);
    }
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
