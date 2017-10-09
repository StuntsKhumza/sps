angular.module('home-app', [])
.directive('home', function(){
    return {
        restrict: 'E',
        controllerAs: 'homeCtr',
        templateUrl: 'js/components/home/home.html',
        controller: function($scope){

        }
    }
})