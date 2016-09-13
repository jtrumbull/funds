/*
 |------------------------------------------------------------------------------
 | App\Funds: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Funds, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Funds.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Funds, App.Funds.Model));
