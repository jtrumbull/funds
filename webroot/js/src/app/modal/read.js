/*
 |------------------------------------------------------------------------------
 | App\Modal: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Modal){
  
  'use strict';
  
  var ReadModal = Modal.extend({
    
    initialize: function () {
      this.initProfile();
    },
    
    _initialize: function () {
      
    },
    
    reset: function (model) {
      this.profile.reset(model);
      this.model = model;
    },
    
    initProfile: function () {
      var profile = new this.Profile({
        model: this.model,
        el: doc.getElementById(this.profileId)
      });
      this.profile = profile;
    },
    
    render: function () {
      this.profile.render();
      this.open();
    },
    
  });
  
  App.ReadModal = ReadModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Modal));
