var departmentsAddController = function($scope, $location, departmentsResource, departmentsTextDomain, departmentsFields, validate, sharedDocumentTitle ){

    sharedDocumentTitle.set( '<?php echo _s( 'Ajouter un rayon', 'nexopos_advanced' );?>' );
    $scope.textDomain       =   departmentsTextDomain;
    $scope.fields           =   departmentsFields;
    $scope.item             =   {};
    $scope.validate         =   new sharedValidate();

    /**
     *  Update Date
     *  @param object date
     *  @return void
    **/

    $scope.updateDate   =   function( date, key ){
        $scope.item[ key ]    =   date;
    }

    $scope.submit       =   function(){
        $scope.item.author          =   <?= User::id()?>;
        $scope.item.date_creation   =   tendoo.now();

        if( ! validate.run( $scope.fields, $scope.item ).isValid ) {
            return validate.blurAll( $scope.fields, $scope.item );
        }

        $scope.submitDisabled       =   true;

        departmentsResource.save(
            $scope.item,
            function(){
                $location.url( '/departments?notice=done' );
            },function( returned ){

                $scope.submitDisabled   =   false;

                if( returned.data.status === 'alreadyExists' ) {
                    sharedAlert.warning( '<?php echo _s( 'Le nom de ce rayon est déjà en cours d\'utilisation, veuillez choisir un autre nom.', 'nexopos_advanced' );?>' );
                }

                if( returned.data.status === 'forbidden' || returned.status == 500 ) {
                    sharedAlert.warning( '<?php echo _s( 'Une erreur s\'est produite durant l\'opération.', 'nexopos_advanced' );?>' );
                }
            }
        )
    }
}

departmentsAddController.$inject = ['$scope','$location', 'departmentsResource','departmentsTextDomain', 'departmentsFields', 'sharedValidate', 'sharedDocumentTitle' ];
tendooApp.controller('departmentsAdd',departmentsAddController);
