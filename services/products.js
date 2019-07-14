
app.factory('products', ['$http', function($http) {
    return $http.get('http://localhost:50/IHM_SITE/php/Products.php')

    //return $http.get('https://s3.amazonaws.com/codecademy-content/courses/ltp4/photos-api/photos.json')
           .success(function(data) {
             return data;
           })
           .error(function(data) {
             return data;
           });
  }]);