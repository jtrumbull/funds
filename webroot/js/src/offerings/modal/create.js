/*
 |------------------------------------------------------------------------------
 | App\Offerings\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Offerings){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Offerings.CreateForm,
    
    formId: 'offerings-create-form'
    
  });
  
  Offerings.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Offerings));
