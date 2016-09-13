/*
 |------------------------------------------------------------------------------
 | App\Comments\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Comments, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'comments-delete-modal-profile'
    
  });
  
  Comments.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Comments, Comments.Profile));
