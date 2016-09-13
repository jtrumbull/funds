<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Javascript form task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class JsFormTask extends ScaffoldTask {
  
  public $dir = 'webroot/js/src';
  
  public $pieces = [ 'create', 'update' ];
  
  public function template ($piece) {
    return 'Javascript' . DS . 'Component' . DS . 'Form' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    $name = strtolower(Inflector::slug(Inflector::underscore($name)));
    return $name . DS . 'form' . DS . $piece . '.js';
  }
  
}
