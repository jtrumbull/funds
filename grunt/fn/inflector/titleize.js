/*
 |------------------------------------------------------------------------------
 | Grunt\Fn\Inflector: Titleize
 |------------------------------------------------------------------------------
 */

module.exports = function(grunt) {
  
  'use strict';
  
  var titleize = function (word) {
    
    word = word.split('-').join(' ');
    word = word.split('_').join(' ');
    word = word.toLowerCase();
    return word.charAt(0).toUpperCase() + word.slice(1);
  }
  
  return titleize;
  
};
