(function () {
  'use strict';

  angular
    .module('users.routes')
    .config(routeConfig);

  routeConfig.$inject = ['$stateProvider','$httpProvider'];

  function routeConfig($stateProvider,$httpProvider) {
    $stateProvider
      .state('users', {
        abstract: true,
        url: '/users',
        template: '<ui-view/>'
      })
      .state('users.dashboard', {
        url: '/dashboard',
        templateUrl: 'public/app/modules/users/views/dashboard.html',
        controller: 'UsersListController',
        controllerAs: 'vm'
        
      })
      .state('users.list', {
        url: '',
        templateUrl: 'public/app/modules/users/views/list-user.html',
        controller: 'UsersListController',
        controllerAs: 'vm'
      })
      .state('users.create', {
        url: '/create',
        templateUrl: 'public/app/modules/users/views/create-user.html',
        controller: 'UsersController',
        controllerAs: 'vm',
        resolve: {
          usersResolve: newUsers
        },
        /*data: {
          roles: ['user', 'admin']
        }*/
      })
      .state('users.edit', {
        url: '/:usersId/edit',
        templateUrl: 'public/app/modules/users/views/create-user.html',
        controller: 'UsersController',
        controllerAs: 'vm',
        resolve: {
          usersResolve: getUsers
        },
        /*data: {
          roles: ['user', 'admin']
        }*/
      })
      .state('users.view', {
        url: '/:usersId',
        templateUrl: 'public/app/modules/users/views/view-user.html',
        controller: 'UsersController',
        controllerAs: 'vm',
        resolve: {
          usersResolve: getUsers
        }
      });
  }

  getUsers.$inject = ['$stateParams', 'UsersService'];

  function getUsers($stateParams, UsersService) {
    return UsersService.get({
      usersId: $stateParams.usersId
    }).$promise;
  }

  newUsers.$inject = ['UsersService'];

  function newUsers(UsersService) {
    return new UsersService();
  }
})();
