var empleadoControllers = angular.module('empleadoControllers', []);

empleadoControllers.controller('EmpleadoListadoCtrl', ['$scope','$http', function($scope,$http){
    empleados();
    
    function empleados(){
        $http.get('http://localhost:50/IHM_SITE/api/?a=listar').then(function(response){
            $scope.model = response.data;
        });
    }

    $scope.retirar = function(id){
        if(confirm('Esta seguro de realizar esta accion?')){

            $http.get('http://localhost:50/IHM_SITE/api/?a=eliminar&id='+ id).then(function(response){
                empleados();
            });
        }
    }
    $scope.registrar = function(){
        var model = {
            Nombre: $scope.Nombre,
            Apellido: $scope.Apellido,
            email: $scope.email,
            contra: $scope.contra,
            sexo: $scope.sexo,
            fnacimiento: $scope.fnacimiento
        };
        $http.post('http://localhost:50/IHM_SITE/api/?a=registrar',model).then(function(response){
            empleados();
            $scope.Nombre = null,
            $scope.Apellido = null,
            $scope.email = null,
            $scope.contra = null,
            $scope.sexo = null,
            $scope.fnacimiento = null

        });
    }
}]);

empleadoControllers.controller('EmpleadoVerCtrl', ['$scope', '$routeParams', '$http', function ($scope, $routeParams, $http) {   
        $http.get('http://localhost:50/IHM_SITE/api/?a=obtener&id=' + $routeParams.id).then(function(response){
            $scope.model = response.data;
        });  
}]);

empleadoControllers.controller('EmpleadoLogin', ['$scope', function ($scope) {
    
    $scope.url = "http://localhost:50/IHM_SITE/partials/login.html";
    console.log("test");

     
}]);

empleadoControllers.controller('AllProducts', ['$scope','$http','products', function($scope,$http,products) {
    //return $http.get('http://localhost:50/IHM_SITE/php/Products.php')

    return $http.get('https://s3.amazonaws.com/codecademy-content/courses/ltp4/photos-api/photos.json')
            .then(function(response) {
               $scope.products = response.data;
           });

           
  }]);
