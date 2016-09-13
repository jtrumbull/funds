<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Users\Form: Update
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="users-update-form">
  
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username" />
  </div>
  
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" name="password" placeholder="Password" />
  </div>
  
  <div class="form-group">
    <label>Role</label>
    <input type="text" class="form-control" name="role" placeholder="Role" />
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-pencil-square-o fa-fw"></span>
    Update
  </button>
  <?php endif ?>
  
</form>
