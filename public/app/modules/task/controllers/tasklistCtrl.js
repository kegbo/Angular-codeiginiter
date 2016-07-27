(function () {
  'use strict';

  angular
    .module('task')
    .controller('TaskListController', TaskListController);

  TaskListController.$inject = ['TaskService'];

  function TaskListController(TaskService) {
    var vm = this;

    vm.task = TaskService.query();
  }
})();
