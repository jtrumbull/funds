<?php
/*
 |------------------------------------------------------------------------------
 | Model\Entity: <%= $singularTitle . "\n" %>
 |------------------------------------------------------------------------------
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

class <%= $singularName %> extends Entity {
  
  protected $_accessible = [ 'id' => false, '*' => true ];
  
  protected $_hidden = [];
  
  protected $_virtual = [];
  
}
