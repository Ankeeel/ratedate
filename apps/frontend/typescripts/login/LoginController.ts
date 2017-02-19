/// <reference path="./../../../../typings/tsd.d.ts" />

module backApp {
    interface ILoginController{
    }

    class LoginController implements ILoginController{
        public _formData : any = {};


        constructor(private scope,private http, private window,private loginService){
        }

        public enter(){
            var self = this;
            var data = angular.toJson(this._formData);
            this.http.post('/login/login',data).then(function (response) {
                var id = angular.fromJson(response.data);
                self.window.open('/','_self');
            },function (response) {

            });
        }

    }

    var backApp = angular.module('backApp');
    backApp.controller('LoginController', ['$scope', '$http','$window','LoginService', LoginController]);
}