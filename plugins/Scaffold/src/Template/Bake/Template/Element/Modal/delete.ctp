<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\<%= $pluralName %>\Modal: Delete
 |------------------------------------------------------------------------------
 */
?>

<div class="modal fade" tabindex="-1" role="dialog" id="<%= $pluralSlug %>-delete-modal">
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
          <span class="fa fa-trash"></span>
          <%= $pluralTitle . "\n" %>
          <small>Delete</small>
        </h4>
      </div>
      
      <div class="modal-body">
        
        <p>Are you sure you wish to delete the following <%= $singularWord %>?</p>
        
        <table class="table table-bordered table-condensed profile" id="<%= $pluralSlug %>-delete-modal-profile">
          <tbody>
            <tr>
              <th>System id</th>
              <td>
                <span data-field="id"></span>
              </td>
            </tr>
            <tr>
              <th><%= ucfirst($displayField) %></th>
              <td>
                <span data-field="<%= $displayField %>"></span>
              </td>
            </tr>
            <tr>
              <th>Created</th>
              <td>
                <span data-field="created"></span>
              </td>
            </tr>
            <tr>
              <th>Modified</th>
              <td>
                <span data-field="modified"></span>
              </td>
            </tr>
          </tbody>
        </table>
        
        <div class="alert alert-warning" role="alert" style="margin-bottom: 0px;">
          <span class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></span>
          <strong>Warning:</strong> Deleting this <%= $singularWord %> will also delete any dependent records.
        </div>
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="fa fa-ban"></span>
          Cancel
        </button>
        <button type="submit" class="btn btn-danger">
          <span class="fa fa-trash"></span>
          Delete
        </button>
      </div>
      
    </div>
  </div>
</div>
