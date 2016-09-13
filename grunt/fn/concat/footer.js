/*
 |------------------------------------------------------------------------------
 | Grunt\Fn\Concat: Footer
 |------------------------------------------------------------------------------
 */

module.exports = function(grunt) {
  
  'use strict';
  
  var footer = function (model) {
    
    var name = '';
    var pieces = model.split('-');
    for (var i = 0, len = pieces.length; i < len; i++) {
      var piece = pieces[i];
      name+= piece.charAt(0).toUpperCase() + piece.slice(1).toLowerCase();
    }
    
    if (model !== 'app') {
      var out;
      out = '\n  \n  App.' + name + ' = ' + name + ';\n  \n';
      out+= '}(window, document, jQuery, _, Backbone, moment, App));';
      return out;
    } else {
      return '\n  \n}(window, document, jQuery, _, Backbone, moment));';
    }
    
    return out.join('\n');
    
  }
  
  return footer;
  
};
