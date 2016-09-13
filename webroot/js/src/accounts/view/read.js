/*
 |------------------------------------------------------------------------------
 | App\Accounts\View: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Accounts){
  
  'use strict';
  
  var Profile = Accounts.Profile;
  var UpdateModal = Accounts.UpdateModal;
  var DeleteModal = Accounts.DeleteModal;
  
  var ReadView = Accounts.View.extend({
    
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
        el: doc.getElementById('accounts-profile')
      });
      this.profile = profile;
    },
    
    initUpdateModal: function () {
      var modal = new UpdateModal({
        model : this.model,
        el: doc.getElementById('accounts-update-modal')
      });
      this.updateModal = modal;
    },
    
    initDeleteModal: function () {
      var modal = new DeleteModal({
        model : this.model,
        el: doc.getElementById('accounts-delete-modal')
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
      Comments.Model.prototype.defaults.parent = 'Accounts';
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
      Attachments.Model.prototype.defaults.parent = 'Accounts';
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
      'click #accounts-toolbar [data-action="update"]': 'openUpdateModal',
      'click #accounts-toolbar [data-action="delete"]': 'openDeleteModal',
    },
    
    openUpdateModal: function () {
      this.updateModal.render();
    },
    
    openDeleteModal: function () {
      this.deleteModal.render();
    },
    
  });
  
  Accounts.ReadView = ReadView;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Accounts));
