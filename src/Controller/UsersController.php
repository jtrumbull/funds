<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Users controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController {
  
  public function index () {
    $users = $this->Users->find();
    $this->set('users', $users);
  }
  
  public function create () {
    
    $table = $this->Users;
    $user = $table->newEntity();
    
    $request = $this->request;
    $data = $request->data;
    
    if ($request->is(['post'])) {
      $data['role'] = 1;
      $user = $table->patchEntity($user, $data);
      $success = $table->save($user);
      if ($success) {
        return $this->redirect('/login');
      }
      $this->set('error', 'Could not save user, please check inputs and try again.');
    }
    
    $user = $this->Users->newEntity();
    $this->set('user', $user);
    
  }
  
  public function login () {
    $user = $this->Users->newEntity();
    if ($this->request->is(['post'])) {
      $user = $this->Auth->identify();
      if ($user) {
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      }
      $this->set('error', 'Username and password did not match.');
    }
    $this->set('user', $user);
  }
  
  public function seed () {
    $table = $this->Funds;
    $funds = [
    ];
    $created = [];
    foreach ($funds as $fund) {
      $entity = $table->newEntity($fund);
      if ($table->save($entity)) {
        $created[] = $entity;
      }
    }
    echo "<pre>Created " . count($created) . " funds\n";
    print_r($created);
    echo "</pre>";
    die();
  }
  
  public function logout () {
    return $this->redirect($this->Auth->logout());
  }
  
  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->deny();
    $this->Auth->allow(['login', 'create']);
  }
  
  public function isAuthorized ($user = null) {
    return true;
  }
  
}
