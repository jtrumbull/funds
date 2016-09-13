/*
 |------------------------------------------------------------------------------
 | App\Investments: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investments, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Investments.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investments, App.Investments.Model));
