<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Attachments
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class AttachmentsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Ownership');
    
    $this->table('attachments');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    
  }
  
}
