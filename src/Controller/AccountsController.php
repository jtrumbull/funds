<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Accounts controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class AccountsController extends AppController {
  
  public function index () {
    $accounts = $this->Accounts->find()->contain([
      'Comments',
      'Attachments',
      'CreatedBy',
      'ModifiedBy'
    ]);
    $this->set('accounts', $accounts);
  }
  
  public function read ($id = null) {
    
    $table = $this->Accounts;
    $account = $table->get($id, [
      'contain' => [
        'Comments',
        'Attachments',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    
    $this->set('account', $account);
    
  }
  
  public function import () {
    
  }
  
  public function export () {
    
  }
  
  public function seed () {
    $table = $this->Accounts;
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
