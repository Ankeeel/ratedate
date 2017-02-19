/// <reference path="./../../../../typings/tsd.d.ts" />

module backApp {
    interface IOptionController{
    }

    class OptionController implements IOptionController{
        public _formData : any = {};

        constructor(public scope,private http, private window,public option){
            this._formData = option;
        }
    }

    var backApp = angular.module('backApp');
    backApp.controller('OptionController', ['$scope', '$http','$window','option', OptionController]);
}