<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Wizzard task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class WizzardTask extends ScaffoldTask {
  
  public $pieces = [ 'select', 'map', 'review', 'summary' ];
  
  public function template ($piece) {
    return 'Template' . DS . 'Element' . DS . 'Wizzard' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Template' . DS . 'Element' . DS . $name . DS . 'Wizzard' . DS . $piece . '.ctp';
  }
  
}
