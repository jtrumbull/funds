<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Users\Form: Create
 |------------------------------------------------------------------------------
 */
?>

<form method="post" action="<?= $this->url('/login') ?>" id="users-login-form">
  
  <input type="hidden" name="unique" />
  
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
  
  <div class="form-group">
    <label>Confirm password</label>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">
        <span class="fa fa-key"></span>
      </span>
      <input type="password" class="form-control" name="password2" placeholder="Repeat password" aria-describedby="basic-addon1">
    </div>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox" name="tos" /> I agree to the
      <a data-toggle="modal" data-target="#terms-of-service-modal">terms of service</a>
    </label>
  </div>
  
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-user-plus fa-fw"></span>
    Register
  </button>
  
</form>

<?= $this->element('users/modal/terms-of-service') ?>
