/*
 |------------------------------------------------------------------------------
 | App\Statements\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Statements){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Statements.CreateForm,
    
    formId: 'statements-create-form'
    
  });
  
  Statements.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Statements));
