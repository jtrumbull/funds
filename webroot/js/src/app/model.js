/*
 |------------------------------------------------------------------------------
 | App: Model
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  function formateDate (value) {
    if (!value) return null;
    if (value.indexOf('T00:00:00+00:00') !== -1) {
      // T00:00:00+00:00 forces previous day
      // Strip off to retain correct date
      // Permanent fix is in server response,
      // not returning combined time on date fields 
      // -only on timestamps
      value = value.split('T')[0];
    }
    value = Moment(value).format('MM/DD/YYYY');
    return value;
  }
  
  var Model = Backbone.Model.extend({
    
    defaults: {},
    
    files: undefined,
    
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
      return App.url(url, query);
    },
    
    api: function (path) {
      return App.api(this.urlRoot + '/' + path);
    },
    
    /*
     |--------------------------------------------------------------------------
     | Formatting
     |--------------------------------------------------------------------------
     */
    
    formats: {
      
      currency: function (value) {
        value = value ? 
          value.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,') : 
          '-';
        var parent = doc.createElement('span');
        var symbol = doc.createElement('span');
        var number = doc.createElement('span');
        symbol.innerHTML = '$ ';
        symbol.className = 'symbol';
        number.innerHTML = value;
        number.className = 'number';
        parent.appendChild(symbol);
        parent.appendChild(number);
        parent.className = 'currency';
        return parent;
      },
      
      date: formateDate,
      
      created: formateDate,
      
      modified: formateDate,
      
      created_by: function (value) {
        var name = value ? value.username : 'System';
        if (name.indexOf('@') !== -1) {
          name = name.split('@')[0];
        }
        return name;
      },
      
      modified_by: function (value) {
        var name = value ? value.username : 'System';
        if (name.indexOf('@') !== -1) {
          name = name.split('@')[0];
        }
        return name;
      },
      
      location: function (value, model) {
        if (value) return value;
        var city = model.get('city');
        var state = model.get('state');
        var zip = model.get('zip');
        if (!city && !state && !zip) {
          return 'Unknown';
        }
        var location;
        if (city && state) {
          location = city + ', ' + state;
        } else {
          location = city ? city : state;
        }
        if (zip) {
          location += ' ' + zip;
        }
        return location.trim();
      }
      
    },
    
    format: function (attr) {
      var value = this.get(attr);
      var formatter = this.formats[attr];
      if (formatter) {
        value = formatter(value, this);
      }
      return value;
    },
    
    /*
     |--------------------------------------------------------------------------
     | Validation
     |--------------------------------------------------------------------------
     */
    
    validate: function () {
      
    },
    
    /*
     |--------------------------------------------------------------------------
     | Prepare data for save
     |--------------------------------------------------------------------------
     */
    
    prepare: function () {
      return this.attributes;
    },
    
    parse: function (response) {
      return response[this.serverNode];
    },
    
    
    addFile: function (name, elem) {
      if (!this.files) {
        this.files = {};
      }
      this.files[name] = elem;
    },
    
  });
  
  App.Model = Model;
  
}(window, document, jQuery, _, Backbone, moment, App));
