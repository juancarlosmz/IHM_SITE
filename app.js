var app = angular.module('appDemo', [
  'ngRoute',
  'empleadoControllers'
]);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'partials/home.html',
        controller: 'HomeController'
      }).
      when('/login', {
        templateUrl: 'partials/login.html',
        controller: 'EmpleadoLogin'
      }).
      when('/Products', {
        templateUrl: 'partials/Products.html',
        controller: 'AllProducts'
      }).
      when('/ver/:id', {
        templateUrl: 'partials/ver.html',
        controller: 'EmpleadoVerCtrl'
      }).
      when('/ver/:codigo', {
        templateUrl: 'partials/ver.html',
        controller: 'EmpleadoVerCtrl'
      }).
      when('/listado', {
        templateUrl: 'partials/listado.html',
        controller: 'EmpleadoListadoCtrl'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);

