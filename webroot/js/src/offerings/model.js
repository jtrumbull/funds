/*
 |------------------------------------------------------------------------------
 | App\Offerings: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Offerings){
  
  'use strict';
  
  var formats = App.Model.prototype.formats;
  
  var Model = App.Model.extend({
    
    serverNode: 'offering',
    
    urlRoot: 'offerings',
    
    formats: {
      rate: function (value) {
        if (!value) {
          return '- %';
        }
        return value.toFixed(3) + ' %';
      },
      investments_amount: formats.currency,
      created: formats.created,
      modified: formats.modified,
      created_by: formats.created_by,
      modified_by: formats.modified_by,
    },
    
    validate: function () {
      // TODO: Validation
    }
    
  });
  
  Offerings.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Offerings));
