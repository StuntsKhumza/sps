angular.module('services-app', [])
.directive('services', function(){
    return {
        restrict: 'E',
        controllerAs: 'servicesCtr',
        templateUrl: 'js/components/services/services.html',
        controller: function($scope){

        }
    }
})