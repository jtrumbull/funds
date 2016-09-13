<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Users\Modal: Delete
 |------------------------------------------------------------------------------
 */
?>

<div class="modal fade" tabindex="-1" role="dialog" id="users-delete-modal">
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
          Users
          <small>Delete</small>
        </h4>
      </div>
      
      <div class="modal-body">
        <p>Are you sure you wish to delete the following model?</p>
        <table>
          <tbody>
            <tr>
              <th>System id:</th>
              <td>
                <span data-field="id"></span>
              </td>
            </tr>
            <tr>
              <th>id:</th>
              <td>
                <span data-field="id"></span>
              </td>
            </tr>
          </tbody>
        </table>
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
