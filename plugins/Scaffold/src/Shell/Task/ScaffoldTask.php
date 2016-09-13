<?php
/*
 |------------------------------------------------------------------------------
 | Scaffold\Shell\Task: Scaffold task
 |------------------------------------------------------------------------------
 */

namespace Scaffold\Shell\Task;

use Bake\Shell\Task\BakeTask;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

class ScaffoldTask extends BakeTask {
  
  public $tasks = [ 'Bake.BakeTemplate', 'Bake.Model' ];
  
  public $dir = 'src';
  
  public $pieces = [];
  
  /*
   |----------------------------------------------------------------------------
   | Main (entry point)
   |----------------------------------------------------------------------------
   */
  
  public function main ($name = null, $pieces = null) {
    
    $this->_model($name);
    
    if ($this->_modelName == 'Users') {
      return;
    }
    
    $pieces = ($pieces == null || $pieces == 'all') ? $this->pieces : $pieces;
    $pieces = is_array($pieces) ? $pieces : [ $pieces ];
    
    if (!$pieces) {
      echo "Nothing to bake";
      return;
    }
    
    foreach ($pieces as $piece) {
      $this->bake($piece);
    }
    
  }
  
  /*
   |----------------------------------------------------------------------------
   | Template data
   |----------------------------------------------------------------------------
   */
  
  public function templateData ($modelName = null, $piece = null) {
    
    $modelObj = $this->_modelObj;
    
    $data = $this->_inflections($modelName);
    
    $_schema = $modelObj->schema();
    $_columns = $_schema->columns();
    
    $columns = [];
    foreach ($_columns as $column) {
      
      if ($column == 'id') {
        $title = 'System id';
      } else {
        $title = ucfirst(strtolower(Inflector::humanize($column)));
      }
      
      $columns[$column] = [
        'field' => $column,
        'title' => $title
      ];
      
    }
    
    $data['_schema'] = $_schema;
    $data['_columns'] = $_columns;
    $data['columns'] = $columns;
    $data['displayField'] = $modelObj->displayField();
    
    return $data;
    
  }
  
  /*
   |----------------------------------------------------------------------------
   | Bake
   |----------------------------------------------------------------------------
   */
  
  public function bake ($piece) {
    
    $modelName = $this->_modelName;
    
    $template = $this->template($piece);
    $filename = $this->filename($modelName, $piece);
    $data = $this->templateData($modelName, $piece);
    
    $this->BakeTemplate->set('name', $modelName);
    $this->BakeTemplate->set($data);
    
    $content = $this->BakeTemplate->generate($template);
    $this->createFile(ROOT . DS . $this->dir . DS . $filename, $content);
    
    return $content;
    
  }
  
  /*
   |----------------------------------------------------------------------------
   | Set subject model
   |----------------------------------------------------------------------------
   */
  
  protected function _model ($name) {
    $name = Inflector::camelize($name);
    $modelObj = $this->_getModelObject($name);
    $this->_modelName = $name;
    $this->_modelObj = $modelObj;
  }
  
  /*
   |----------------------------------------------------------------------------
   | Get model object
   |----------------------------------------------------------------------------
   */
  
  protected function _getModelObject ($name) {
    $name = Inflector::camelize($name);
    if (TableRegistry::exists($name)) {
      $modelObj = TableRegistry::get($name);
    } else {
      $modelObj = TableRegistry::get($name, [
        'connectionName' => $this->connection
      ]);
    }
    return $modelObj;
  }
  
  /*
   |----------------------------------------------------------------------------
   | Inflections
   |----------------------------------------------------------------------------
   */
  
  protected function _inflections ($model) {
    
    $singular = Inflector::singularize($model);
    $plural = $model;
    
    $singularVar = lcfirst($singular);
    $pluralVar = lcfirst($plural);
    
    $singularUnderscore = strtolower(Inflector::underscore($singular));
    $pluralUnderscore = strtolower(Inflector::underscore($plural));
    
    $singularSlug = Inflector::humanize($singularUnderscore);
    $pluralSlug = Inflector::slug($pluralUnderscore);
    
    $singularTitle = ucfirst(strtolower(Inflector::humanize($singularUnderscore)));
    $pluralTitle = ucfirst(strtolower(Inflector::humanize($pluralUnderscore)));
    
    $singularWord = strtolower($singularTitle);
    $pluralWord = strtolower($pluralTitle);
    
    return [
      
      'singularName' => $singular,
      'pluralName' => $plural,
      
      'singularSlug' => $singularSlug,
      'pluralSlug' => $pluralSlug,
      
      'singularVar' => $singularVar,
      'pluralVar' => $pluralVar,
      
      'singularUnderscore' => $singularUnderscore,
      'pluralUnderscore' => $pluralUnderscore,
      
      'singularTitle' => $singularTitle,
      'pluralTitle' => $pluralTitle,
      
      'singularWord' => $singularWord,
      'pluralWord' => $pluralWord
      
    ];
  }
  
  /*
   |----------------------------------------------------------------------------
   | All (subcommand)
   |----------------------------------------------------------------------------
   */
  
  public function all ($arg = null) {
    $this->Model->connection = $this->connection;
    $models = $this->Model->listUnskipped();
    foreach ($models as $model) {
      $this->main($model, $arg);
    }
  }
  
  /*
   |----------------------------------------------------------------------------
   | Option parser
   |----------------------------------------------------------------------------
   */
  
  public function getOptionParser () {
    $parser = parent::getOptionParser();
    $parser->addSubcommand('all', [
      'help' => 'Bake all model files with associations and validation.'
    ]);
    return $parser;
  }

}
