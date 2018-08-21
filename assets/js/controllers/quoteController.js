angular.module('app')
  .controller('quoteController', function ($scope, showroomModel) {
    $scope.cars = {};
    $scope.client_types = [
      'Empresa',
      'Soltero',
      'Casado',
      'Union Libre',
      'Divorciado',
      'Viudo'
    ];
    $scope.insurers = [
      'Latina Seguros',
      'QBE - Colonial'
    ];
    $scope.terms = [
      1,
      2,
      3,
      4,
      5,
      6,
      7,
      8,
      9,
      10,
      11,
      12,
      18,
      24,
      36,
      48,
      60
    ];

    showroomModel.get_categories().then(function (categories) {
      categories.forEach(category => {
        showroomModel.get_cars_by_category(category.term_id).then(function (cars) {
          $scope.cars[category.name] = cars;
        });
      });
    });
  });
