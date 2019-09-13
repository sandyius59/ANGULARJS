app.controller('controllerRegister', function ($scope, registerServices) {
    try {
        $scope.saveContact = () => {
            var data = {
                "firstname": $scope.newcontact.first,
                "lastname": $scope.newcontact.last,
                "email": $scope.newcontact.email,
                "password": $scope.newcontact.password
            }
            registerServices.signup(data, $scope);
        }
    } catch (e) {
        console.log(e);
    }
});