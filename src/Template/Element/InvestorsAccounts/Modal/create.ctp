<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\InvestorsAccounts\Modal: Create
 |------------------------------------------------------------------------------
 */
?>

<div class="modal fade" tabindex="-1" role="dialog" id="investors-accounts-create-modal">
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
          <span class="fa fa-plus"></span>
          Investors accounts
          <small>Create</small>
        </h4>
      </div>
      
      <div class="modal-body">
        <?= $this->element('investorsAccounts/form/create', ['buttons' => false]) ?>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="fa fa-ban"></span>
          Cancel
        </button>
        <button type="submit" class="btn btn-primary">
          <span class="fa fa-plus"></span>
          Create
        </button>
      </div>
      
    </div>
  </div>
</div>
