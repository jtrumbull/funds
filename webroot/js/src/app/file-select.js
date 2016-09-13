/*
 |------------------------------------------------------------------------------
 | App\Attachments: File select
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App, View){
  
  'use strict';
  
  var Progress = App.Progress;
  
  var FileSelect = View.extend({
    
    /*
     |--------------------------------------------------------------------------
     | Initialize
     |--------------------------------------------------------------------------
     */
    
    initialize: function (options) {
      var self = this;
      var $btn = this.$el.find('button');
      var $title = this.$el.find('div.form-control');
      var $input = this.$el.find('[type=file]');
      if (options.progress) {
        this.initProgress(options.progress);
      }
      this.clear();
      
      $btn.on('click', function () {
        $input.click();
      });
      
      $input.on('change', function (event) {
        if (this.value) {
          $title.html(this.value.split(/(\\|\/)/g).pop());
        } else {
          this.clear();
        }
      });
      
    },
    
    initProgress: function (elem) {
      var progress = new Progress({
        el: elem
      });
      this.progress = progress;
    },
    
    clear: function () {
      var $input = this.$el.find('[type=file]');
      var $title = this.$el.find('div.form-control');
      $title.html('<i style="color: #777;">No file selected</i>');
      $input[0].value = '';
    },
    
  });
  
  App.FileSelect = FileSelect;
  
}(window, document, jQuery, _, Backbone, moment, App, App.View));
