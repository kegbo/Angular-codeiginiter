(function () {
  'use strict';

  angular
    .module('users')
    .controller('UsersController', UsersController);

  UsersController.$inject = ['$scope', '$state'];

  function UsersController($scope, $state, users) {
    var vm = this;

    vm.users = users;
    //vm.authentication = Authentication;
    vm.error = null;
    vm.form = {};
    vm.remove = remove;
    vm.save = save;  

    // Remove existing Article
    function remove() {
      if (confirm('Are you sure you want to delete?')) {
        vm.users.$remove($state.go('users.list'));
      }
    }

    // Save Article
    function save(isValid) {
      if (!isValid) {
        $scope.$broadcast('show-errors-check-validity', 'vm.form.usersForm');
        return false;
      }

      // TODO: move create/update logic to service
      if (vm.users._id) {
        vm.users.$update(successCallback, errorCallback);
      } else {
        vm.users.$save(successCallback, errorCallback);
      }

      function successCallback(res) {
        $state.go('users.view', {
          usersId: res._id
        });
      }

      function errorCallback(res) {
        vm.error = res.data.message;
      }
    }
  }
})();
