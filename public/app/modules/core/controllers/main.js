(function () {
  'use strict';

  angular
    .module('core')
    .controller('MainCtrl', MainCtrl);

  MainCtrl.$inject = ['$rootScope', '$scope', 'Data'];

  function MainCtrl($rootScope, $scope, Data) {
      Data.getRestrictedData(function (res) {
          $scope.data = res.data;
      }, function () {
          $rootScope.error = 'Failed to fetch restricted content.';
      });
      Data.getApiData(function (res) {
          $scope.api = res.data;
      }, function () {
          $rootScope.error = 'Failed to fetch restricted API content.';
      });
	
	}
}());
