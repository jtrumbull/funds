/*
 |------------------------------------------------------------------------------
 | App\Modal: Delete
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Modal){
  
  'use strict';
  
  var DeleteModal = Modal.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function () {
      this.initProfile();
      this.reset(this.model);
    },
    
    initProfile: function () {
      var profile = new this.Profile({
        model: this.model,
        el: doc.getElementById(this.profileId)
      });
      this.profile = profile;
    },
    
    reset: function (model) {
      this.model = model;
      this.profile.reset(model);
    },
    
    /*
     |--------------------------------------------------------------------------
     | Render
     |--------------------------------------------------------------------------
     */
    
    render: function () {
      this.profile.populate();
      this.open();
    },
    
    /*
     |--------------------------------------------------------------------------
     | Events
     |--------------------------------------------------------------------------
     */
    
    events: {
      'click [type="submit"]': 'delete'
    },
    
    delete: function () {
      var self = this;
      var model = this.model;
      model.on('sync', function () {
        self.loadingStateOff();
        self.close();
      });
      this.loadingStateOn();
      model.destroy();
    },
    
    /*
     |--------------------------------------------------------------------------
     | Loading state
     |--------------------------------------------------------------------------
     */
    
    loadingStateOn: function () {
      var $button = $(this.el).find('[type="submit"]');
      $button.html('<span class="fa fa-spinner fa-spin fa-fw"></span> Deleting');
    },
    
    loadingStateOff: function () {
      var $button = $(this.el).find('[type="submit"]');
      $button.html('<span class="fa fa-trash fa-fw"></span> Delete');
    },
    
  });
  
  App.DeleteModal = DeleteModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Modal));
