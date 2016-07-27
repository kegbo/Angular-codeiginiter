(function () {
  'use strict';

  angular
    .module('core')
    .controller('SignupController', SignupController);

  SignupController.$inject = ['$rootScope','$scope', '$state','$location','localStorage','Auth'];

  function SignupController($rootScope, $scope, $state, $location, $localStorage, $Auth, user_data){
	  
	  var vm = this;
	  vm.user_data = user_data;
	  vm.login = login;
	  vm.signup = signup;
	  vm.logout = logout;
	  
	 

      function login() {
    	  var formData = {
                  email: $scope.email,
                  password: $scope.password
              };
          Auth.signin(formData, successAuth, function () {
              $rootScope.error = 'Invalid credentials.';
          })
      };

      function signup() {
         

          Auth.signup(user_data, successAuth, function () {
              $rootScope.error = 'Failed to signup';
          })
      };

      function logout() {
          Auth.logout(function () {
              $state.go('/');
          });
      };
      
      function successAuth(res) {
          $localStorage.token = res.token;
          $state.go('users.dashbard');
      }
	  
	  $scope.token = $localStorage.token;
      $scope.tokenClaims = Auth.getTokenClaims();

	
	}
}());
