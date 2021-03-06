<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Investors\Modal: Read
 |------------------------------------------------------------------------------
 */
?>

<div class="modal fade" tabindex="-1" role="dialog" id="investors-read-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" 
                class="close" 
                data-dismiss="modal" 
                aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">
          <span class="fa fa-eye"></span>
          Investor
          <small>Profile</small>
        </h4>
      </div>
      
      <div class="modal-body">
        <?= $this->element('investors/profile') ?>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Close
        </button>
      </div>
      
    </div>
  </div>
</div>
