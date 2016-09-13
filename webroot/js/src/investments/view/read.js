/*
 |------------------------------------------------------------------------------
 | App\Investments\View: Read
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Investments){
  
  'use strict';
  
  var Profile = Investments.Profile;
  var UpdateModal = Investments.UpdateModal;
  var DeleteModal = Investments.DeleteModal;
  
  var ReadView = Investments.View.extend({
    
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
        el: doc.getElementById('investments-profile')
      });
      this.profile = profile;
    },
    
    initUpdateModal: function () {
      var modal = new UpdateModal({
        model : this.model,
        el: doc.getElementById('investments-update-modal')
      });
      this.updateModal = modal;
    },
    
    initDeleteModal: function () {
      var modal = new DeleteModal({
        model : this.model,
        el: doc.getElementById('investments-delete-modal')
      });
      this.deleteModal = modal;
    },
    
    initPanes: function () {
      this.panes = {};
      this.initTransactions();
      this.initStatements();
      this.initComments();
      this.initAttachments();
    },
    
    initStatements: function () {
      var model = this.model;
      var Statements = App.Statements;
      var Collection = Statements.Collection;
      var Model = Statements.Model;
      var Pane = Statements.Pane;
      
      var statements = model.get('statements');
      var collection = new Collection(statements);
      var pane = new Pane({
        collection: collection,
        el: doc.getElementById('statements-pane')
      });
      
      this.panes.statements = pane;
    },
    
    initTransactions: function () {
      var model = this.model;
      var Transactions = App.Transactions;
      var Collection = Transactions.Collection;
      var Model = Transactions.Model;
      var Pane = Transactions.Pane;
      
      var transactions = model.get('transactions');
      var collection = new Collection(transactions);
      var pane = new Pane({
        collection: collection,
        el: doc.getElementById('transactions-pane')
      });
      
      Model.prototype.defaults.investment_id = model.get('id');
      this.panes.transactions = pane;
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
      Comments.Model.prototype.defaults.parent = 'Investments';
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
      Attachments.Model.prototype.defaults.parent = 'Investments';
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
      'click #investments-toolbar [data-action="update"]': 'openUpdateModal',
      'click #investments-toolbar [data-action="delete"]': 'openDeleteModal',
    },
    
    openUpdateModal: function () {
      this.updateModal.render();
    },
    
    openDeleteModal: function () {
      this.deleteModal.render();
    },
    
  });
  
  Investments.ReadView = ReadView;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Investments));
