/*
 |------------------------------------------------------------------------------
 | App\Modal: Create
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Modal){
  
  'use strict';
  
  var CreateModal = Modal.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function () {
      var self = this;
      this.initForm();
      this.form.on('sync-submit', function () {
        self.loadingStateOn();
      });
      this.form.on('sync-error', function () {
        self.loadingStateOff();
      });
      this.reset(this.model);
    },
    
    initForm: function () {
      var form = new this.Form({
        model: this.model,
        el: doc.getElementById(this.formId)
      });
      this.form = form;
    },
    
    reset: function (model) {
      var self = this;
      this.model = model;
      if (!model) return;
      this.form.reset(model);
      model.on('sync', function () {
        self.loadingStateOff();
        self.form.clear();
        self.close();
      });
    },
    
    /*
     |--------------------------------------------------------------------------
     | Render
     |--------------------------------------------------------------------------
     */
    
    render: function () {
      this.form.render();
      this.open();
    },
    
    /*
     |--------------------------------------------------------------------------
     | Events
     |--------------------------------------------------------------------------
     */
    
    events: {
      'click [type="submit"]': 'submitForm',
      'click [type="reset"]': 'clearForm'
    },
    
    submitForm: function (event) {
      event.preventDefault();
      this.form.submit();
    },
    
    clearForm: function (event) {
      event.preventDefault();
      this.form.clear();
    },
    
    /*
     |--------------------------------------------------------------------------
     | Loading state
     |--------------------------------------------------------------------------
     */
    
    loadingStateOn: function () {
      var $button = $(this.el).find('[type="submit"]');
      $button.html('<span class="fa fa-spinner fa-spin fa-fw"></span> Creating');
    },
    
    loadingStateOff: function () {
      var $button = $(this.el).find('[type="submit"]');
      $button.html('<span class="fa fa-plus fa-fw"></span> Create');
    },
    
  });
  
  App.CreateModal = CreateModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Modal));
