<?php
/*
 |------------------------------------------------------------------------------
 | View\Helper: Auth helper
 |------------------------------------------------------------------------------
 */

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

class AuthHelper extends Helper {
  
  protected $_user = null;
  
  public function __construct (View $View , array $config = []) {
    parent::__construct($View, $config);
    if (array_key_exists('_authUser', $View->viewVars)) {
      $this->_user = $View->viewVars['_authUser'];
    }
  }
  
  public function user ($key = null) {
    $user = $this->_user;
    if ($user && array_key_exists($key, $user)) {
      return $user[$key];
    }
    return $user;
  }
  
  public function display () {
    $username = $this->user('username');
    if (!$username) {
      return 'Guest';
    }
    return explode('@', $username)[0];
  }
  
}
