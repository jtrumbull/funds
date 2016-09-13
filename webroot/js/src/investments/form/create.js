/*
 |------------------------------------------------------------------------------
 | App\Investments\Form: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investments){
  
  'use strict';
  
  var CreateForm = App.CreateForm.extend({
    
    _initialize: function () {
      this.initDatepicker();
    },
    
    initDatepicker: function () {
      this.$el.find('.date').datepicker({
        autoclose: true,
        todayHighlight: true
      }).datepicker('setDate', new Date());
    },
    
  });
  
  Investments.CreateForm = CreateForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investments));
