/*
 |------------------------------------------------------------------------------
 | App\InvestorsAccounts\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, InvestorsAccounts){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: InvestorsAccounts.UpdateForm,
    
    formId: 'investors-accounts-update-form'
    
  });
  
  InvestorsAccounts.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.InvestorsAccounts));
