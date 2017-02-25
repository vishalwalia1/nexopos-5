.when('/items/:slug?/:types?', {
    templateUrl: function( urlattr ) {
        console.log( urlattr );
        if( typeof urlattr.slug != 'undefined' ) {
            return 'templates/items/' + urlattr.slug;
        }
        return 'templates/items/';
    },
    controller: 'items',
    resolve: {
        lazy: ['$ocLazyLoad', function($ocLazyLoad) {
            return $ocLazyLoad.load({
                name: 'Items',
                files: [
                    'controllers/items/add.js',
                    'factories/items/types.js',
                    'factories/items/barcode-options.js',
                    'factories/items/fields.js',
                    'factories/items/options.js',
                    'factories/items/providers.js',
                    'factories/items/raw-to-options.js',
                    'factories/items/tabs.js',
                    'directives/items/variations.js',
                    'shared_factories/document-title.js'
                ]
            });
        }]
    }
})
