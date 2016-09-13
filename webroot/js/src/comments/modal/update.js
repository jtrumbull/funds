/*
 |------------------------------------------------------------------------------
 | App\Comments\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Comments){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Comments.UpdateForm,
    
    formId: 'comments-update-form'
    
  });
  
  Comments.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Comments));
