(function () {
  'use strict';

  angular
    .module('users')
    .run(menuConfig);

  menuConfig.$inject = ['Menus'];

  function menuConfig(Menus) {
    // Set top bar menu items
    Menus.addMenuItem('main', {
      title: 'My Task',
      state: 'users.view'
    });

    // Add the dropdown list item
   Menus.addMenuItem('main', {
      title: 'Dashboard',
      state: 'users.dashboard'
    });
  }
})();
