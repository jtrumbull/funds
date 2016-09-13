<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Javascript profile task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class JsPaneTask extends ScaffoldTask {
  
  public $dir = 'webroot/js/src';
  
  public $pieces = [ 'pane' ];
  
  public function template ($piece) {
    return 'Javascript' . DS . 'Component' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    $name = strtolower(Inflector::slug(Inflector::underscore($name)));
    return $name . DS . $piece . '.js';
  }
  
}
