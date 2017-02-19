/// <reference path="./../../../../typings/tsd.d.ts" />
module backApp {

    class OptionService{

        public options;

        constructor(scope, http, localStorageService){

        }
    }

    var backApp = angular.module('backApp');

    backApp.service('OptionService', ['$rootScope','$http','localStorageService', function(rootScope,http,localStorageService){
        return new OptionService(rootScope,http,localStorageService);
    }]);
}