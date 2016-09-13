/*
 |------------------------------------------------------------------------------
 | App\Investors\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investors, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'investors-delete-modal-profile'
    
  });
  
  Investors.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investors, Investors.Profile));
