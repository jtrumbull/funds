<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Users\Form: Login
 |------------------------------------------------------------------------------
 */
?>

<form method="post" action="<?= $this->url('/login') ?>" id="users-login-form">
  
  <div class="form-group">
    <label>Username</label>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">
        <span class="fa fa-user"></span>
      </span>
      <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1">
    </div>
  </div>
  
  <div class="form-group">
    <label>Password</label>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">
        <span class="fa fa-key"></span>
      </span>
      <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon1">
    </div>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox" name="remember" /> Remember me on this computer
    </label>
  </div>
  
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-lock fa-fw"></span>
    Login
  </button>
  
  <div class="alert-container">
  <?php if (isset($error)): ?>
    <span class="text-danger"><?= $error ?></span>
  <?php endif ?>
  </div>
  
</form>
