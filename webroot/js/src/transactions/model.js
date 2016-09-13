/*
 |------------------------------------------------------------------------------
 | App\Transactions: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Transactions){
  
  'use strict';
  
  var formats = App.Model.prototype.formats;
  
  var typeMap = {
    '0': 'Initial funding amount',
    '1': 'Prorated preferred payment',
    '2': 'Preferred payment',
    '3': 'Drawdown',
  }
  
  var Model = App.Model.extend({
    
    serverNode: 'transaction',
    
    urlRoot: 'transactions',
    
    formats: {
      type: function (value) {
        return typeMap[value];
      },
      date: formats.date,
      amount: formats.currency,
      created: formats.created,
      modified: formats.modified,
      created_by: formats.created_by,
      modified_by: formats.modified_by,
    },
    
    validate: function () {
      // TODO: Validation
    }
    
  });
  
  Transactions.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Transactions));
