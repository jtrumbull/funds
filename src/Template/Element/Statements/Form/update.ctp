<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Statements\Form: Update
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="statements-update-form">
  
  <input type="hidden" name="investment_id" />
  
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name" />
  </div>
  
  <div class="form-group">
    <label>Path</label>
    <input type="text" class="form-control" name="path" placeholder="Path" />
  </div>
  
  <div class="form-group">
    <label>Type</label>
    <input type="text" class="form-control" name="type" placeholder="Type" />
  </div>
  
  <div class="form-group">
    <label>Size</label>
    <input type="text" class="form-control" name="size" placeholder="Size" />
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-pencil-square-o fa-fw"></span>
    Update
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
