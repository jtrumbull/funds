<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Comments\Form: Create
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="comments-create-form">
  
  <input type="hidden" name="parent_id" />
  
  <div class="form-group">
    <label>Comment</label>
    <textarea rows="10" class="form-control" name="content" placeholder="Enter comment here.."></textarea>
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-plus fa-fw"></span>
    Create
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
