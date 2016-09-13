<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Javascript view task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class JsViewTask extends ScaffoldTask {
  
  public $dir = 'webroot/js/src';
  
  public $pieces = [ 'view' ];
  
  public function template ($piece) {
    return 'Javascript' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    $name = strtolower(Inflector::slug(Inflector::underscore($name)));
    return $name . DS . $piece . '.js';
  }
  
}
