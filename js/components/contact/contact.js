angular.module('contact-app', [])
    .directive('contact', function () {
        return {
            restrict: 'E',
            controllerAs: 'contactCtr',
            templateUrl: 'js/components/contact/contact.html',
            controller: function ($scope, api) {

                this.data =
                    {
                        q: 'composeMemo', contact: {
                            name: '',
                            email: '',
                            subject: '',
                            message: ''
                        }
                    };

                this.sendMemo = function () {

                    api.doServiceCall(this.data)
                    .then(function (response) {
                        console.log(response.data)
                    })


                }



            }
        }
    })