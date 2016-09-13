<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Comments\Form: Update
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="comments-update-form">
  
  <div class="form-group">
    <label>Comment</label>
    <textarea rows="10" class="form-control" name="content" placeholder="Enter comment here.."></textarea>
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-pencil-square-o fa-fw"></span>
    Update
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
