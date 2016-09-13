<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Offerings
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class OfferingsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Comments');
    $this->addBehavior('Attachments');
    $this->addBehavior('Ownership');
    
    $this->table('offerings');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    $this->belongsTo('Funds');
    $this->hasMany('Investments');
    
  }
  
}
