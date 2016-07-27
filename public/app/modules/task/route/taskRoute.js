(function () {
  'use strict';

  angular
    .module('task.routes')
    .config(routeConfig);

  routeConfig.$inject = ['$stateProvider','$httpProvider'];

  function routeConfig($stateProvider,$httpProvider) {
    $stateProvider
      .state('task', {
        abstract: true,
        url: '/task',
        template: '<ui-view/>'
      })
      .state('task.list', {
        url: '',
        templateUrl: 'public/app/modules/task/views/list-task.html',
        controller: 'TaskListController',
        controllerAs: 'vm'
      })
      .state('task.create', {
        url: '/create',
        templateUrl: 'public/app/modules/task/views/create-task.html',
        controller: 'TaskController',
        controllerAs: 'vm',
        resolve: {
          taskResolve: newTask
        },
        /*data: {
          roles: ['user', 'admin']
        }*/
      })
      .state('task.edit', {
        url: '/:taskId/edit',
        templateUrl: 'public/app/modules/task/views/create-task.html',
        controller: 'TaskController',
        controllerAs: 'vm',
        resolve: {
          taskResolve: getTask
        },
       /* data: {
          roles: ['user', 'admin']
        }*/
      })
      .state('task.view', {
        url: '/:taskId',
        templateUrl: 'public/app/modules/task/views/view-task.html',
        controller: 'TaskController',
        controllerAs: 'vm',
        resolve: {
          taskResolve: getTask
        }
      });
  }

  getTask.$inject = ['$stateParams', 'TaskService'];

  function getTask($stateParams, TaskService) {
    return TaskService.get({
      taskId: $stateParams.taskId
    }).$promise;
  }

  newTask.$inject = ['TaskService'];

  function newTask(TaskService) {
    return new TaskService();
  }
})();
