/// <reference path="../../../typings/tsd" />
module backApp {

    var backApp = angular.module('backApp', ["ngRoute", "LocalStorageModule", "smart-table", "ui.bootstrap", "uiSwitch", "angular-img-cropper", "pascalprecht.translate", "angular-loading-bar", "jkuri.datepicker", "angularModalService"]); //,"ngImgCrop"

    backApp.config(['cfpLoadingBarProvider', function (cfpLoadingBarProvider) {
        cfpLoadingBarProvider.includeSpinner = false;
    }]);
    backApp.config(['cfpLoadingBarProvider', function (cfpLoadingBarProvider) {
        cfpLoadingBarProvider.includeSpinner = false;
    }]);
    backApp.config(['$httpProvider', function ($httpProvider) {
        delete $httpProvider.defaults.headers.common['X-Requested-With'];
        $httpProvider.defaults.headers.post['Accept'] = 'application/json, text/javascript';
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/json; charset=utf-8';
        $httpProvider.defaults.headers.post['Access-Control-Max-Age'] = '1728000';
        $httpProvider.defaults.headers.common['Access-Control-Max-Age'] = '1728000';
        $httpProvider.defaults.headers.common['Accept'] = 'application/json, text/javascript';
        $httpProvider.defaults.headers.common['Content-Type'] = 'application/json; charset=utf-8';
        $httpProvider.defaults.useXDomain = true;

    }]);


    backApp.config(function ($routeProvider, $locationProvider, localStorageServiceProvider, $translateProvider, $httpProvider) {


        $translateProvider.useSanitizeValueStrategy('escapeParameters');

        $translateProvider.useStaticFilesLoader({
            prefix: '/modules/Admin/lang/',
            suffix: '.json'
        });

        // todo config itt kell beállítani a default nyelvet
        $translateProvider.preferredLanguage('hu');

        /**
         * locale storage beállítása
         */
        localStorageServiceProvider
            .setPrefix('backApp');

        /**
         * angularos # kikapcsolása urlből
         */
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        });

        /**
         * request headerben betesszük a locale storageban tárolt auth tokent
         */
        $httpProvider.interceptors.push(['localStorageService', function (localStorageService) {
            return {
                'request': function (config) {
                    config.headers = config.headers || {};
                    if (localStorageService.get('hash')) {
                        config.headers.XAuth = localStorageService.get('hash') ? localStorageService.get('hash') : 'not_auth';
                    }
                    return config;
                }
            }
        }]);

        /**
         * routing
         */
        $routeProvider.when("/admin", {
            templateUrl: '/modules/Admin/views/directives/routes/index/index.html'
        })
    });
}