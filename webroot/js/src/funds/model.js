/*
 |------------------------------------------------------------------------------
 | App\Funds: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Funds){
  
  'use strict';
  
  var formats = App.Model.prototype.formats;
  
  var Model = App.Model.extend({
    
    serverNode: 'fund',
    
    urlRoot: 'funds',
    
    formats: {
      investments_amount: formats.currency,
      investments_balance: formats.currency,
      location: formats.location,
      created: formats.created,
      modified: formats.modified,
      created_by: formats.created_by,
      modified_by: formats.modified_by,
    },
    
    validate: function (attrs) {
      if (!attrs.name) {
        return 'Please provide a name';
      }
      if (attrs.hasOwnProperty('unique') && !attrs.unique) {
        return 'This name is already in use';
      }
    },
    
    prepare: function () {
      var attrs = this.attributes;
      return {
        name: attrs.name,
        address: attrs.address,
        city: attrs.city,
        state: attrs.state,
        zip: attrs.zip
      };
    },
    
  });
  
  Funds.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Funds));
