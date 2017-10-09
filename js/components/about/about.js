angular.module('about-app', [])
.directive('about', function(){
    return {
        restrict: 'E',
        controllerAs: 'aboutCtr',
        templateUrl: 'js/components/about/about.html',
        controller: function($scope){

        }
    }
})