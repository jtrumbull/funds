/*
 |------------------------------------------------------------------------------
 | App\Offerings\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Offerings){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: Offerings.UpdateForm,
    
    formId: 'offerings-update-form'
    
  });
  
  Offerings.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Offerings));
