/*
 |------------------------------------------------------------------------------
 | App\Comments: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Comments, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Comments.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Comments, App.Comments.Model));
