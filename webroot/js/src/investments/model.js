/*
 |------------------------------------------------------------------------------
 | App\Investments: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investments){
  
  'use strict';
  
  var formats = App.Model.prototype.formats;
  
  var Model = App.Model.extend({
    
    serverNode: 'investment',
    
    urlRoot: 'investments',
    
    formats: {
      offering: function (value, model) {
        if (!value) {
          return 'Not associated with an offering';
        }
        var a = doc.createElement('a');
        a.innerHTML = value.fund.name + ' (' + value.class + ')';
        a.href = App.url('funds/' + value.fund.id);
        return a;
      },
      account: function (value, model) {
        if (!value) {
          return 'Not associated with an account';
        }
        var a = doc.createElement('a');
        a.innerHTML = value.name;
        a.href = App.url('investors/' + value.id);
        return a;
      },
      date: formats.date,
      amount: formats.currency,
      balance: formats.currency,
      created: formats.created,
      modified: formats.modified,
      created_by: formats.created_by,
      modified_by: formats.modified_by,
    },
    
    validate: function () {
      // TODO: Validation
    }
    
  });
  
  Investments.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investments));
