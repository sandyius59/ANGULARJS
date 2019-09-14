/**********************************************************************************
 * @Execution : default node : cmd> app.js
 *
 *
 * @Purpose : to create loging and registration form
 *
 * @description : to create rest api using angular js
 *
 * @overview : fundoo application
 * @author : sandeep kumar maurya <sandeepkumaraj58@gmail.com>
 * @version : 1.0
 * @since : 13-sat-2019
 *
 **************************************************************************************/
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