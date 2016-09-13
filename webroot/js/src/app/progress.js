/*
 |------------------------------------------------------------------------------
 | App\Attachments: Progress
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, View){
  
  'use strict';
  
  var Progress = View.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function () {
      console.log('Progeress select init');
    },
    
  });
  
  App.Progress = Progress;
  
}(window, document, jQuery, _, Backbone, moment, App, App.View));
