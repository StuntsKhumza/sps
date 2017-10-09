var apps = [
    'about-app',
    'contact-app',
    'home-app',
    'portfolio-app',
    'services-app',
]

angular.module('main-app', apps)

    .service('api', function ($http) {

        this.restendpoint = "php/service.php"; //api;

        this.doServiceCall = function (data) {

            return $http.post(this.restendpoint, data).

                then(function (res) {

                    return res.data;

                })


        }

    })