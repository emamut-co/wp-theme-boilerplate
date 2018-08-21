angular.module('app')
  .factory('newsModel', function ($http) {
    return {
      get_news_posts: function () {
        return $http.get('wp-json/news_posts/v1/get').then(function (data) {
          return data.data;
        });
      }
    }
  });