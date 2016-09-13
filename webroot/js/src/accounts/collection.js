/*
 |------------------------------------------------------------------------------
 | App\Accounts: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Accounts, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Accounts.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Accounts, App.Accounts.Model));
