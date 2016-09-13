<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Profile task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class ProfileTask extends ScaffoldTask {
  
  public $pieces = [ 'profile' ];
  
  public function template ($piece) {
    return 'Template' . DS . 'Element' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Template' . DS . 'Element' . DS . $name . DS . $piece . '.ctp';
  }
  
}
