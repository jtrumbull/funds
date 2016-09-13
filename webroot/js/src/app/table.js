/*
 |------------------------------------------------------------------------------
 | App: Table
 |------------------------------------------------------------------------------
 */

(function (win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  var Table = App.View.extend({
    
    defaults: {
      page: 1,
      limit: 10,
      paginate: true,
      searchable: true,
      searchText: undefined,
      searchFields: undefined,
      selectable: true,
      sortable: true,
      sortOrder: 'asc',
      sortField: 'id'
    },
    
    columnDefaults: {
      field: undefined,
      title: undefined,
      visible: true,
      cellClass: undefined,
      sortable: true,
    },
    
    effectiveLength: 0,
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function (options) {
      this.options = _.extend({}, this.defaults, options);
      this.initElement();
      this.initColumns();
      this.initRecords();
      this.initPager();
      this.initSearchbox();
      this.initEvents();
      this.effectiveLength = this.collection.length;
    },
    
    initElement: function () {
      var elem = this.el;
      this.thead = elem.tHead;
      this.tbody = elem.tBodies[0];
      this.tfoot = elem.tFoot;
      this.theadRow = this.thead.rows[0];
    },
    
    initColumns: function () {
      var columns = [];
      var defaults = this.columnDefaults;
      var column;
      _.each(this.theadRow.cells, function (cell) {
        column = {};
        if (cell.hasAttribute('data-field')) {
          column.field = cell.getAttribute('data-field')
        }
        if (cell.hasAttribute('data-title')) {
          column.title = cell.getAttribute('data-title')
        } else {
          column.title = cell.innerHTML;
        }
        if (cell.hasAttribute('data-sortable')) {
          column.sortable = cell.getAttribute('data-sortable') == 'true';
        }
        if (cell.hasAttribute('data-visible')) {
          column.visible = cell.getAttribute('data-visible') == 'true';
        }
        if (cell.hasAttribute('data-cell-class')) {
          column.cellClass = cell.getAttribute('data-cell-class');
        }
        column = _.extend({}, defaults, column);
        columns.push(column);
      });
      this.columns = columns;
    },
    
    initRecords: function () {
      
    },
    
    initPager: function () {
      
      if (!this.options.paginate) return;
      
      var self = this;
      var pager = new Pager({
        el: this.options.pager,
        page: this.options.page,
        limit: this.options.limit,
        total: this.collection.length,
      });
      
      pager.on('limit', function (limit) {
        self.options.page = 1;
        self.options.limit = limit;
        self.renderBody();
      });
      
      pager.on('page', function (page) {
        self.options.page = page;
        self.renderBody();
      });
      
      this.pager = pager;
    },
    
    initSearchbox: function () {
      
      if (!this.options.searchable) return;
      
      var self = this;
      var input = this.options.searchbox;
      
      $(input).on('input', function () {
        self.options.page = 1;
        self.options.searchText = this.value;
        self.renderBody();
      });
      
    },
    
    initEvents: function () {
      var self = this;
      var collection = this.collection;
      collection.on('update', function () {
        self.render();
      });
      collection.on('update-model', function () {
        self.render();
      });
    },
    
    /*
     |--------------------------------------------------------------------------
     | Render
     |--------------------------------------------------------------------------
     */
    
    render: function () {
      this.pager.render();
      this.renderHead();
      this.renderBody();
    },
    
    renderHead: function () {
      var theadRow = this.theadRow;
      var order = this.options.sortOrder;
      var field = this.options.sortField;
      _.each(this.columns, function (column, i) {
        var $cell = $(theadRow.cells[i]);
        $cell.removeClass('asc').removeClass('desc');
        if (column.sortable) {
          if (!$cell.hasClass('sortable')) {
            $cell.addClass('sortable');
          }
          if (column.field == field) {
            $cell.addClass(order);
          }
        } else {
          $cell.removeClass('sortable');
        }
      });
    },
    
    renderBody: function () {
      var tbody = this.tbody;
      var options = this.options;
      var collection = this.collection;
      var columns = this.columns;
      var effectiveLength = collection.length;
      
      tbody.innerHTML = '';
      
      if (collection.length == 0) {
        return this._renderEmptyBody();
      }
      
      // Sort
      if (options.sortable && options.sortField && options.sortOrder) {
        var field = options.sortField;
        var order = options.sortOrder;
        collection.comparator = field;
        collection.sort();
        if (order == 'desc') collection.models.reverse();
      }
      
      var models = collection.models;
      var columns = this.columns;
      var tbody = this.tbody;
      
      // Seach
      if (options.searchable && options.searchText) {
        var searchText = options.searchText.toLowerCase();
        var searchFields = options.searchFields;
        models = collection.filter(function (model) {
          if (!searchFields) {
            searchFields = model.keys();
          }
          var pass = false;
          _.each(searchFields, function (attr) {
            if (pass) {
              return;
            }
            var value = (String(model.get(attr))).toLowerCase();
            if (value.indexOf(searchText) !== -1) {
              pass = true;
            } else {
              value = (String(model.format(attr))).toLowerCase();
              if (value.indexOf(searchText) !== -1) {
                pass = true;
              }
            }
          });
          return pass;
        });
        if (models.length == 0) {
          return this._renderNoResults();
        }
        effectiveLength = models.length;
        console.log(effectiveLength);
      }
      
      // Paginate
      if (options.paginate) {
        var page = this.options.page;
        var limit = this.options.limit;
        var start = limit * (page - 1);
        var end = start + limit;
        models = models.slice(start, end);
      }
      
      _.each(models, function (model) {
        
        var tr = doc.createElement('tr');
        
        tr.setAttribute('data-cid', model.cid);
        
        _.each(columns, function (column) {
          
          var td = doc.createElement('td');
          var value = model.format(column.field);
          
          if (_.isElement(value)) {
            td.appendChild(value);
          } else {
            td.innerHTML = value;
          }
          
          if (column.cellClass) {
            td.className = column.cellClass;
          }
          
          tr.appendChild(td);
          
        });
        
        tbody.appendChild(tr);
        
      });
      
      this.renderVisibility();
      
      if (this.pager) {
        this.pager._page = page;
        this.pager._total = effectiveLength;
        this.pager._totalPages = Math.ceil(effectiveLength / this.options.limit);
        this.pager.render();
      }
      
    },
    
    renderVisibility: function () {
      var $table = $(this.el);
      var columns = this.columns;
      _.each(columns, function (column, i) {
        if (!column.visible) {
          var index = i + 1;
          $table.find('th:nth-child(' + index + ')').hide();
          $table.find('tr[data-cid] td:nth-child(' + index + ')').hide();
        }
      });
    },
    
    _renderEmptyBody: function () {
      var tr = doc.createElement('tr');
      var td = doc.createElement('td');
      tr.className = 'warning';
      td.setAttribute('colspan', this.columns.length);
      td.innerHTML = 'Ne records found';
      tr.appendChild(td);
      this.tbody.appendChild(tr);
      this.renderVisibility();
      if (this.pager) {
        this.pager._page = 1;
        this.pager._total = 0;
        this.pager._totalPages = 1;
        this.pager.render();
      }
    },
    
    _renderNoResults: function () {
      var tr = doc.createElement('tr');
      var td = doc.createElement('td');
      tr.className = 'warning';
      td.setAttribute('colspan', this.columns.length);
      td.innerHTML = 'Ne records found, matching your search criteria';
      tr.appendChild(td);
      this.tbody.appendChild(tr);
      this.renderVisibility();
      if (this.pager) {
        this.pager._page = 1;
        this.pager._total = 0;
        this.pager._totalPages = 1;
        this.pager.render();
      }
    },
    
    /*
     |--------------------------------------------------------------------------
     | Table actions
     |--------------------------------------------------------------------------
     */
    
    select: function (cid) {
      this.deselectAll();
      $(this.tbody).find('tr[data-cid="' + cid + '"]').addClass('active');
      this.collection.select(cid);
    },
    
    deselect: function (cid) {
      if (!cid) {
        this.deselectAll();
      }
      $(this.tbody).find('tr[data-cid="' + cid + '"]').removeClass('active');
      this.collection.deselect(cid);
    },
    
    deselectAll: function () {
      $(this.tbody).find('tr.active').removeClass('active');
      this.collection.deselectAll();
    },
    
    sort: function (field, order) {
      order || (order = 'asc');
      this.options.sortField = field;
      this.options.sortOrder = order;
      this.render();
    },
    
    /*
     |--------------------------------------------------------------------------
     | Events
     |--------------------------------------------------------------------------
     */
    
    events: {
      'click tbody tr': 'rowClick',
      'dblclick tbody tr': 'rowDblClick',
      'click th.sortable': 'sortClick'
    },
    
    rowClick: function (event) {
      var row = event.currentTarget;
      var cid = row.getAttribute('data-cid');
      if (!cid) {
        return;
      }
      if (!this.options.selectable) {
        this.trigger('row-click', cid, row);
        return;
      }
      if (row.className.indexOf('active') !== -1) {
        this.deselect(cid);
        return;
      }
      this.select(cid);
      this.trigger('row-click', cid);
    },
    
    rowDblClick: function (event) {
      var row = event.currentTarget;
      var cid = row.getAttribute('data-cid');
      if (!cid) {
        return;
      }
      if (!this.options.selectable) {
        this.trigger('row-dblclick', cid);
        return;
      }
      this.select(cid);
      this.trigger('row-dblclick', cid, row);
    },
    
    sortClick: function (event) {
      var row = event.currentTarget;
      var $row = $(row);
      var field = row.getAttribute('data-field');
      var isAsc = $row.hasClass('asc');
      var isDesc = $row.hasClass('asc');
      if (isAsc) return this.sort(field, 'desc');
      this.sort(field, 'asc');
    },
    
  });
  
  App.Table = Table;
  
}(window, document, jQuery, _, Backbone, moment, App));
