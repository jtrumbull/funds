<?php
/*
 |------------------------------------------------------------------------------
 | Template\Common: Basic
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
    
    <div class="list-group" id="<?= $slug ?>-toolbar">
      
      <?= $this->fetch('sidebar') ?>
    
  </div>
  
</div>
