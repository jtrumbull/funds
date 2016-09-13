<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Javascript wizzard task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class JsWizzardTask extends ScaffoldTask {
  
  public $dir = 'webroot/js/src';
  
  public $pieces = [ 'wizzard' ];
  
  public function template ($piece) {
    return 'Javascript' . DS . 'Component' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    $name = strtolower(Inflector::slug(Inflector::underscore($name)));
    return $name . DS . $piece . '.js';
  }
  
}
