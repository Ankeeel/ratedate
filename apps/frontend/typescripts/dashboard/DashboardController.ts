/// <reference path="./../../../../typings/tsd.d.ts" />

module backApp {
    interface IDashboardController{
    }

    class DashboardController implements IDashboardController{
        public teszt : any = "string";
        public _formData : any = {};


        constructor(private scope,private http, private window){
        }

        public enter(){
            var self = this;
            var data = angular.toJson(this._formData);
            this.http.post('/dashboard/dashboard',data).then(function (response) {
                var id = angular.fromJson(response.data);
                self.window.open('/','_self');
            },function (response) {

            });
        }

    }

    var backApp = angular.module('backApp');
    backApp.controller('DashboardController', ['$scope', '$http','$window', DashboardController]);
}