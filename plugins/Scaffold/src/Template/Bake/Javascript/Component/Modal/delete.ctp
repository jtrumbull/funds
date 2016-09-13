/*
 |------------------------------------------------------------------------------
 | App\<%= $pluralName %>\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, <%= $pluralName %>, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: '<%= $pluralSlug %>-delete-modal-profile'
    
  });
  
  <%= $pluralName %>.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.<%= $pluralName %>, <%= $pluralName %>.Profile));
