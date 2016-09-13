<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Template task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class TemplateTask extends ScaffoldTask {
  
  public $pieces = [ 'index', 'read', 'import', 'export' ];
  
  public function template ($piece) {
    return 'Template' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Template' . DS . $name . DS . $piece . '.ctp';
  }
  
}
