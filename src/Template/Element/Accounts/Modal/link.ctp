<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Accounts\Modal: Link
 |------------------------------------------------------------------------------
 */
?>

<div class="modal fade" tabindex="-1" role="dialog" id="accounts-link-modal">
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
          <span class="fa fa-link fa-fw"></span>
          Accounts
          <small>Link</small>
        </h4>
      </div>
      
      <div class="modal-body">
        
        <?= $this->element('table/searchbox', [ 'id' => 'accounts-link-modal-searchbox' ]) ?>
        
        <table class="table table-bordered table-condensed table-hover" id="accounts-link-modal-table">
          <thead>
            <tr>
              <th class="text-center" data-field="link" data-cell-class="text-center">Link</th>
              <th class="text-center" data-field="name">Account name</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        
        <?= $this->element('table/pager', [ 'id' => 'accounts-link-modal-table-pager' ]) ?>
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="fa fa-ban"></span>
          Cancel
        </button>
        <button type="submit" class="btn btn-primary">
          <span class="fa fa-link fa-fw"></span>
          Link
        </button>
      </div>
      
    </div>
  </div>
</div>
