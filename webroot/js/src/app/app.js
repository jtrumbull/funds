/*
 |------------------------------------------------------------------------------
 | App: App
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment){
  
  'use strict';
  
  /*
   |----------------------------------------------------------------------------
   | Constructor
   |----------------------------------------------------------------------------
   */
  
  var Application = function () {
    
  }
  
  /*
   |----------------------------------------------------------------------------
   | Prototype
   |----------------------------------------------------------------------------
   */
  
  Application.prototype = {
    
    urlRoot: undefined,
    
    url: function (path, query) {
      if (!path) return this.urlRoot;
      var url = this.urlRoot + path;
      if (query) {
        
      }
      return url;
    },
    
    api: function (path) {
      return this.url('api/' + path);
    }
    
  }
  
  /*
   |----------------------------------------------------------------------------
   | Instantiate
   |----------------------------------------------------------------------------
   */
  
  var App = new Application();
  
  win.App = App;
  
}(window, document, jQuery, _, Backbone, moment));
