<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Investors
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class InvestorsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Comments');
    $this->addBehavior('Attachments');
    $this->addBehavior('Ownership');
    
    $this->table('investors');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    $this->belongsToMany('Accounts', [
      'joinTable' => 'investors_accounts'
    ]);
    
  }
  
}
