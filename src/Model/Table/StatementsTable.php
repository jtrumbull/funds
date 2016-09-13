<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Statements
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class StatementsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Ownership');
    
    $this->table('statements');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    $this->belongsTo('Investments');
    
  }
  
}
