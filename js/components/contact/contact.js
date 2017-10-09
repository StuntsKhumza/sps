angular.module('contact-app', [])
.directive('contact', function(){
    return {
        restrict: 'E',
        controllerAs: 'contactCtr',
        templateUrl: 'js/components/contact/contact.html',
        controller: function($scope){

        }
    }
})