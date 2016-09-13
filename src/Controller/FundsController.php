<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Funds controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class FundsController extends AppController {
  
  public function index () {
    $funds = $this->Funds->find()->contain([
      'Comments',
      'Attachments',
      'CreatedBy',
      'ModifiedBy'
    ]);
    $this->set('funds', $funds);
  }
  
  public function read ($id = null) {
    
    $table = $this->Funds;
    $fund = $table->get($id, [
      'contain' => [
        'Comments',
        'Attachments',
        'Offerings',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    
    $this->set('fund', $fund);
    
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
