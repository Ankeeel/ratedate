/// <reference path="./../../../../typings/tsd.d.ts" />
module backApp {

    class LoginService{

        public logins;

        constructor(scope, http, localStorageService){

        }
    }

    var backApp = angular.module('backApp');

    backApp.service('LoginService', ['$rootScope','$http','localStorageService', function(rootScope,http,localStorageService){
        return new LoginService(rootScope,http,localStorageService);
    }]);
}