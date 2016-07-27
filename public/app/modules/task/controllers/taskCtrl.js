(function () {
  'use strict';

  angular
    .module('task')
    .controller('TaskController', TaskController);

  TaskController.$inject = ['$scope', '$state', 'taskResolve'];

  function TaskController($scope, $state, task) {
    var vm = this;

    vm.task = task;
    vm.error = null;
    vm.form = {};
    vm.remove = remove;
    vm.save = save;
    
    
   

    //Get one task
    // Remove existing Task
    function remove() {
      if (confirm('Are you sure you want to delete?')) {
        vm.task.$remove($state.go('task.list'));
      }
    }

    // Save Article
    function save(isValid) {
      if (!isValid) {
        $scope.$broadcast('show-errors-check-validity', 'vm.form.taskForm');
        return false;
      }
      
      if (vm.task._id) {
        vm.task.$update(successCallback, errorCallback);
      } else {
        vm.task.$save(successCallback, errorCallback);
      }

      function successCallback(res) {
        $state.go('task.view', {
          taskId: res._id
        });
      }

      function errorCallback(res) {
        vm.error = res.data.message;
      }
    }
  }
})();
