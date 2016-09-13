/*
 |------------------------------------------------------------------------------
 | App\Statements\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Statements, Profile){
  
  'use strict';
  
  var DeleteModal = App.DeleteModal.extend({
    
    Profile: Profile,
    
    profileId: 'statements-delete-modal-profile'
    
  });
  
  Statements.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Statements, Statements.Profile));
