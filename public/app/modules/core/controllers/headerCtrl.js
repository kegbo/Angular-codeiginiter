'use strict';

angular.module('core').controller('HeaderController', ['$scope', '$state','Menus',
  function ($scope, $state, Menus) {
    // Expose view variables
    $scope.$state = $state;
    //$scope.authentication = Authentication;
    // Get the topbar menu
    $scope.menu = Menus.getMenu('main');
 



    // Get the account menu
//    $scope.accountMenu = Menus.getMenu('account').items[0];

    // Toggle the menu items
    /*$scope.isCollapsed = false;
    $scope.toggleCollapsibleMenu = function () {
      $scope.isCollapsed = !$scope.isCollapsed;
    };

    // Collapsing the menu after navigation
    $scope.$on('$stateChangeSuccess', function () {
      $scope.isCollapsed = false;
    });*/
  }
]);
