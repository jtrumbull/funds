/*
 |------------------------------------------------------------------------------
 | App\Investments\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investments){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Investments.CreateForm,
    
    formId: 'investments-create-form'
    
  });
  
  Investments.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investments));
