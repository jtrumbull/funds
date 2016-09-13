/*
 |------------------------------------------------------------------------------
 | App\Users\View: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Users){
  
  'use strict';
  
  var CreateForm = Users.CreateForm;
  
  var CreateView = Users.View.extend({
    
    initialize: function () {
      this.initForm();
    },
    
    initForm: function () {
      var form = new CreateForm({
        model: this.model,
        el: doc.getElementById('users-create-form')
      });
      this.form = form;
    },
    
    render: function () {
      this.form.render();
    },
    
  });
  
  Users.CreateView = CreateView;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Users));
