/*
 |------------------------------------------------------------------------------
 | App\Funds\Form: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Funds){
  
  'use strict';
  
  var CreateForm = App.CreateForm.extend({
    
    _initialize: function (options) {
      var $unique = this.$el.find('[name="unique"]'); 
      this.$el.find('[name="name"]').on('input', function () {
        $.ajax({
          url: App.api('funds/unique/' + encodeURIComponent(this.value)),
          success: function (data) {
            $unique.val(data.unique);
          },
        });
      });
    },
    
  });
  
  Funds.CreateForm = CreateForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Funds));
