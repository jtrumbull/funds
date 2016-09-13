/*
 |------------------------------------------------------------------------------
 | App\Users: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Users, Model){
  
  'use strict';
  
  var Collection = App.Model.extend({
    
    urlRoot: Model.prototype.urlRoot,
    
    formats: {
      
    },
    
  });
  
  Users.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Users, App.Users.Model));
