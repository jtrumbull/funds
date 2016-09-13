<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Investments\Form: Update
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="investments-update-form">
  
  <input type="hidden" name="offering_id" />
  
  <input type="hidden" name="account_id" />
  
  <div class="form-group">
    
    <label>Date</label>
    
    <div class="input-group datepicker">
      <div class="input-group-addon">
        <span class="fa fa-calendar"></span>
      </div>
      <input type="text" class="form-control date" name="date" placeholder="Date">
    </div>
    
  </div>
  
  <div class="form-group">
    
    <label>Amount</label>
    
    <div class="input-group">
      <div class="input-group-addon">
        <span class="fa fa-usd"></span>
      </div>
      <input type="text" class="form-control" name="amount" placeholder="Amount" />
    </div>
    
  </div>
  
  <div class="form-group">
    <label>Term</label>
    <input type="text" class="form-control" name="term" placeholder="Term" />
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-pencil-square-o fa-fw"></span>
    Update
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
