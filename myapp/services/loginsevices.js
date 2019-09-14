app.service("loginService", function ($http, $location) {
    try {
        this.login = function (data, $scope) {
            console.log(data);

            email = data['email'];
            firstname = data['password'];
            $http({
                method: 'POST',
                url: 'index.php/user/login',
                data: data
            }).then(
                function successCallBack(response) {
                    console.log("Login successfull", response.data);
                    localStorage.setItem('email', email);
                    localStorage.setItem('userData', response);
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