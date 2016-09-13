/*
 |------------------------------------------------------------------------------
 | App: Form
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  var Form = App.View.extend({
    
    validationError: undefined,
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function (options) {
      this.initAlert();
      this.reset(this.model);
      this._initialize(options);
    },
    
    initAlert: function () {
      var self = this;
      var container = this.el.getElementsByClassName('alert-container')[0];
      this.on('validationError', function(message){
        self.alert(message, 'error');
      });
      this.alertContainer = container;
    },
    
    _initialize: function () {
      // For child constructors
    },
    
    reset: function (model) {
      this.model = model;
      this._reset(model);
    },
    
    _reset: function () {
      // For child constructors
    },
    
    /*
     |--------------------------------------------------------------------------
     | Form controls
     |--------------------------------------------------------------------------
     */
    
    submit: function (event) {
      this.populateModel();
      if (!this.isValid()) {
        event.preventDefault();
        this.trigger('validationError', this.validationError);
        return;
      }
    },
    
    clear: function () {
      this.el.reset();
      this.clearAlert();
    },
    
    /*
     |--------------------------------------------------------------------------
     | Validation
     |--------------------------------------------------------------------------
     */
    
    isValid: function () {
      var error = this.validate();
      if (error !== undefined) {
        this.validationError = error;
        return false;
      }
      return true;
    },
    
    validate: function () {
      var attributes = this.model.attributes;
      return this.model.validate(attributes);
    },
    
    /*
     |--------------------------------------------------------------------------
     | Render
     |--------------------------------------------------------------------------
     */
    
    render: function () {
      this.populate();
    },
    
    populate: function () {
      var $elem = this.$el;
      var model = this.model;
      if (!model) return;
      this.$el.find('[name]').each(function () {
        var attr = this.name;
        var type = this.type;
        var value = model.get(attr);
        var $input = $(this);
        if (type == 'file') {
          model.addFile(attr, this);
          return;
        }
        if ($input.hasClass('date')) {
          if (!value) return;
          if (value.indexOf('T00:00:00+00:00') !== -1) {
            // T00:00:00+00:00 forces previous day
            // TODO: Workaround for ISO date format rounding down one day? 
            value = value.split('T')[0];
            value = Moment(value).format('MM/DD/YYYY');
          } 
          $input.datepicker('setDate', value);
        } else {
          $input.val(value);
        }
      });
      console.log(this.files);
    },
    
    populateModel: function () {
      var model = this.model;
      if (!model) return;
      this.$el.find('[name]').each(function () {
        var attr = this.name;
        var value = this.value;
        if (value == 'true') value = true;
        if (value == 'false') value = false;
        if (value == 'null') value = null;
        model.set(attr, value);
      });
      return model;
    },
    
    /*
     |--------------------------------------------------------------------------
     | Events
     |--------------------------------------------------------------------------
     */
    
    events: {
      'submit': 'submit'
    },
    
  });
  
  App.Form = Form;
  
}(window, document, jQuery, _, Backbone, moment, App));
