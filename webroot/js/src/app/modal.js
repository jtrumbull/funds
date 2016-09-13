/*
 |------------------------------------------------------------------------------
 | App: Modal
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  var Modal = App.View.extend({
    
    Form: App.Form,
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function () {
      this.reset(this.model);
    },
    
    reset: function (model) {
      this.model = model;
    },
    
    /*
     |--------------------------------------------------------------------------
     | Render
     |--------------------------------------------------------------------------
     */
    
    render: function () {
      this.open();
    },
    
    open: function () {
      $(this.el).modal('show');
    },
    
    close: function () {
      $(this.el).modal('hide');
    }
    
  });
  
  App.Modal = Modal;
  
}(window, document, jQuery, _, Backbone, moment, App));
