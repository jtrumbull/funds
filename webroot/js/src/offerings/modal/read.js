/*
 |------------------------------------------------------------------------------
 | App\Offerings\Modal: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Offerings){
  
  'use strict';
  
  var ReadModal = App.ReadModal.extend({
    
    Profile: Profile,
    
    profileId: 'offerings-profile'
    
  });
  
  Offerings.ReadModal = ReadModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Offerings));
