/*
 |------------------------------------------------------------------------------
 | App\Attachments\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Attachments, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'attachments-delete-modal-profile'
    
  });
  
  Attachments.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Attachments, Attachments.Profile));
