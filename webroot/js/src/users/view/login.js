/*
 |------------------------------------------------------------------------------
 | App\Users\View: Login
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Users){
  
  'use strict';
  
  var LoginForm = Users.LoginForm;
  
  var LoginView = Users.View.extend({
    
    initialize: function () {
      this.initForm();
    },
    
    initForm: function () {
      var form = new LoginForm({
        model: this.model,
        el: doc.getElementById('users-login-form')
      });
      this.form = form;
    },
    
    render: function () {
      this.form.render();
    },
    
  });
  
  Users.LoginView = LoginView;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Users));
