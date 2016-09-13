<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Transactions\Form: Create
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="transactions-create-form">
  
  <input type="hidden" name="investment_id" />
  
  <div class="form-group">
    
    <label>Date</label>
    
    <div class="input-group datepicker">
      <div class="input-group-addon">
        <span class="fa fa-calendar"></span>
      </div>
      <input type="text"
             class="form-control date"
             name="date"
             placeholder="Date" />
    </div>
    
  </div>
  
  <div class="form-group">
    
    <label>Amount</label>
    
    <div class="input-group">
      <div class="input-group-addon">
        <span class="fa fa-usd"></span>
      </div>
      <input type="text"
             class="form-control"
             name="amount"
             placeholder="Amount" />
    </div>
    
  </div>
  
  <div class="form-group">
    <label>Type</label>
    <select class="form-control" name="type">
      <option>Preferred payment</option>
    </select>
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-plus fa-fw"></span>
    Create
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
