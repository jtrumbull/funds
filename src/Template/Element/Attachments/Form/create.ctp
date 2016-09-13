<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Attachments\Form: Create
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="attachments-create-form">
  
  <div class="form-group">
    
    <label>Attachment</label>
    
    <div class="input-group file-select">
      
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" style="line-height: 1.475;">
          <span class="fa fa-file fa-fw"></span>
          Select file
        </button>
      </span>
      
      <div class="form-control"></div>
      
      <input type="file" class="hide" name="attachment" />
      
    </div>
    
  </div>
  
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-upload fa-fw"></span>
    Upload
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
