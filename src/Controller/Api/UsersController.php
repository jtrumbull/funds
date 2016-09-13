<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: Users controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\UsersController as AppUsersController;
use Cake\Event\Event;

class UsersController extends AppUsersController {
  
  public function index () {
    
    $request->allowMethod(['get']);
    
    $table = $this->Users;
    $users = $table->find();
    
    $this->set('users', $users);
    $this->set('_serialize', ['users']);
    
  }
  
  public function create () {
    
    $request = $this->request;
    $request->allowMethod(['post']);
    $data = $request->data;
    
    $table = $this->Users;
    $user = $table->newEntity($data);
    $success = $table->save($user);
    
    if (!$success) {
      $this->set('error', 'Could not save user');  
    }
    
    $this->set('user', $user);
    $this->set('_serialize', ['user', 'error']);
    
  }
  
  public function read ($id = null) {
    
    $request->allowMethod(['get']);
    
    $table = $this->Users;
    $user = $table->get($id);
    
    $this->set('user', $user);
    $this->set('_serialize', ['user']);
    
  }
  
  public function update ($id = null) {
    
    $request = $this->request;
    $request->allowMethod(['post', 'put', 'patch']);
    $data = $request->data;
    
    $table = $this->Users;
    $user = $table->get($data);
    $user = $table->patchEntity($user, $data);
    $success = $table->save($user);
    
    if (!$success) {
      $this->set('error', 'Could not save user');  
    }
    
    $this->set('user', $user);
    $this->set('_serialize', ['user', 'error']);
    
  }
  
  public function delete ($id = null) {
    
    $this->request->allowMethod(['post', 'delete']);
    
    $table = $this->Users;
    $user = $table->get($id);
    $success = $table->delete($user);
    
    if (!$success) {
      $this->set('error', 'Could not delete user');  
    }
    
    $this->set('user', $user);
    $this->set('_serialize', ['user', 'error']);
    
  }
  
  public function usernameExists ($username = null) {
    
    $table = $this->Users;
    $users = $table->find()->where([ 'username' => $username ]);
    
    $this->set('exists', $users->count() > 0);
    
  }
  
  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->allow('usernameExists');
  }
  
  public function isAuthorized ($user = null) {
    return parent::isAuthorized($user);
  }
  
}
