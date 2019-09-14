app.controller('controllerSignout', function ($scope, $location) {
    if (!localStorage.getItem('userData')) {
        $location.path('/');
    }
    if (!localStorage.getItem('email')) {
        $location.path('/');
    }
    $scope.logout = function () {
        $location.path('/');
        localStorage.removeItem('userData');
        localStorage.removeItem('email');
    }
})