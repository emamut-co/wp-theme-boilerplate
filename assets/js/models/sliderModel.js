angular.module('app')
  .factory('sliderModel', function ($http) {
    return {
      get_slides: function () {
        return $http.get('wp-json/slider/v1/get').then(function (data) {
          return data.data;
        });
      }
    }
  });