var empleadoControllers = angular.module('empleadoControllers', []);

empleadoControllers.controller('EmpleadoListadoCtrl', ['$scope','$http', function($scope,$http){
    empleados();
    profesiones();
    function empleados(){
        $http.get('http://localhost:50/IHM_SITE/api/?a=listar').then(function(r){
            $scope.model = r.data;
        });
    }
    function profesiones(){
        $http.get('http://localhost:50/IHM_SITE/api/?a=profesiones').then(function(r){
            $scope.profesiones = r.data;
        });
    }

    $scope.retirar = function(id){
        if(confirm('Esta seguro de realizar esta accion?')){

            $http.get('http://localhost:50/IHM_SITE/api/?a=eliminar&id='+ id).then(function(r){
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
        $http.post('http://localhost:50/IHM_SITE/api/?a=registrar',model).then(function(r){
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
    
        $http.get('http://localhost:50/IHM_SITE/api/?a=obtener&id=' + $routeParams.id).then(function(r){
            $scope.model = r.data;
        });  
}]);

empleadoControllers.controller('EmpleadoLogin', ['$scope', '$http', function ($scope, $http) {
    /*
    $http.get('http://localhost:50/IHM_SITE/api/?a=obtener&id=').then(function(r){
        $scope.model = r.data;
    }); 
    */ 
}]);