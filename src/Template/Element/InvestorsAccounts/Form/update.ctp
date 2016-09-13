<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\InvestorsAccounts\Form: Update
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="investors-accounts-update-form">
  
  <input type="hidden" name="investor_id" />
  
  <input type="hidden" name="account_id" />
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-pencil-square-o fa-fw"></span>
    Update
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
