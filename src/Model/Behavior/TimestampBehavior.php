<?php
/*
 |------------------------------------------------------------------------------
 | Model\Behavior: Timestamp
 |------------------------------------------------------------------------------
 */

namespace App\Model\Behavior;

use Cake\ORM\Behavior\TimestampBehavior as CakeTimestampBehavior;

class TimestampBehavior extends CakeTimestampBehavior {
  
  public function initialize (array $config) {
    
    $createdBy = array_key_exists('createdBy', $config) ? $config['createdBy'] : true;
    $this->config('createdBy', $createdBy);
    if ($createdBy) {
      $this->_table->belongsTo('CreatedBy', [
        'className' => 'Users',
        'foreignKey' => 'created_by_id',
        'propertyName' => 'created_by'
      ]);
    }
    
    $modifiedBy = array_key_exists('modifiedBy', $config) ? $config['modifiedBy'] : true;
    $this->config('modifiedBy', $modifiedBy);
    if ($modifiedBy) {
      $this->_table->belongsTo('ModifiedBy', [
        'className' => 'Users',
        'foreignKey' => 'modified_by_id',
        'propertyName' => 'modified_by'
      ]);
    }
    
  }
  
  protected function _updateField($entity, $field, $refreshTimestamp) {
    parent::_updateField($entity, $field, $refreshTimestamp);
    if ($field == 'created' && $this->config('createdBy')) {
       $entity->set('created_by_id', 2);
    } elseif ($field == 'modified' && $this->config('modifiedBy')) {
       $entity->set('modified_by_id', 2);
    }
  }
  
}
