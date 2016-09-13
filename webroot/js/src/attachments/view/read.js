/*
 |------------------------------------------------------------------------------
 | App\Attachments\View: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Attachments){
  
  'use strict';
  
  var Profile = Attachments.Profile;
  var UpdateModal = Attachments.UpdateModal;
  var DeleteModal = Attachments.DeleteModal;
  
  var ReadView = Attachments.View.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function (options) {
      var model = this.model
      this.initProfile();
      this.initUpdateModal();
      this.initDeleteModal();
      this.initPanes();
      model.on('sync', function () {
        self.profile.render();
      });
      model.on('destroy', function () {
        console.log('Destroyed');
        win.location = model.url(); 
      });
    },
    
    initProfile: function () {
      var profile = new Profile({
        model: this.model,
        el: doc.getElementById('attachments-profile')
      });
      this.profile = profile;
    },
    
    initUpdateModal: function () {
      var modal = new UpdateModal({
        model : this.model,
        el: doc.getElementById('attachments-update-modal')
      });
      this.updateModal = modal;
    },
    
    initDeleteModal: function () {
      var modal = new DeleteModal({
        model : this.model,
        el: doc.getElementById('attachments-delete-modal')
      });
      this.deleteModal = modal;
    },
    
    initPanes: function () {
      this.panes = {};
      this.initComments();
      this.initAttachments();
    },
    
    initComments: function () {
      var model = this.model;
      var comments = this.model.get('comments');
      var Comments = App.Comments;
      var collection = new Comments.Collection(comments);
      var pane = new Comments.Pane({
        collection: collection,
        el: doc.getElementById('comments-pane')
      });
      Comments.Model.prototype.defaults.parent = 'Attachments';
      Comments.Model.prototype.defaults.parent_id = model.id;
      this.panes.comments = pane;
    },
    
    initAttachments: function () {
      var model = this.model;
      var attachments = this.model.get('attachments');
      var Attachments = App.Attachments;
      var collection = new Attachments.Collection(attachments);
      var pane = new Attachments.Pane({
        collection: collection,
        el: doc.getElementById('attachments-pane')
      });
      Attachments.Model.prototype.defaults.parent = 'Attachments';
      Attachments.Model.prototype.defaults.parent_id = model.id;
      this.panes.attachments = pane;
    },
    
    /*
     |--------------------------------------------------------------------------
     | Redner
     |--------------------------------------------------------------------------
     */
    
    render: function () {
      this.profile.render();
      _.each(this.panes, function (pane) {
        pane.render();
      });
    },
    
    /*
     |--------------------------------------------------------------------------
     | Events
     |--------------------------------------------------------------------------
     */
    
    events: {
      'click #attachments-toolbar [data-action="update"]': 'openUpdateModal',
      'click #attachments-toolbar [data-action="delete"]': 'openDeleteModal',
    },
    
    openUpdateModal: function () {
      this.updateModal.render();
    },
    
    openDeleteModal: function () {
      this.deleteModal.render();
    },
    
  });
  
  Attachments.ReadView = ReadView;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Attachments));
