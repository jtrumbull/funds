/*
 |------------------------------------------------------------------------------
 | Grunt: Watch
 |------------------------------------------------------------------------------
 */

module.exports = function(grunt) {
  
  'use strict';
  
  var options = {
    scripts: {
      files: ['webroot/js/src/**/*.js'],
      tasks: ['concat']
    },
  };
  
  return options;
  
};
