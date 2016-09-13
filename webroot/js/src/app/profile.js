/*
 |------------------------------------------------------------------------------
 | App: Profile
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  var Profile = App.View.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function () {
      this.reset(this.model);
    },
    
    reset: function (model) {
      var self = this;
      this.model = model;
      if (!model) return;
      this.model.on('sync', function () {
        self.render();
      });
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
      var model = this.model;
      if (!model) return;
      this.$el.find('[data-field]').each(function () {
        var attr = this.getAttribute('data-field');
        var value = model.format(attr);
        if (_.isElement(value)) {
          this.innerHTML = '';
          this.appendChild(value);
        } else {
          this.innerHTML = value;
        }
      });
    },
    
  });
  
  App.Profile = Profile;
  
}(window, document, jQuery, _, Backbone, moment, App));
