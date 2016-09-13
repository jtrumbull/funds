/*
 |------------------------------------------------------------------------------
 | Grunt: Concat
 |------------------------------------------------------------------------------
 */

module.exports = function(grunt) {
  
  'use strict';
  
  var src = 'webroot/js/src';
  var dest = 'webroot/js/dist';
  var header = require('./fn/concat/header')(grunt);
  var footer = require('./fn/concat/footer')(grunt);
  var process = require('./fn/concat/process')(grunt);
  var options = {};
  
  var dirs = grunt.file.expand(src + '/*');
  var i, len, dir, pieces, model;
  
  for (i = 0, len = dirs.length; i < len; i++) {
    
    dir = dirs[i];
    pieces = dirs[i].split('/');
    model = pieces[pieces.length - 1];
    
    options[model] = {
      options: {
        banner: header(model),
        footer: footer(model),
        process: process
      },
      src: grunt.file.expand([
        dir + '/app.js',
        dir + '/model.js',
        dir + '/collection.js',
        dir + '/view.js',
        dir + '/mixins.js',
        dir + '/form.js',
        dir + '/form/**/*.js',
        dir + '/profile.js',
        dir + '/modal.js',
        dir + '/modal/**/*.js',
        dir + '/pager.js',
        dir + '/table.js',
        dir + '/**/*.js',
      ]),
      dest: dest + '/' + model + '.js'
    }
    
  }
  
  return options;
  
};
