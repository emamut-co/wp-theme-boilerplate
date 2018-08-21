angular.module('app')
  .factory('contactFormModel', function ($http) {
    return {
      get_locations: function () {
        return $http.get('wp-json/locations/v1/get').then(function (data) {
          return data.data;
        });
      }
    }
  });