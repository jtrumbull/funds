<?php
/*
 |------------------------------------------------------------------------------
 | Model\Entity: Attachment
 |------------------------------------------------------------------------------
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Attachment extends Entity {
  
  protected $_accessible = [ 'id' => false, '*' => true ];
  
  protected $_hidden = [];
  
  protected $_virtual = [];
  
}
