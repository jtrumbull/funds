<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Funds
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class FundsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Comments');
    $this->addBehavior('Attachments');
    $this->addBehavior('Ownership');
    
    $this->table('funds');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    $this->hasMany('Offerings');
    
  }
  
}
