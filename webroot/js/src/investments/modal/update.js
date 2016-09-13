/*
 |------------------------------------------------------------------------------
 | App\Investments\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investments){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Investments.UpdateForm,
    
    formId: 'investments-update-form'
    
  });
  
  Investments.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investments));
