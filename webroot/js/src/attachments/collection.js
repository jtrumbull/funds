/*
 |------------------------------------------------------------------------------
 | App\Attachments: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Attachments, Model){
  
  'use strict';
  
  var Collection = App.Collection.extend({
    
    model: Model,
    
    urlRoot: Model.prototype.urlRoot,
    
  });
  
  Attachments.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Attachments, App.Attachments.Model));
