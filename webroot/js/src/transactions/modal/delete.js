/*
 |------------------------------------------------------------------------------
 | App\Transactions\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Transactions, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'transactions-delete-modal-profile'
    
  });
  
  Transactions.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Transactions, Transactions.Profile));
