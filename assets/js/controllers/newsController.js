angular.module('app')
  .controller('newsController', function ($scope, newsModel, $window) {
    $scope.posts = [];

    newsModel.get_news_posts().then(function (data) {
      $scope.posts = data;
      $scope.postsChunk = _.chunk($scope.posts, 4);
    });

    $scope.goToPost = function (post_url) {
      console.log('post_url', post_url)
      $window.location.href = post_url;
    }
  });
