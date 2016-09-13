<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: Comments
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class CommentsTable extends Table {
  
  public function initialize (array $config) {
    
    $this->addBehavior('Timestamp');
    $this->addBehavior('Attachments');
    $this->addBehavior('Ownership');
    
    $this->table('comments');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    
  }
  
}
