/*
 |------------------------------------------------------------------------------
 | App: Sync
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  var methodMap = {
    create: 'post',
    read: 'get',
    update: 'post',
    delete: 'post',
  }
  
  function sync (method, model, options) {
    
    var type = methodMap[method];
    var url, params, error, success, xhr, data, formData;
    
    params = { type: type, dataType: 'json' };
    
    if (options.url) {
      url = options.url;
    } else if (method == 'create') {
      url = model.api(method);
    } else if (_.isCollection(model)) {
      url = model.api();
    } else if (method == 'read') {
      url = model.api(model.id);
    } else {
      url = model.api(method + '/' + model.id);
    }
    
    params.url = url;
    
    if (model && (method == 'create' || method == 'update')) {
      data = options.data ? options.data : model.prepare();
      if (model.files) {
        formData = new FormData();
        _.each(data, function (value, key) {
          formData.append(key, value);
        });
        _.each(model.files, function (elem, key) {
          formData.append(key, elem.files[0]);
          console.log(elem.files);
        });
        params.cache = false;
        params.contentType = false;
        params.processData = false;
      }
      params.data = formData ? formData : data;
    }
    
    error = options.error;
    options.error = function(xhr, textStatus, errorThrown) {
      options.textStatus = textStatus;
      options.errorThrown = errorThrown;
      if (error) error.call(options.context, xhr, textStatus, errorThrown);
    };
    
    params.error = options.error;
    params.success = options.success;
    
    console.log(params);
    xhr = options.xhr = $.ajax(params);
    model.trigger('request', model, xhr, options);
    return xhr;
    
  }
  
  Backbone.sync = sync;
  
}(window, document, jQuery, _, Backbone, moment, App));
