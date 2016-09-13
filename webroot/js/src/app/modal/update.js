/*
 |------------------------------------------------------------------------------
 | App\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, CreateModal){
  
  'use strict';
  
  var UpdateModal = CreateModal.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    // initialize: function () {},
    
    /*
     |--------------------------------------------------------------------------
     | Render
     |--------------------------------------------------------------------------
     */
    
    // render: function () {},
    
    /*
     |--------------------------------------------------------------------------
     | Loading state
     |--------------------------------------------------------------------------
     */
    
    loadingStateOn: function () {
      var $button = $(this.el).find('[type="submit"]');
      $button.html('<span class="fa fa-spinner fa-spin fa-fw"></span> Saving');
    },
    
    loadingStateOff: function () {
      var $button = $(this.el).find('[type="submit"]');
      $button.html('<span class="fa fa-pencil-square-o fa-fw"></span> Update');
    },
    
  });
  
  App.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.CreateModal));
