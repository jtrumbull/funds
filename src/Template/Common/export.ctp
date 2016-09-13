<?php
/*
 |------------------------------------------------------------------------------
 | Template\Common: Export
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
      
    <div class="list-group">
      
      <a class="list-group-item" href="<?= $this->url('/' . $slug) ?>">
        <span class="fa fa-arrow-circle-o-left fa-fw"></span>
        Back to Index
      </a>
      
      <a class="list-group-item" href="<?= $this->url('/' . $slug . '/import') ?>">
        <span class="fa fa-upload fa-fw"></span>
        Import
      </a>
      
    </div>
    
  </div>
  
</div>
