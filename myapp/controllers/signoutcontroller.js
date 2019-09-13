app.controller('controllerSignout', function ($scope, $location) {
    if (!localStorage.getItem('userData')) {
        $location.path('/');
    }
    $scope.logout = function () {
        $location.path('/');
        localStorage.removeItem('userData');
    }
})