/// <reference path="./../../../../typings/tsd.d.ts" />

module backApp {
    interface IProfileController {
    }

    class ProfileController implements IProfileController {

        constructor(private scope, private http, private window, public profile) {
        }
    }

    var backApp = angular.module('backApp');
    backApp.controller('ProfileController', ['$scope', '$http', '$window','profile', ProfileController]);
}