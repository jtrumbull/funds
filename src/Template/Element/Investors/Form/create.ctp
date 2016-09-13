<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Investors\Form: Create
 |------------------------------------------------------------------------------
 */

use Cake\Core\Configure;

$buttons = isset($buttons) ? $buttons : true;
$states = Configure::read('states');
?>

<form id="investors-create-form">
  
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name" />
  </div>
  
  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="address" placeholder="Address" />
  </div>
  
  <div class="row">
    <div class="col-sm-5">
      
      <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" name="city" placeholder="City" />
      </div>
      
    </div>
    <div class="col-sm-4">
      
      <div class="form-group">
        <label>State</label>
        <select class="form-control" name="state">
          <option value="">Select one</option>
          <?php foreach ($states as $value => $title): ?>
          <option value="<?= $value ?>"><?= $title ?></option>
          <?php endforeach ?>
        </select>
      </div>
      
    </div>
    <div class="col-sm-3">
      
      <div class="form-group">
        <label>Zip</label>
        <input type="text" class="form-control" name="zip" placeholder="Zip" />
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
