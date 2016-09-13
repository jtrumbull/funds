<?php
/*
 |------------------------------------------------------------------------------
 | Model\Entity: Comment
 |------------------------------------------------------------------------------
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Comment extends Entity {
  
  protected $_accessible = [ 'id' => false, '*' => true ];
  
  protected $_hidden = [];
  
  protected $_virtual = [];
  
}
