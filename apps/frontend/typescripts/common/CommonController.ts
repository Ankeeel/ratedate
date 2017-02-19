/// <reference path="./../../../../typings/tsd.d.ts" />

module backApp {
    interface ICommonController{
    }

    class CommonController implements ICommonController{
        public teszt : any = "string";
        public _formData : any = {};


        constructor(private scope,private http, private window){
        }

        public logout(){
            var self = this;
            this.http.get('/login/logout').then(function (response) {
                self.window.open('/','_self');
            },function (response) {

            });
        }

    }

    var backApp = angular.module('backApp');
    backApp.controller('CommonController', ['$scope', '$http','$window', CommonController]);
}