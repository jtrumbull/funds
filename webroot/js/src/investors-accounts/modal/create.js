/*
 |------------------------------------------------------------------------------
 | App\InvestorsAccounts\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, InvestorsAccounts){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: InvestorsAccounts.CreateForm,
    
    formId: 'investors-accounts-create-form'
    
  });
  
  InvestorsAccounts.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.InvestorsAccounts));
