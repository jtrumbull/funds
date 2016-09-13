/*
 |------------------------------------------------------------------------------
 | App\Funds\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Funds){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: Funds.CreateForm,
    
    formId: 'funds-create-form'
    
  });
  
  Funds.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Funds));
