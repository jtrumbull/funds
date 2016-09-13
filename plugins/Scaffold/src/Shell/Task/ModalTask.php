<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Modal task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class ModalTask extends ScaffoldTask {
  
  public $pieces = [ 'create', 'read', 'update', 'delete' ];
  
  public function template ($piece) {
    return 'Template' . DS . 'Element' . DS . 'Modal' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Template' . DS . 'Element' . DS . $name . DS . 'Modal' . DS . $piece . '.ctp';
  }
  
}
