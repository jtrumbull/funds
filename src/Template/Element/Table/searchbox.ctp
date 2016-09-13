<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Table: Pager
 |------------------------------------------------------------------------------
 */

$id = isset($id) ? $id : 'table-searchbox';
?>

<div class="input-group searchbox">
  <span class="input-group-addon" id="basic-addon1">
    <span class="fa fa-search"></span>
  </span>
  <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1" id="<?= $id ?>">
</div>
