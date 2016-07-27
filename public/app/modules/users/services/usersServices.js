(function () {
  'use strict';

  angular
    .module('users.services')
    .factory('UsersService', UsersService);

  UsersService.$inject = ['$resource'];

  function UsersService($resource) {
    return $resource('api/users/:usersId', {
      usersId: '@_id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
})();
