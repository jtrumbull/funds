/*
 |------------------------------------------------------------------------------
 | App\Attachments\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Attachments){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Attachments.UpdateForm,
    
    formId: 'attachments-update-form'
    
  });
  
  Attachments.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Attachments));
