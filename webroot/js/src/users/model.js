/*
 |------------------------------------------------------------------------------
 | App\Users: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Users){
  
  'use strict';
  
  var Model = App.Model.extend({
    
    urlRoot: 'users',
    
    validate: function (attributes) {
      console.log(attributes);
      if (!attributes.unique) {
        return 'This username is already in use';
      }
      if (!attributes.username) {
        return 'Please provide a username';
      }
      if (!attributes.password) {
        return 'Please provide a password';
      }
      if (!attributes.password2) {
        return 'Please confirm the password';
      }
      if (attributes.password !== attributes.password2) {
        return 'The passwords do not match';
      }
    }
    
  });
  
  Users.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Users));
