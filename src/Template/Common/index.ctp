<?php
/*
 |------------------------------------------------------------------------------
 | Template\Common: Index
 |------------------------------------------------------------------------------
 */

$this->layout = 'default';
$slug = $this->fetch('slug');
?>

<?= $this->heading->render() ?>

<div class="row">
  
  <div class="col-sm-9">
    <?= $this->breadcrumb->render() ?>
    <?= $this->fetch('content') ?>
  </div>
  
  <div class="col-sm-3">
    
    <?= $this->element('table/searchbox') ?>
    
    <div class="list-group" id="<?= $slug ?>-toolbar">
      
      <button class="list-group-item" data-action="create">
        <span class="fa fa-plus fa-fw"></span>
        Create
      </button>
      
      <button class="list-group-item disabled" data-action="read" disabled>
        <span class="fa fa-eye fa-fw"></span>
        Read
      </button>
      
      <button class="list-group-item disabled" data-action="update" disabled>
        <span class="fa fa-pencil-square-o fa-fw"></span>
        Update
      </button>
      
      <button class="list-group-item disabled" data-action="delete" disabled>
        <span class="fa fa-trash fa-fw"></span>
        Delete
      </button>
      
    </div>
    
    <?= $this->fetch('sidebar') ?>
    
    <div class="list-group">
      
      <a class="list-group-item" href="<?= $this->url('/'.$slug.'/import') ?>">
        <span class="fa fa-upload fa-fw"></span>
        Import
      </a>
      
      <a class="list-group-item" href="<?= $this->url('/'.$slug.'/export') ?>">
        <span class="fa fa-download fa-fw"></span>
        Export
      </a>
      
    </div>
    
  </div>
  
</div>
