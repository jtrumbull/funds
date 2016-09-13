/*
 |------------------------------------------------------------------------------
 | App\InvestorsAccounts: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, InvestorsAccounts, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  InvestorsAccounts.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.InvestorsAccounts, App.InvestorsAccounts.Model));
