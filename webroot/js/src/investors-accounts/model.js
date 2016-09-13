/*
 |------------------------------------------------------------------------------
 | App\InvestorsAccounts: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, InvestorsAccounts){
  
  'use strict';
  
  var Model = App.Model.extend({
    
    serverNode: 'investorsAccount',
    
    urlRoot: 'investors-accounts',
    
    formats: {
      created: App.Model.prototype.formats.created,
      modified: App.Model.prototype.formats.modified,
      created_by: App.Model.prototype.formats.created_by,
      modified_by: App.Model.prototype.formats.modified_by,
    },
    
    validate: function () {
      // TODO: Validation
    }
    
  });
  
  InvestorsAccounts.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.InvestorsAccounts));
