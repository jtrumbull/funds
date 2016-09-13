<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\InvestorsAccounts\Form: Create
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="investors-accounts-create-form">
  
  <input type="hidden" name="investor_id" />
  
  <input type="hidden" name="account_id" />
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-plus fa-fw"></span>
    Create
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
