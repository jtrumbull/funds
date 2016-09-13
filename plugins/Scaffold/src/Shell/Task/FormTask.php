<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Form task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class FormTask extends ScaffoldTask {
  
  public $pieces = [ 'create', 'update' ];
  
  public function template ($piece) {
    return 'Template' . DS . 'Element' . DS . 'Form' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Template' . DS . 'Element' . DS . $name . DS . 'Form' . DS . $piece . '.ctp';
  }
  
}
