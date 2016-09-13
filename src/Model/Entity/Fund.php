<?php
/*
 |------------------------------------------------------------------------------
 | Model\Entity: Fund
 |------------------------------------------------------------------------------
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class Fund extends Entity {
  
  protected $_accessible = [ '*' => true, 'id' => false ];
  
  protected $_hidden = [];
  
  protected $_virtual = [];
  
}
