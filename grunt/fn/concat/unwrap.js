/*
 |------------------------------------------------------------------------------
 | Grunt\Fn\Concat: Unwrap
 |------------------------------------------------------------------------------
 */

module.exports = function(grunt) {
  
  'use strict';
  
  var unwrap = function (content) {
    
    content = content.split("'use strict';")[1];
    
    if (content) {
      content = content.split("}(window, document")[0].trim();
    } else {
      content = '';
    }

    return content;
    
  }
  
  return unwrap;
  
};
