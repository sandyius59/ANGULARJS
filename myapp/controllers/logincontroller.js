app.controller('controllerLogin', function ($scope, loginService) {
    try {
        $scope.saveContact = () => {
            var data = {
                "email": $scope.newcontact.email,
                "password": $scope.newcontact.password
            }
            loginService.login(data, $scope);
        }
    } catch (e) {
        console.log(e);
    }
});
