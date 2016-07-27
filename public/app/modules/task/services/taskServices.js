(function () {
  'use strict';

  angular
    .module('task.services')
    .factory('TaskService', TaskService);

  TaskService.$inject = ['$resource'];

  function TaskService($resource) {
    return $resource('api/task/:taskId', {
      taskId: '@_id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
})();
