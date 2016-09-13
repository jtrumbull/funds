/*
 |------------------------------------------------------------------------------
 | App\Investors\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investors){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Investors.CreateForm,
    
    formId: 'investors-create-form'
    
  });
  
  Investors.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investors));
