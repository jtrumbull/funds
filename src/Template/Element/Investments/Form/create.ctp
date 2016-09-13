<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Investments\Form: Create
 |------------------------------------------------------------------------------
 */

use Cake\Core\Configure;

$buttons = isset($buttons) ? $buttons : true;
$types = Configure::read('transactionTypes');
?>

<form id="investments-create-form">
  
  <input type="hidden" name="offering_id" />
  
  <input type="hidden" name="account_id" />
  
  <!-- Date -->
  
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
  
  <!-- Amount -->
  
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
    <label>Term</label>
    <input type="text" class="form-control" name="term" placeholder="Term" />
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-plus fa-fw"></span>
    Create
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
