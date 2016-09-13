/*
 |------------------------------------------------------------------------------
 | App\InvestorsAccounts\View: Index
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, InvestorsAccounts){
  
  'use strict';
  
  var Toolbar = App.Toolbar;
  var Model = InvestorsAccounts.Model;
  var Table = InvestorsAccounts.Table;
  var CreateModal = InvestorsAccounts.CreateModal;
  var UpdateModal = InvestorsAccounts.UpdateModal;
  var DeleteModal = InvestorsAccounts.DeleteModal;
  
  var IndexView = InvestorsAccounts.View.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function (options) {
      this.initTable();
      this.initToolbar();
      this.initCreateModal();
      this.initUpdateModal();
      this.initDeleteModal();
    },
    
    initTable: function () {
      var collection = this.collection;
      var table = new Table({
        collection: collection,
        el: doc.getElementById('investors-accounts-table'),
        pager: doc.getElementById('table-pager'),
        searchbox: doc.getElementById('table-searchbox'),
      });
      table.on('row-dblclick', function () {
        var model = collection.selected()[0];
        win.location = model.url(model.get('id'));
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
     | Redner
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
      'click [data-action="create"]': 'openCreateModal',
      'click [data-action="update"]': 'openUpdateModal',
      'click [data-action="delete"]': 'openDeleteModal',
    },
    
    openCreateModal: function () {
      var self = this;
      var model = new Model();
      this.createModal.reset(model);
      this.createModal.render();
      model.on('sync', function () {
        self.collection.add(model);
        model.off('sync');
      });
    },
    
    openUpdateModal: function () {
      var self = this;
      var selected = this.collection.selected();
      if (selected.length !== 1) return;
      var model = selected[0];
      this.updateModal.reset(model);
      this.updateModal.render();
      model.on('sync', function () {
        self.collection.trigger('update-model', model);
        model.off('sync');
      });
    },
    
    openDeleteModal: function () {
      var self = this;
      var selected = this.collection.selected();
      if (selected.length !== 1) return;
      var model = selected[0];
      this.deleteModal.reset(model);
      this.deleteModal.render();
    },
    
  });
  
  InvestorsAccounts.IndexView = IndexView;
  
}(window, document, jQuery, _, Backbone, moment, App, App.InvestorsAccounts));
