/*
 |------------------------------------------------------------------------------
 | App\InvestorsAccounts\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, InvestorsAccounts, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'investors-accounts-delete-modal-profile'
    
  });
  
  InvestorsAccounts.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.InvestorsAccounts, InvestorsAccounts.Profile));
