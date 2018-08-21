angular.module('app')
  .controller('sliderController', function ($scope, sliderModel) {
    $scope.slides = [];
    sliderModel.get_slides().then(function (data) {
      $scope.slides = data;
    });
  });
