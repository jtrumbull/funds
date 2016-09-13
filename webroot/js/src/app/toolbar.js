/*
 |------------------------------------------------------------------------------
 | App: Toolbar
 |------------------------------------------------------------------------------
 */

(function(win, doc, $, _, Backbone, Moment, App){
  
  'use strict';
  
  var Toolbar = App.View.extend({
    
    initialize: function (options) {
      var self = this;
      var collection = this.collection;
      function render () { self.render(); }
      collection.on('select', render);
      collection.on('deselect', render);
      collection.on('deselect-all', render);
    },
    
    render: function () {
      var $elem = this.$el;
      var len = this.collection.selected().length;
      var actions = [ 'read', 'update', 'delete', 'unlink' ];
      var $input;
      _.each(actions, function (action) {
        $input = $elem.find('[data-action="' + action + '"]');
        if ($input.length == 0) return;
        if (len == 0) {
          $input.addClass('disabled').prop('disabled', true);
        } else {
          $input.removeClass('disabled').prop('disabled', false);
        }
      });
    },
    
    events: {
      'click [data-action="read"]': 'read',
      'click [data-action="create"]': 'create',
      'click [data-action="update"]': 'update',
      'click [data-action="delete"]': 'delete',
    },
    
    read: function () {
      
    },
    
    create: function () {
      
    },
    
    update: function () {
      
    },
    
    delete: function () {
      
    },
    
  });
  
  App.Toolbar = Toolbar;
  
}(window, document, jQuery, _, Backbone, moment, App));
