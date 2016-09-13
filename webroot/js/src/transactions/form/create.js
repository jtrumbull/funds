/*
 |------------------------------------------------------------------------------
 | App\Transactions\Form: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Transactions){
  
  'use strict';
  
  var CreateForm = App.CreateForm.extend({
    
    _initialize: function () {
      this.$el.find('.date').datepicker();
    }
    
  });
  
  Transactions.CreateForm = CreateForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Transactions));
