/*
 |------------------------------------------------------------------------------
 | App\Accounts\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Accounts){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Accounts.CreateForm,
    
    formId: 'accounts-create-form'
    
  });
  
  Accounts.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Accounts));
