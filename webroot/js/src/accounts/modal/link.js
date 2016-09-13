/*
 |------------------------------------------------------------------------------
 | App\Accounts\Modal: Link
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Accounts){
  
  'use strict';
  
  var LinkModal = App.Modal.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function () {
      this.initTable();
    },
    
    initTable: function () {
      var table = new Table({
        collection: this.collection,
        el: doc.getElementById('accounts-link-modal-table'),
        pager: doc.getElementById('accounts-link-modal-table-pager'),
        searchbox: doc.getElementById('accounts-link-modal-searchbox'),
        selectable: false,
      });
      table.on('row-click', function (cid, row) {
        $(row.cells[0]).find('input').click();
      });
      this.table = table;
    },
    
    initSearch: function () {
      var $searchbox = this.$el.find('[data-action="search"]');
      var $rows = this.$el.find('table tbody tr');
      $searchbox.on('input', function () {
        var search = this.value.toLowerCase();
        $rows.removeClass('hide');
        $rows.filter(function (index) {
          var value = this.cells[1].innerHTML.toLowerCase();
          return value.indexOf(search) == -1;
        }).addClass('hide');
      });
    },
    
    render: function () {
      this.table.render();
      this.open();
    },
    
  });
  
  Accounts.LinkModal = LinkModal;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Accounts));
