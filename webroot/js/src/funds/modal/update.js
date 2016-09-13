/*
 |------------------------------------------------------------------------------
 | App\Funds\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Funds){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Funds.UpdateForm,
    
    formId: 'funds-update-form'
    
  });
  
  Funds.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Funds));
