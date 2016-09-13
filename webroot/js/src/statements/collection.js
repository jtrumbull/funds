/*
 |------------------------------------------------------------------------------
 | App\Statements: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Statements, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Statements.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Statements, App.Statements.Model));
