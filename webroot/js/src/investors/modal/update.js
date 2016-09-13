/*
 |------------------------------------------------------------------------------
 | App\Investors\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investors){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Investors.UpdateForm,
    
    formId: 'investors-update-form'
    
  });
  
  Investors.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investors));
