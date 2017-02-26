/// <reference path="./../../../../typings/tsd.d.ts" />

module backApp {
    interface IDashboardController{
    }

    class DashboardController implements IDashboardController{
        public _formData : any = {};
        public users : any = [];


        constructor(private scope,private http, private window){
           this.init();
        }

        private init(){
            var self = this;
            var data = angular.toJson(this._formData);
            this.http.post('/dashboard/search',data).then(function (response) {
                 self.users = angular.fromJson(response.data);
            },function (response) {
            });
        }

        public search(){
            this.init();
        }

    }

    var backApp = angular.module('backApp');
    backApp.controller('DashboardController', ['$scope', '$http','$window', DashboardController]);
}