/*
 |------------------------------------------------------------------------------
 | App\Statements\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Statements){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Statements.UpdateForm,
    
    formId: 'statements-update-form'
    
  });
  
  Statements.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Statements));
