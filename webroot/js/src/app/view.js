/*
 |------------------------------------------------------------------------------
 | App: View
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  var View = Backbone.View.extend({
    
    alertContainer: undefined,
    
    alert: function (message, type, append) {
      var container = this.alertContainer;
      if (!container) {
        return false;
      }
      if (!append) {
        this.clearAlert();
      }
      var span = doc.createElement('span');
      if (type == 'error') {
        span.className = 'text-danger';
      }
      span.innerHTML = message;
      container.appendChild(span);
    },
    
    clearAlert: function () {
      this.alertContainer.innerHTML = '';
    }
    
  });
  
  App.View = View;
  
}(window, document, jQuery, _, Backbone, moment, App));
