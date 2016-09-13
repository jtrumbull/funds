<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Table: Toolbar
 |------------------------------------------------------------------------------
 */

$id = isset($id) ? $id : 'table-toolbar';
$read = isset($read) ? $read : true;
$create = isset($create) ? $create : true;
$update = isset($update) ? $update : true;
$delete = isset($delete) ? $delete : true;
$import = isset($import) ? $import : false;
$export = isset($export) ? $export : false;

$link = isset($link) ? $link : false;
$unlink = isset($unlink) ? $unlink : false;
?>

<div class="table-toolbar" id="<?= $id ?>">
  
  <div class="btn-group">
    
    <?php if ($create): ?>
    <button class="btn btn-default" data-action="create">
      <span class="fa fa-plus"></span>
    </button>
    <?php endif ?>
    
    <?php if ($read): ?>
    <button class="btn btn-default disabled" data-action="read" disabled>
      <span class="fa fa-eye"></span>
    </button>
    <?php endif ?>
    
    <?php if ($update): ?>
    <button class="btn btn-default disabled" data-action="update" disabled>
      <span class="fa fa-pencil-square-o"></span>
    </button>
    <?php endif ?>
    
    <?php if ($delete): ?>
    <button class="btn btn-default disabled" data-action="delete" disabled>
      <span class="fa fa-trash"></span>
    </button>
    <?php endif ?>
    
  </div>
  
  <div class="btn-group">
    
    <?php if ($import): ?>
    <button class="btn btn-default" data-action="import">
      <span class="fa fa-upload"></span>
    </button>
    <?php endif ?>
    
    <?php if ($export): ?>
    <button class="btn btn-default" data-action="export">
      <span class="fa fa-download"></span>
    </button>
    <?php endif ?>
    
  </div>
  
  <div class="btn-group">
    
    <?php if ($link): ?>
    <button class="btn btn-default" data-action="link">
      <span class="fa fa-link"></span>
    </button>
    <?php endif ?>
    
    <?php if ($unlink): ?>
    <button class="btn btn-default disabled" data-action="unlink" disabled>
      <span class="fa fa-unlink"></span>
    </button>
    <?php endif ?>
    
  </div>
  
  <div style="width: 262.5px;" class="pull-right">
    <?= $this->element('table/searchbox', ['id' => $id . '-searchbox']) ?>
  </div>
  
</div>
