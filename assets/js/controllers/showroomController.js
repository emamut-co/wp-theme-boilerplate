angular.module('app')
  .controller('showroomController', function ($rootScope, $scope, showroomModel) {
    $scope.categories = [];
    $rootScope.active_category = {};
    $rootScope.cars = [];

    showroomModel.get_categories().then(function (data) {
      $scope.categories = data;
      $rootScope.active_category = data[0];
      $scope.get_cars_by_category();
    });

    $scope.get_category_active_class = function (term_id, navbar = false) {
      var className = navbar ? 'active-category' : 'active';
      return term_id == $rootScope.active_category.term_id ? className : '';
    }

    $scope.change_active_category = function (term_id) {
      if(term_id != $rootScope.active_category.term_id) {
        $rootScope.active_category = $scope.categories.find(function (category) {
          return category.term_id == term_id;
        });

        $scope.get_cars_by_category();
      }
    }

    $scope.get_cars_by_category = function () {
      showroomModel.get_cars_by_category($rootScope.active_category.term_id).then(function (data) {
        $rootScope.cars = data;
      });
    }
  });