/*
 |------------------------------------------------------------------------------
 | App\Transactions: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Transactions, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Transactions.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Transactions, App.Transactions.Model));
