app.service("loginService", function ($http, $location) {
    try {
        this.login = function (data, $scope) {
            console.log(data);
            $http({
                method: 'POST',
                url: 'index.php/user/login',
                data: data
            }).then(
                function successCallBack(response) {
                    console.log("Login successfull", response);
                    localStorage.setItem('userData', response.data);

                    $location.url('page');

                },
                function errorCallBack(error) {
                    console.log("Login failed", error);
                }
            )
            console.log('in service ', data);
        }
    } catch (e) {
        console.log(e);
    }
}) 