/*
 |------------------------------------------------------------------------------
 | App\<%= $pluralName %>\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, <%= $pluralName %>){
  
  'use strict';
  
  var CreateModal = App.CreateModal.extend({
    
    Form: <%= $pluralName %>.CreateForm,
    
    formId: '<%= $pluralSlug %>-create-form'
    
  });
  
  <%= $pluralName %>.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.<%= $pluralName %>));
