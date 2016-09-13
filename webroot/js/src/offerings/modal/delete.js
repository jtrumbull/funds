/*
 |------------------------------------------------------------------------------
 | App\Offerings\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Offerings, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'offerings-delete-modal-profile'
    
  });
  
  Offerings.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Offerings, Offerings.Profile));
