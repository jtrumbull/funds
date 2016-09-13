/*
 |------------------------------------------------------------------------------
 | App\<%= $pluralName %>\Modal: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, <%= $pluralName %>){
  
  'use strict';
  
  var UpdateModal = App.UpdateModal.extend({
    
    Form: <%= $pluralName %>.UpdateForm,
    
    formId: '<%= $pluralSlug %>-update-form'
    
  });
  
  <%= $pluralName %>.UpdateModal = UpdateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.<%= $pluralName %>));
