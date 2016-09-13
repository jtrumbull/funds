<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Investors accounts
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class InvestorsAccountsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->table('investors_accounts');
    $this->primaryKey('id');
    
    // Relationships
    $this->belongsTo('Investors');
    $this->belongsTo('Accounts');
    
  }
  
}
