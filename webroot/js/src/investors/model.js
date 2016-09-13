/*
 |------------------------------------------------------------------------------
 | App\Investors: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investors){
  
  'use strict';
  
  var formats = App.Model.prototype.formats;
  
  var Model = App.Model.extend({
    
    serverNode: 'investor',
    
    urlRoot: 'investors',
    
    formats: {
      investments_count: function (value) {
        if (!value) return 0;
        return value;
      },
      investments_amount: formats.currency,
      investments_balance: formats.currency,
      location: formats.location,
      created: formats.created,
      modified: formats.modified,
      created_by: formats.created_by,
      modified_by: formats.modified_by,
    },
    
    validate: function () {
      // TODO: Validation
    }
    
  });
  
  Investors.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investors));
