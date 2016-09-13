/*
 |------------------------------------------------------------------------------
 | App\Form: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Form){
  
  'use strict';
  
  var CreateForm = Form.extend({
    
    submit: function () {
      var model = this.populateModel();
      if (!model.isValid()) {
        this.alert(model.validationError, 'error');
        return;
      }
      this.clearAlert();
      this.trigger('sync-submit');
      model.save(model.attributes, { validate: false });
    }
    
  });
  
  App.CreateForm = CreateForm;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Form));
