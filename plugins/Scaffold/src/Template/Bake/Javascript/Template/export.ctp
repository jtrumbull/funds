/*
 |------------------------------------------------------------------------------
 | App\<%= $pluralName %>\View: Export
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, <%= $pluralName %>){
  
  'use strict';
  
  var ExportView = <%= $pluralName %>.View.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function (options) {
      
    },
    
    /*
     |--------------------------------------------------------------------------
     | Redner
     |--------------------------------------------------------------------------
     */
    
    render: function () {
      
    },
    
    /*
     |--------------------------------------------------------------------------
     | Events
     |--------------------------------------------------------------------------
     */
    
    events: {
   
    }
    
  });
  
  <%= $pluralName %>.ExportView = ExportView;
  
}(window, document, jQuery, _, Backbone, moment, App, App.<%= $pluralName %>));
