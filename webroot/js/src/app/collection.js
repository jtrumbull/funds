/*
 |------------------------------------------------------------------------------
 | App: Collection
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, Model){
  
  'use strict';
  
  var Collection = Backbone.Collection.extend({
    
    model: Model,
    
    urlRoot: undefined,
    
    /*
     |--------------------------------------------------------------------------
     | Application endpoints
     |--------------------------------------------------------------------------
     */
    
    url: function (path, query) {
      var url = this.urlRoot;
      if (path) {
        url += '/' + path;
      }
      return App.url(url);
    },
    
    api: function (path, query) {
      var url = this.urlRoot;
      if (path) {
        url += '/' + path;
      }
      return App.api(url);
    },
    
    /*
     |--------------------------------------------------------------------------
     | Model selection
     |--------------------------------------------------------------------------
     */
    
    _selected: [],
    
    select: function (cid) {
      this._selected.push(this.get(cid));
      this.trigger('select', cid);
    },
    
    deselect: function (cid) {
      if (!cid) {
        this.deselectAll();
      }
      var selected = [];
      _.each(this._selected, function (model) {
        if (model.cid !== cid) {
          selected.push(model);
        }
      });
      this._selected = selected;
      this.trigger('deselect', cid);
    },
    
    deselectAll: function () {
      this._selected = [];
      this.trigger('deselect');
    },
    
    selected: function () {
      return this._selected;
    }
    
  });
  
  App.Collection = Collection;
  
}(window, document, jQuery, _, Backbone, moment, App, App.Model));
