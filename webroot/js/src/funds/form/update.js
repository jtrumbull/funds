/*
 |------------------------------------------------------------------------------
 | App\Funds\Form: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Funds){
  
  'use strict';
  
  var UpdateForm = App.UpdateForm.extend({
    
    _initialize: function () {
      var name = this._origName;
      var $unique = this.$el.find('[name="unique"]');
      $unique.val(true);
      this.$el.find('[name="name"]').on('input', function () {
        var value = this.value;
        if (value == name) {
          $unique.val(true);
          return;
        }
        $.ajax({
          url: App.api('funds/unique/' + encodeURIComponent(this.value)),
          success: function (data) {
            $unique.val(data.unique);
          },
        });
      });
    },
    
    _reset: function (model) {
      if (!model) return;
      this._origName = model.get('name');
    },
    
  });
  
  Funds.UpdateForm = UpdateForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Funds));
