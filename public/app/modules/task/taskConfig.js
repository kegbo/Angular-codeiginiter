(function () {
  'use strict';

  angular
    .module('task')
    .run(menuConfig);

  menuConfig.$inject = ['Menus'];

  function menuConfig(Menus) {
    // Set top bar menu items
    Menus.addMenuItem('main', {
      title: 'Create Task',
      state: 'task.create'
    });

    // Add the dropdown list item
   Menus.addMenuItem('main', {
      title: 'List Task',
      state: 'task.list'
    });
  }
})();
