<?php
/*
 |------------------------------------------------------------------------------
 | Model\Entity: Offering
 |------------------------------------------------------------------------------
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class Offering extends Entity {
  
  protected $_accessible = [ '*' => true, 'id' => false ];
  
  protected $_hidden = [];
  
  protected $_virtual = [];
  
}
