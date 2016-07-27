(function () {
  'use strict';

  angular
    .module('core')
    .factory('Data', Data);

  Data.$inject = ['$http', 'urls'];

  function Data($http, urls) {
    return 
    {
        getRestrictedData: function (success, error) {
            $http.get(urls.BASE + '/restricted').success(success).error(error)
        },
        getApiData: function (success, error) {
            $http.get(urls.BASE_API + '/restricted').success(success).error(error)
        }
    };
  }
})();
