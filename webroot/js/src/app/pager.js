/*
 |------------------------------------------------------------------------------
 | App: Pager
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  var Pager = App.View.extend({
    
    _page: undefined,
    
    _limit: undefined,
    
    _total: undefined,
    
    _totalPages: undefined,
    
    initialize: function (options) {
      this._page = options.page;
      this._limit = options.limit;
      this._total = options.total;
      this._totalPages = Math.ceil(options.total / options.limit);
      this.initElement();
    },
    
    reset: function (page, limit, total) {
      this._page = page;
      this._limit = limit;
      this._total = total;
      this._totalPages = Math.ceil(total / limit);
    },
    
    initElement: function () {
      var $elem = $(this.el);
      this.$summary = $elem.find('.pager-summary');
      this.$limit = $elem.find('[data-action="limit"]');
      this.$first = $elem.find('[data-action="first"]');
      this.$prev = $elem.find('[data-action="prev"]');
      this.$next = $elem.find('[data-action="next"]');
      this.$last = $elem.find('[data-action="last"]');
      this.$nav = $elem.find('.pager-nav');
    },
    
    render: function () {
      
      var page = this._page;
      var limit = this._limit;
      var total = this._total;
      var totalPages = this._totalPages;
      var summary = 'Showing page ' + page + ' of ' + totalPages;
      
      if (total == 0) {
        $(this.el).addClass('hide');
        return;
      } else {
        $(this.el).removeClass('hide');
      }
      
      this.$summary.html(summary);
      
      if (total < limit) {
        this.$nav.addClass('hide');
        return;
      } else {
        this.$nav.removeClass('hide');
      }
      
      if (page == 1) {
        this.$first.parent().addClass('disabled');
        this.$prev.parent().addClass('disabled');
      } else {
        this.$first.parent().removeClass('disabled');
        this.$prev.parent().removeClass('disabled');
      }
      if (page == totalPages) {
        this.$next.parent().addClass('disabled');
        this.$last.parent().addClass('disabled');
      } else {
        this.$next.parent().removeClass('disabled');
        this.$last.parent().removeClass('disabled');
      }
      
    },
    
    events: {
      'change [data-action="limit"]': 'limit',
      'click [data-action="first"]': 'first',
      'click [data-action="prev"]': 'prev',
      'click [data-action="next"]': 'next',
      'click [data-action="last"]': 'last',
    },
    
    limit: function (event) {
      var limit = Number(event.currentTarget.value);
      this._page = 1;
      this._totalPages = Math.ceil(this._total / limit);
      this.trigger('limit', limit);
      this.render();
    },
    
    first: function (event) {
      if (this._page == 1) {
        return;
      }
      this._page = 1;
      this.trigger('page', this._page);
      this.render();
    },
    
    prev: function (event) {
      if (this._page == 1) {
        return;
      }
      this._page--;
      this.trigger('page', this._page);
      this.render();
    },
    
    next: function (event) {
      if (this._page == this._totalPages) {
        return;
      }
      this._page++;
      this.trigger('page', this._page);
      this.render();
    },
    
    last: function (event) {
      if (this._page == this._totalPages) {
        return;
      }
      this._page = this._totalPages;
      this.trigger('page', this._page);
      this.render();
    },
    
  });
  
  App.Pager = Pager;
  
}(window, document, jQuery, _, Backbone, moment, App));
