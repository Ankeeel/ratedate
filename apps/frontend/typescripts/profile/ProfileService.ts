/// <reference path="./../../../../typings/tsd.d.ts" />
module backApp {

    class ProfileService{

        public profiles;

        constructor(scope, http, localStorageService){

        }
    }

    var backApp = angular.module('backApp');

    backApp.service('ProfileService', ['$rootScope','$http','localStorageService', function(rootScope,http,localStorageService){
        return new ProfileService(rootScope,http,localStorageService);
    }]);
}