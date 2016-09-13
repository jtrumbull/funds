<?php
/*
 |------------------------------------------------------------------------------
 | Model\Entity: Investment
 |------------------------------------------------------------------------------
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Investment extends Entity {
  
  protected $_accessible = [ 'id' => false, '*' => true ];
  
  protected $_hidden = [];
  
  protected $_virtual = [];
  
  protected function _setPreferredPayment () {
    $props = $this->_properties;
    $balance = $props['balance'];
    if (!array_key_exists('offering', $props)) {
      $offeringsTable = TableRegistry::get('Offerings');
      $offering = $offeringsTable->find()->where([
        'id' => $props['offering_id']
      ])->first();
      $rate = $offering->rate / 100;
    } else {
      $rate = $props['offering']['rate'] / 100;
    }
    return round(($balance * ($rate)) / 12, 2);
    
  }
  
}
