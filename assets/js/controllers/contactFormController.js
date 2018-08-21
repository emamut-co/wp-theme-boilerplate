angular.module('app')
  .controller('contactFormController', function ($rootScope, contactFormModel) {
    $rootScope.locations = {};
    $rootScope.cities = ['Quito', 'Guayaquil', 'Ambato', 'Cuenca', 'Manta'];

    contactFormModel.get_locations().then(function (data) {
      $rootScope.locations = data;
    });
  });
