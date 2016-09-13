<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Javascript template task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class JsTemplateTask extends ScaffoldTask {
  
  public $dir = 'webroot/js/src';
  
  public $pieces = [ 'index', 'read', 'import', 'export' ];
  
  public function template ($piece) {
    return 'Javascript' . DS . 'Template' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    $name = strtolower(Inflector::slug(Inflector::underscore($name)));
    return $name . DS . 'view' . DS. $piece . '.js';
  }
  
}
