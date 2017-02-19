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

        /*$translateProvider.useStaticFilesLoader({
            prefix: '/modules/Admin/lang/',
            suffix: '.json'
        });*/

        // todo config itt kell beállítani a default nyelvet
        //$translateProvider.preferredLanguage('hu');

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
        $routeProvider.when("/", {
            templateUrl: '/apps/frontend/views/directives/routes/dashboard/index.html',
            controller : 'DashboardController',
            ControllerAs: 'ctrl',
        })

        .when("/dashboard/index", {
                templateUrl: '/apps/frontend/views/directives/routes/dashboard/index.html',
                controller : 'DashboardController',
                ControllerAs: 'ctrl',

            })

        .when("/profile/index", {
            templateUrl: '/apps/frontend/views/directives/routes/profile/index.html',
            controller : 'ProfileController as ctrl',
            //ControllerAs: 'ctrl',
            resolve: {
                profile: ['$route', "$http", function (route, http){
                    return http.get('/profile/get').then(function(response){
                        return angular.fromJson(response.data);
                    });
                }]
            }
        })

            .when("/option/index", {
                templateUrl: '/apps/frontend/views/directives/routes/option/index.html',
                controller : 'OptionController',
                ControllerAs: 'ctrl',
                resolve: {
                    option: ['$route', "$http", function (route, http){
                        return http.get('/option/get').then(function(response){
                            return angular.fromJson(response.data);
                        });
                    }]
                }
            })

    });
}