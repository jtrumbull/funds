/*
 |------------------------------------------------------------------------------
 | App\InvestorsAccounts: Pane
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, InvestorsAccounts){
  
  'use strict';
  
  var Pane = App.Pane.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function () {
      this.initTable();
      this.initToolbar();
      this.initReadModal();
      this.initCreateModal();
      this.initUpdateModal();
      this.initDeleteModal();
    },
    
    initTable: function () {
      var self = this;
      var table = new Table({
        collection: this.collection,
        el: doc.getElementById('investors-accounts-table'),
        pager: doc.getElementById('investors-accounts-table-pager'),
        searchbox: doc.getElementById('investors-accounts-toolbar-searchbox'),
      });
      table.on('row-dblclick', function () {
        self.openReadModal();
      });
      this.table = table;
    },
    
    initToolbar: function () {
      var toolbar = new Toolbar({
        collection: this.collection,
        el: doc.getElementById('investors-accounts-toolbar')
      });
      this.toolbar = toolbar;
    },
    
    initReadModal: function () {
      var modal = new ReadModal({
        el: doc.getElementById('investors-accounts-read-modal')
      });
      this.readModal = modal;
    },
    
    initCreateModal: function () {
      var modal = new CreateModal({
        el: doc.getElementById('investors-accounts-create-modal')
      });
      this.createModal = modal;
    },
    
    initUpdateModal: function () {
      var modal = new UpdateModal({
        el: doc.getElementById('investors-accounts-update-modal')
      });
      this.updateModal = modal;
    },
    
    initDeleteModal: function () {
      var modal = new DeleteModal({
        el: doc.getElementById('investors-accounts-delete-modal')
      });
      this.deleteModal = modal;
    },
    
    /*
     |--------------------------------------------------------------------------
     | Render
     |--------------------------------------------------------------------------
     */
    
    render: function () {
      this.table.render();
    },
    
    /*
     |--------------------------------------------------------------------------
     | Events
     |--------------------------------------------------------------------------
     */
    
    events: {
      'click [data-action="read"]': 'openReadModal',
      'click [data-action="create"]': 'openCreateModal',
      'click [data-action="update"]': 'openUpdateModal',
      'click [data-action="delete"]': 'openDeleteModal',
    },
    
    openReadModal: function () {
      var selected = this.collection.selected();
      if (selected.length !== 1) return;
      var model = selected[0];
      this.readModal.reset(model);
      this.readModal.render();
    },
    
    openCreateModal: function () {
      var self = this;
      var model = new Model();
      this.createModal.reset(model);
      this.createModal.render();
      model.on('sync', function () {
        self.collection.add(model);
      });
    },
    
    openUpdateModal: function () {
      var collection = this.collection;
      var selected = collection.selected();
      if (selected.length !== 1) return;
      var model = selected[0];
      this.updateModal.reset(model);
      this.updateModal.render();
      model.on('sync', function () {
        collection.trigger('model-update', model);
      });
    },
    
    openDeleteModal: function () {
      var selected = this.collection.selected();
      if (selected.length !== 1) return;
      var model = selected[0];
      this.deleteModal.reset(model);
      this.deleteModal.render();
    },
    
  });
  
  InvestorsAccounts.Pane = Pane;
  
}(window, document, jQuery, _, Backbone, moment, App, App.InvestorsAccounts));
