/*
 |------------------------------------------------------------------------------
 | App\Investors: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investors, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Investors.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investors, App.Investors.Model));
