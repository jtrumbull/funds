/*
 |------------------------------------------------------------------------------
 | App\Attachments: Pane
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Attachments){
  
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
      this.initCreateModal();
      this.initDeleteModal();
    },
    
    initTable: function () {
      var self = this;
      var table = new Table({
        collection: this.collection,
        el: doc.getElementById('attachments-table'),
        pager: doc.getElementById('attachments-table-pager'),
        searchbox: doc.getElementById('attachments-toolbar-searchbox'),
      });
      table.on('row-dblclick', function () {
        self.openReadModal();
      });
      this.table = table;
    },
    
    initToolbar: function () {
      var toolbar = new Toolbar({
        collection: this.collection,
        el: doc.getElementById('attachments-toolbar')
      });
      this.toolbar = toolbar;
    },
    
    initCreateModal: function () {
      var modal = new CreateModal({
        el: doc.getElementById('attachments-create-modal')
      });
      this.createModal = modal;
    },
    
    initDeleteModal: function () {
      var modal = new DeleteModal({
        el: doc.getElementById('attachments-delete-modal')
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
  
  Attachments.Pane = Pane;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Attachments));
