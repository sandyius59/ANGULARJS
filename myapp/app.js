var app = angular.module("myApp", ["ngRoute"]);
app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "myapp/views/loginpage.html",
            controller: "controllerLogin"

        })
        .when('/register', {
            templateUrl: "myapp/views/Registerpage.html",
            controller: "controllerRegister"
        })
        .when('/page', {
            templateUrl: "myapp/views/page.html",
            controller: "controllerSignout"
        })
        .when('/loginpage', {
            templateUrl: "myapp/views/loginpage.html",
            controller: "controllerLogin"
        })

    // .when('/resetPassword', {
    //     templateUrl: "templates/resetPassword.html",
    //     controller: "controllerReset"
    // })

    // .otherwise({
    //     redirectTo: "/"
    // })

});