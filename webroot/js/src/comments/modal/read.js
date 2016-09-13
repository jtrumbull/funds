/*
 |------------------------------------------------------------------------------
 | App\Comments\Modal: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Comments){
  
  'use strict';
  
  var ReadModal = App.ReadModal.extend({
    
    Profile: Profile,
    
    profileId: 'comments-profile'
    
  });
  
  Comments.ReadModal = ReadModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Comments));
