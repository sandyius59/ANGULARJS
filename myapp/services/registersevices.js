app.service("registerServices", function ($http, $location) {
    try {
        this.signup = function (data, $scope) {
            console.log(data);
            $http({
                method: 'POST',
                url: 'index.php/user/signup',
                data: data
            }).then(
                function successCallBack(response) {
                    console.log("register successfull", response);
                    $location.url('loginpage');
                },
                function errorCallBack(error) {
                    console.log("register failed", error);

                }
            )
            console.log('in service ', data);
        }
    } catch (e) {
        console.log(e);
    }
}) 