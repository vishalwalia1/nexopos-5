.when('/setup/welcome', {
    templateUrl: 'templates/setup/welcome',
    controller: 'setupWelcome',
    resolve: {
        lazy: ['$ocLazyLoad', function($ocLazyLoad) {
            return $ocLazyLoad.load({
                files: [
                    'controllers/setup/welcome.js',
                    'shared_factories/options.js',
                    'shared_factories/raw-to-options.js',
                    'shared_factories/validate.js',
                    'shared_factories/alert.js',
                    'shared_factories/document-title.js',
                    'shared_factories/storage-resource.js'
                ]
            });
        }]
    }
})