<?php
/*
 |------------------------------------------------------------------------------
 | Model\Entity: Statement
 |------------------------------------------------------------------------------
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Statement extends Entity {
  
  protected $_accessible = [ 'id' => false, '*' => true ];
  
  protected $_hidden = [];
  
  protected $_virtual = [];
  
}
