/*
 |------------------------------------------------------------------------------
 | App\Statements\Modal: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Statements){
  
  'use strict';
  
  var ReadModal = App.ReadModal.extend({
    
    Profile: Profile,
    
    profileId: 'statements-profile'
    
  });
  
  Statements.ReadModal = ReadModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Statements));
