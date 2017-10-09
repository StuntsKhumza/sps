angular.module('portfolio-app', [])
.directive('portfolio', function(){
    return {
        restrict: 'E',
        controllerAs: 'portfolioCtr',
        templateUrl: 'js/components/portfolio/portfolio.html',
        controller: function($scope){

        }
    }
})