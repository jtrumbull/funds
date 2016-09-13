/*
 |------------------------------------------------------------------------------
 | App\<%= $pluralName %>: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, <%= $pluralName %>, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  <%= $pluralName %>.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.<%= $pluralName %>, App.<%= $pluralName %>.Model));
