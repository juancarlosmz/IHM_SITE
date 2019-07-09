var app = angular.module('appDemo', [
  'ngRoute',
  'empleadoControllers'
]);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'partials/listado.html',
        controller: 'EmpleadoListadoCtrl'
      }).
      when('/ver/:id', {
        templateUrl: 'partials/ver.html',
        controller: 'EmpleadoVerCtrl'
      }).
      when('/login', {
        templateUrl: 'partials/login.html',
        controller: 'EmpleadoLogin'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);