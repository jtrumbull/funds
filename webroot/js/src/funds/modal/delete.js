/*
 |------------------------------------------------------------------------------
 | App\Funds\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Funds, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'funds-delete-modal-profile'
    
  });
  
  Funds.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Funds, Funds.Profile));
