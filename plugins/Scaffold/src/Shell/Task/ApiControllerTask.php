<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: API Controller task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Cake\Utility\Inflector;
use Scaffold\Shell\Task\ScaffoldTask;

class ApiControllerTask extends ScaffoldTask {
  
  public $pieces = [ 'controller' ];
  
  public function template ($piece) {
    return 'Controller' . DS . 'Api' . DS . $piece;
  }
  
  public function filename ($name, $piece = null) {
    return 'Controller' . DS . 'Api' . DS . $name . 'Controller.php';
  }
  
  public function templateData ($modelName = null, $pieces = null) {
    $data = parent::templateData($modelName, $pieces);
    $data['actions'] = [
      'index',
      'create',
      'read',
      'update',
      'delete',
      '_prepare',
      'beforeFilter',
      'isAuthorized'
    ];
    return $data;
  }
  
}
