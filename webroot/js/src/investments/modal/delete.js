/*
 |------------------------------------------------------------------------------
 | App\Investments\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investments, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'investments-delete-modal-profile'
    
  });
  
  Investments.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investments, Investments.Profile));
