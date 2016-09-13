/*
 |------------------------------------------------------------------------------
 | App\Users\Form: Login
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Users){
  
  'use strict';
  
  var CreateForm = App.CreateForm.extend({
    
    init: function () {
      var model = this.model;
      var $elem = $(this.el);
      var $unique = $elem.find('[name="unique"]');
      var $username = $elem.find('[name="username"]');
      $username.on('blur', function(){
        $.ajax({
          url: model.api('username-exists/' + encodeURIComponent(this.value)),
          success: function (data) {
            $unique.val(!data.exists);
          },
        });
      });
    }
    
  });
  
  Users.CreateForm = CreateForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Users));
