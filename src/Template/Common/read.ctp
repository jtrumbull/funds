<?php
/*
 |------------------------------------------------------------------------------
 | Template\Common: Read
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
  
  <div class="col-sm-3" id="<?= $slug ?>-toolbar">
    
    <div class="list-group">
      
      <a class="list-group-item" href="<?= $this->url('/' . $slug) ?>">
        <span class="fa fa-arrow-circle-o-left fa-fw"></span>
        Back to Index
      </a>
      
      <button class="list-group-item" data-action="update">
        <span class="fa fa-pencil-square-o fa-fw"></span>
        Update
      </button>
      
      <button class="list-group-item" data-action="delete">
        <span class="fa fa-trash fa-fw"></span>
        Delete
      </button>
      
    </div>
    
    <?= $this->fetch('sidebar') ?>
    
  </div>
  
</div>

<?= $this->tabs->render() ?>