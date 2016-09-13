/*
 |------------------------------------------------------------------------------
 | App: Mixins
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  _.mixin({
    
    isModel: function (obj) {
      return obj && obj.constructor == Model.constructor;
    },
    
    isCollection: function (obj) {
      return obj && obj.constructor == Collection.constructor;
    },
    
    isView: function (obj) {
      return obj && obj.constructor == View.constructor;
    }
    
  });
  
}(window, document, jQuery, _, Backbone, moment, App));
