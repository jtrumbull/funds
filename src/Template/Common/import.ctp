<?php
/*
 |------------------------------------------------------------------------------
 | Template\Common: Import
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
      
      <a class="list-group-item" href="<?= $this->url('/' . $slug . '/export') ?>">
        <span class="fa fa-download fa-fw"></span>
        Export
      </a>
      
    </div>
    
  </div>
  
</div>
