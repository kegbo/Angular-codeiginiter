(function () {
  'use strict';


angular.module('core')
 .constant('urls', {
        BASE: 'http://localhost:8888/Mateo/#/',
        BASE_API: 'http://localhost:8888/Mateo/api/'
    })
.config(routeConfig)
.run(runConfig);

routeConfig.$inject = ['$stateProvider','$urlRouterProvider','$httpProvider'];

  function routeConfig($stateProvider, $urlRouterProvider, $httpProvider) {
    
	  $urlRouterProvider.otherwise('/');

    $stateProvider
      .state('/', {
        url:'/',
        templateUrl: 'public/app/public/main.html',
        controller: 'MainCtrl'
      })
      .state('/signup', {
        url:'/signup',
        templateUrl: 'public/app/public/views/signup.html',
        controller: 'SignupController',
        controllerAs: 'vm'
        
      })
      .state('/login', {
        url:'/login',
        templateUrl: 'public/app/public/views/login.html',
        controller: 'SignupController',
       
       
      })
      .state('/howitworks', {
        url:'/howitworks',
        templateUrl: 'public/app/public/views/howitworks.html'
      
      })
      .state('/restricted', {
          templateUrl: 'public/app/public/views/restricted.html',
          controller: 'MainCtrl'
      });

$httpProvider.interceptors.push(['$q', '$location', '$localStorage', function ($q, $location, $localStorage) {
	   return {
	       'request': function (config) {
	           config.headers = config.headers || {};
	           if ($localStorage.token) {
	               config.headers.Authorization = 'Bearer ' + $localStorage.token;
	           }
	           return config;
	       },
	       'responseError': function (response) {
	           if (response.status === 401 || response.status === 403) {
	               $location.path('/signup');
	           }
	           return $q.reject(response);
	       }
	   };
	}]);
  };

runConfig.$inject = ['$rootScope','$location','$localStorage'];

function runConfig($rootScope, $location, $localStorage) {
    $rootScope.$on( "$routeChangeStart", function(event, next) {
        if ($localStorage.token == null) {
            if ( next.templateUrl === "public/app/public/views/restricted.html") {
                $location.path("/login");
            }
        }
    });
};
})();
