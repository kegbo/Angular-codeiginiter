(function () {
  'use strict';

  angular
  .module('core')
  .run(MenuConfig);

  MenuConfig.$inject = ['Menus'];

  function MenuConfig(Menus) {
  
    Menus.addMenu('main');

    Menus.addMenuItem('main', {
      title: 'Login',
      state: '/login'
    });

    Menus.addMenuItem('main', {
      title: 'How it works',
      state: '/howitworks'
    });

    Menus.addMenuItem('main', {
      title: 'Signup',
      state: '/signup'
    });
  }

})();
