/*
 |------------------------------------------------------------------------------
 | App\Accounts\Modal: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Accounts){
  
  'use strict';
  
  var ReadModal = App.ReadModal.extend({
    
    Profile: Profile,
    
    profileId: 'accounts-profile'
    
  });
  
  Accounts.ReadModal = ReadModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Accounts));
