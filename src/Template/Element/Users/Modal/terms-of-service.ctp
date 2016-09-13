<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Users\Modal: Terms of service
 |------------------------------------------------------------------------------
 */
?>

<div class="modal fade" tabindex="-1" role="dialog" id="terms-of-service-modal">
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
          Terms of service
        </h4>
      </div>
      
      <div class="modal-body">
        <?= $this->element('users/terms-of-service') ?>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Close
        </button>
      </div>
      
    </div>
  </div>
</div>
