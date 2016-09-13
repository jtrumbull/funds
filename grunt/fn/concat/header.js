/*
 |------------------------------------------------------------------------------
 | Grunt\Fn\Concat: Header
 |------------------------------------------------------------------------------
 */

module.exports = function(grunt) {
  
  'use strict';
  
  var _banner = require('./banner.js')(grunt);
  var _titleize = require('../inflector/titleize.js')(grunt);
  
  var header = function (model) {
    
    var out = [
      _banner(model),
      '(function (win, doc, $, _, Backbone, Moment' + (model !== 'app' ? ', App' : '') + '){\n  ',
      '  "use strict";\n  ',
    ];
    
    if (model !== 'app') {
      
      var name = '';
      var pieces = model.split('-');
      for (var i = 0, len = pieces.length; i < len; i++) {
        var piece = pieces[i];
        name+= piece.charAt(0).toUpperCase() + piece.slice(1).toLowerCase();
      }
      
      out.push('  var ' + name + ' = {};\n  ');
      
    }
    
    return out.join('\n');
    
  }
  
  return header;
  
};
