<?php
/*
 |------------------------------------------------------------------------------
 | Controller: InvestorsAccounts controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class InvestorsAccountsController extends AppController {
  
  public function index () {
    $investorsAccounts = $this->InvestorsAccounts->find()->contain([
      'Comments',
      'Attachments',
    ]);
    $this->set('investorsAccounts', $investorsAccounts);
  }
  
  public function read ($id = null) {
    
    $table = $this->InvestorsAccounts;
    $investorsAccount = $table->get($id, [
      'contain' => [
        'Comments',
        'Attachments'
      ]
    ]);
    
    $this->set('investorsAccount', $investorsAccount);
    
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
