<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Table task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class TableTask extends ScaffoldTask {
  
  public $pieces = [ 'table' ];
  
  public function template ($piece) {
    return 'Template' . DS . 'Element' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Template' . DS . 'Element' . DS . $name . DS .'table.ctp';
  }
  
}
