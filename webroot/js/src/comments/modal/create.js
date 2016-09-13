/*
 |------------------------------------------------------------------------------
 | App\Comments\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Comments){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Comments.CreateForm,
    
    formId: 'comments-create-form'
    
  });
  
  Comments.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Comments));
