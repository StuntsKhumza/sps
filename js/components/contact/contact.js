angular.module('contact-app', [])
    .directive('contact', function () {
        return {
            restrict: 'E',
            controllerAs: 'contactCtr',
            templateUrl: 'js/components/contact/contact.html',
            controller: function ($scope, api) {

                var self = this;

                self.spinner = false;
                self.message = "Your message has been sent. Thank you!";
                self.showMessage = false;
                self.showMessage1 = false;

                self.data =
                    {
                        q: 'composeMemo', contact: {
                            name: 'nathi',
                            email: 'nathi4sure@gmail.com',
                            subject: 'test',
                            message: 'message'
                        }
                    };

                self.sendMemo = function () {

                    self.spinner = true;
                    self.showMessage = false;
                    self.showMessage1 = false;

                    api.doServiceCall(this.data)

                        .then(function (response) {

                            self.spinner = false;

                            

                            if (response.status == 200){
                                self.showMessage = true;
                                self.message = "Your message has been sent. Thank you!";

                            } else {
                                self.showMessage1 = true;
                                self.message = "An error occured while trying to send your message.";

                            }


                        })


                }



            }
        }
    })