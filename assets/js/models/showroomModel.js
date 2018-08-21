angular.module('app')
  .factory('showroomModel', function ($http) {
    return {
      get_categories: function () {
        return $http.get('wp-json/cars/v1/get_categories').then(function (data) {
          return data.data;
        });
      },
      get_cars_by_category: function (id_category) {
        return $http.get('wp-json/cars/v1/get/' + id_category).then(function (data) {
          return data.data;
        });
      }
    }
  });