/// <reference path="./../../../../typings/tsd.d.ts" />

module backApp {
    interface IRegisterController {
    }

    class RegisterController implements IRegisterController {

        public _formData: any = {};

        constructor(private scope, private http, private window) {
        }
        public toLogin(){
            this.window.open('/','_self');
        }

        public register(){
            var self = this;
            var data = angular.toJson(this._formData);
            this.http.post('/register/send',data).then(function (response) {
                self.window.open('/','_self');
            },function (response) {

            });
        }
    }

    var backApp = angular.module('backApp');
    backApp.controller('RegisterController', ['$scope', '$http', '$window', RegisterController]);
}