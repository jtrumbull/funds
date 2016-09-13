<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Offerings\Form: Create
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="offerings-create-form">
  
  <input type="hidden" name="fund_id" />
  
  <!-- Class -->
  
  <div class="form-group">
    
    <label for="offerings-create-form-class">Class</label>
    
    <input type="text" 
           class="form-control" 
           name="class" 
           placeholder="Class" 
           id="offerings-create-form-class" />
    
  </div>
  
  <!-- Rate -->
  
  <div class="form-group">
    
    <label for="offerings-create-form-rate">Rate</label>
    
    <div class="input-group">
      
      <input type="text"
             class="form-control"
             name="rate"
             placeholder="Rate (e.g. 10.000)" 
             aria-describedby="offerings-create-form-rate-addon" 
             id="offerings-create-form-rate" />
      
      <div class="input-group-addon" id="offerings-create-form-rate-addon" style="line-height: 1.6;">
        <span class="fa fa-percent"></span>
      </div>
      
    </div>
    
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-plus fa-fw"></span>
    Create
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
