<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Users
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Comments');
    $this->addBehavior('Attachments');
    
    $this->table('users');
    $this->primaryKey('id');
    $this->displayField('username');
    
  }
  
}
