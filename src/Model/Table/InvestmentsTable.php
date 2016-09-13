<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Investments
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class InvestmentsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Comments');
    $this->addBehavior('Attachments');
    $this->addBehavior('Ownership');
    
    $this->table('investments');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    $this->belongsTo('Offerings');
    $this->belongsTo('Accounts');
    $this->hasMany('Transactions');
    $this->hasMany('Statements');
    
  }
  
}
