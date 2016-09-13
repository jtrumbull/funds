<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Controller task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class ControllerTask extends ScaffoldTask {
  
  public $pieces = [ 'controller' ];
  
  public function template ($piece) {
    return 'Controller' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Controller' . DS . $name . 'Controller.php';
  }
  
  public function templateData ($modelName = null, $piece = null) {
    $data = parent::templateData($modelName);
    $data['actions'] = [
      'index',
      'read',
      'import',
      'export',
      'beforeFilter',
      'isAuthorized'
    ];
    return $data;
  }
  
}
