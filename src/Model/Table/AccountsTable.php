<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Accounts
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class AccountsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Comments');
    $this->addBehavior('Attachments');
    $this->addBehavior('Ownership');
    
    $this->table('accounts');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    $this->belongsToMany('Investors', [
      'joinTable' => 'investors_accounts'
    ]);
    
  }
  
}
