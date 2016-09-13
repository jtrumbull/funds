<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Pane task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class PaneTask extends ScaffoldTask {
  
  public $pieces = [ 'pane' ];
  
  public function template ($piece) {
    return 'Template' . DS . 'Element' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Template' . DS . 'Element' . DS . $name . DS . $piece . '.ctp';
  }
  
}
