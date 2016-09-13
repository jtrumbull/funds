/*
 |------------------------------------------------------------------------------
 | Grunt\Fn\Concat: Unwrap
 |------------------------------------------------------------------------------
 */

module.exports = function(grunt) {
  
  'use strict';
  
  var unwrap = require('./unwrap.js')(grunt);
  
  var process = function (content, filename) {
    
    var banner = '\n  /* ' + filename + ' */\n  \n  ';
    
    var unwrapped = unwrap(content);
    
    content = banner + unwrapped;
    
    return content;
    
  }
  
  return process;
  
};
