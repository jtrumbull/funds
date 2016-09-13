/*
 |------------------------------------------------------------------------------
 | App\Transactions\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Transactions){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Transactions.UpdateForm,
    
    formId: 'transactions-update-form'
    
  });
  
  Transactions.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Transactions));
