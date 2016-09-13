/*
 |------------------------------------------------------------------------------
 | App\Investments\Form: Update
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investments){
  
  'use strict';
  
  var UpdateForm = App.UpdateForm.extend({
    
    _initialize: function () {
      this.initDatepicker();
    },
    
    initDatepicker: function () {
      this.$el.find('.date').datepicker({
        autoclose: true,
        todayHighlight: true
      });
    },
    
  });
  
  Investments.UpdateForm = UpdateForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investments));
