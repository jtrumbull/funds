/*
 |------------------------------------------------------------------------------
 | App\Attachments: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Attachments){
  
  'use strict';
  
  var Model = App.Model.extend({
    
    serverNode: 'attachment',
    
    urlRoot: 'attachments',
    
    formats: {
      created: App.Model.prototype.formats.created,
      modified: App.Model.prototype.formats.modified,
      created_by: App.Model.prototype.formats.created_by,
      modified_by: App.Model.prototype.formats.modified_by,
    },
    
    validate: function (attrs) {
      if (!attrs.attachment) {
        return 'Please select a file';
      }
    }
    
  });
  
  Attachments.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Attachments));
