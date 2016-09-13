<?php
/*
 |------------------------------------------------------------------------------
 | Model\Table: <%= $pluralTitle . "\n" %>
 |------------------------------------------------------------------------------
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class <%= $pluralName %>Table extends Table {
  
  public function initialize (array $config) {
    
    $this->table('<%= $pluralUnderscore %>');
    $this->primaryKey('id');
    $this->displayField('name');
    
    // Relationships
    
  }
  
}
