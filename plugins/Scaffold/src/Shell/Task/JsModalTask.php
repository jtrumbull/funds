<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Javascript modal task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class JsModalTask extends ScaffoldTask {
  
  public $dir = 'webroot/js/src';
  
  public $pieces = [ 'create', 'read', 'update', 'delete' ];
  
  public function template ($piece) {
    return 'Javascript' . DS . 'Component' . DS . 'Modal' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    $name = strtolower(Inflector::slug(Inflector::underscore($name)));
    return $name . DS . 'modal' . DS . $piece . '.js';
  }
  
}
