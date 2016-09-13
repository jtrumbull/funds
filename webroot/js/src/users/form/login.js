/*
 |------------------------------------------------------------------------------
 | App\Users\Form: Login
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Users){
  
  'use strict';
  
  var LoginForm = App.Form.extend({
    
    validate: function () {
      var attributes = this.model.attributes;
      if (!attributes.username) {
        return 'Please provide a valid username';
      }
      if (!attributes.password) {
        return 'Please provide a valid password';
      }
    }
    
  });
  
  Users.LoginForm = LoginForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Users));
