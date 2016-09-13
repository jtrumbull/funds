/*
 |------------------------------------------------------------------------------
 | App\Attachments\Form: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Attachments){
  
  'use strict';
  
  var FileSelect = App.FileSelect;
  
  var CreateForm = App.CreateForm.extend({
    
    submit: function () {
      var model = this.populateModel();
      if (!model.isValid()) {
        this.alert(model.validationError, 'error');
        return;
      }
      this.clearAlert();
      this.trigger('sync-submit');
      console.log(model);
      model.save(model.attributes, { validate: false });
    },
    
    _initialize: function () {
      this.initFileSelect();
    },
    
    _reset: function () {
      if (this.fileSelect) {
        this.fileSelect.clear();
      }
    },
    
    initFileSelect: function () {
      var fileSelect = new FileSelect({
        el: this.$el.find('.file-select')[0]
      });
      this.fileSelect = fileSelect;
    },
    
  });
  
  Attachments.CreateForm = CreateForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Attachments));
