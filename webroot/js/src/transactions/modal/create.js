/*
 |------------------------------------------------------------------------------
 | App\Transactions\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Transactions){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Transactions.CreateForm,
    
    formId: 'transactions-create-form'
    
  });
  
  Transactions.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Transactions));
