/*
 |------------------------------------------------------------------------------
 | App\Accounts\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Accounts, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'accounts-delete-modal-profile'
    
  });
  
  Accounts.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Accounts, Accounts.Profile));
