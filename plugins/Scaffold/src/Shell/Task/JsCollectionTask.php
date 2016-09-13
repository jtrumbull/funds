<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Javascript collection task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class JsCollectionTask extends ScaffoldTask {
  
  public $dir = 'webroot/js/src';
  
  public $pieces = [ 'collection' ];
  
  public function template ($piece) {
    return 'Javascript' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    $name = strtolower(Inflector::slug(Inflector::underscore($name)));
    return $name . DS . $piece . '.js';
  }
  
}
