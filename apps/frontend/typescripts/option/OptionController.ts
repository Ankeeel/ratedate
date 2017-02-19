/// <reference path="./../../../../typings/tsd.d.ts" />

module backApp {
    interface IOptionController{
    }

    class OptionController implements IOptionController{


        constructor(private scope,private http, private window){
        }
    }

    var backApp = angular.module('backApp');
    backApp.controller('OptionController', ['$scope', '$http','$window', OptionController]);
}