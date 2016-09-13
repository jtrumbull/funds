/*
 |------------------------------------------------------------------------------
 | App\Attachments\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Attachments){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Attachments.CreateForm,
    
    formId: 'attachments-create-form',
    
    loadingStateOn: function () {
      var $button = $(this.el).find('[type="submit"]');
      $button.html('<span class="fa fa-spinner fa-spin fa-fw"></span> Uploading');
    },
    
    loadingStateOff: function () {
      var $button = $(this.el).find('[type="submit"]');
      $button.html('<span class="fa fa-upload fa-fw"></span> Upload');
    },
    
  });
  
  Attachments.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Attachments));
