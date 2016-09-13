/*
 |------------------------------------------------------------------------------
 | App\Accounts: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Accounts){
  
  'use strict';
  
  var formats = App.Model.prototype.formats;
  
  var Model = App.Model.extend({
    
    defaults: {
      type: 0,
    },
    
    serverNode: 'account',
    
    urlRoot: 'accounts',
    
    formats: {
      link: function (value, model) {
        var input = doc.createElement('input');
        input.type = 'checkbox';
        input.setAttribute('data-id', model.get('id'));
        return input;
      },
      investments_count: function (value) {
        if (!value) return 0;
        return value;
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
  
  Accounts.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Accounts));
