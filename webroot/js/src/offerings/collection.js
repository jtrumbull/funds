/*
 |------------------------------------------------------------------------------
 | App\Offerings: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Offerings, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Offerings.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Offerings, App.Offerings.Model));
