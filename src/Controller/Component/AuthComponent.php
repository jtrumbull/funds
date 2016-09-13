<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Component: AuthComponent
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Component;

use Cake\Controller\Component\AuthComponent as CakeAuthComponent;
use Cake\Event\Event;

class AuthComponent extends CakeAuthComponent {
  
  public function startup (Event $event) {
    
    $user = $this->user();
    if ($user) {
      $controller = $this->_registry->getController();
      $controller->set('_authUser', $user);
    }
    parent::startup($event);
    
  }
  
}
