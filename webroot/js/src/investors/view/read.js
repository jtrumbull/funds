/*
 |------------------------------------------------------------------------------
 | App\Investors\View: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investors){
  
  'use strict';
  
  var Profile = Investors.Profile;
  var UpdateModal = Investors.UpdateModal;
  var DeleteModal = Investors.DeleteModal;
  
  var ReadView = Investors.View.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function (options) {
      var model = this.model
      this.accounts = options.accounts;
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
        el: doc.getElementById('investors-profile')
      });
      this.profile = profile;
    },
    
    initUpdateModal: function () {
      var modal = new UpdateModal({
        model : this.model,
        el: doc.getElementById('investors-update-modal')
      });
      this.updateModal = modal;
    },
    
    initDeleteModal: function () {
      var modal = new DeleteModal({
        model : this.model,
        el: doc.getElementById('investors-delete-modal')
      });
      this.deleteModal = modal;
    },
    
    initPanes: function () {
      this.panes = {};
      this.initAccounts();
      this.initStatements();
      this.initComments();
      this.initAttachments();
    },
    
    initAccounts: function () {
      var model = this.model;
      var accounts = model.get('accounts');
      var Accounts = App.Accounts;
      var Pane = Accounts.Pane;
      var Collection = Accounts.Collection;
      var collection = new Collection(accounts);
      var pane = new Pane({
        collection: collection,
        el: doc.getElementById('accounts-pane'),
        accounts: this.accounts
      });
      this.panes.accounts = pane;
    },
    
    initStatements: function () {
      var model = this.model;
      var statements = model.get('statements');
      var Statements = App.Statements;
      var Pane = Statements.Pane;
      var Collection = Statements.Collection;
      var collection = new Collection(statements);
      var pane = new Pane({
        collection: collection,
        el: doc.getElementById('statements-pane')
      });
      this.panes.statements = pane;
    },
    
    initComments: function () {
      var model = this.model;
      var comments = model.get('comments');
      var Comments = App.Comments;
      var collection = new Comments.Collection(comments);
      var pane = new Comments.Pane({
        collection: collection,
        el: doc.getElementById('comments-pane')
      });
      Comments.Model.prototype.defaults.parent = 'Investors';
      Comments.Model.prototype.defaults.parent_id = model.id;
      this.panes.comments = pane;
    },
    
    initAttachments: function () {
      var model = this.model;
      var attachments = model.get('attachments');
      var Attachments = App.Attachments;
      var collection = new Attachments.Collection(attachments);
      var pane = new Attachments.Pane({
        collection: collection,
        el: doc.getElementById('attachments-pane')
      });
      Attachments.Model.prototype.defaults.parent = 'Investors';
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
      'click #investors-toolbar [data-action="update"]': 'openUpdateModal',
      'click #investors-toolbar [data-action="delete"]': 'openDeleteModal',
    },
    
    openUpdateModal: function () {
      this.updateModal.render();
    },
    
    openDeleteModal: function () {
      this.deleteModal.render();
    },
    
  });
  
  Investors.ReadView = ReadView;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investors));
