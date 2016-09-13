/*
 |------------------------------------------------------------------------------
 | App\Transactions\Modal: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Transactions){
  
  'use strict';
  
  var ReadModal = App.ReadModal.extend({
    
    Profile: Profile,
    
    profileId: 'transactions-profile'
    
  });
  
  Transactions.ReadModal = ReadModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Transactions));
