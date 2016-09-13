<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Model task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class ModelTask extends ScaffoldTask {
  
  public $pieces = [ 'entity', 'table' ];
  
  public function template ($piece) {
    return 'Model' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    if ($piece == 'table') {
      return 'Model' . DS . $piece . DS . $name . 'Table.php';
    }
    $name = Inflector::singularize($name);
    return 'Model' . DS . $piece . DS . $name . '.php';
  }
  
}
