/*
 |------------------------------------------------------------------------------
 | App\Accounts\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Accounts){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Accounts.UpdateForm,
    
    formId: 'accounts-update-form'
    
  });
  
  Accounts.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Accounts));
