<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Transactions
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class TransactionsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Comments');
    $this->addBehavior('Attachments');
    $this->addBehavior('Ownership');
    
    $this->table('transactions');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    $this->belongsTo('Investments');
    
  }
  
}
