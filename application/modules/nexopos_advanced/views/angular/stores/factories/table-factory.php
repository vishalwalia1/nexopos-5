tendooApp.factory( 'storeTable', [ 'sharedOptions', function( sharedOptions ){
    return {
        columns     :   [
            {
                text    :   '<?php echo _s( 'Nom', 'nexopos_advanced' );?>',
                namespace   :   'name'
            },{
                text    :   '<?php echo _s( 'Statut', 'nexopos_advanced' );?>',
                namespace   :   'status',
                is          :   'object',
                object      :   sharedOptions.status
            },{
                text    :   '<?php echo _s( 'Image', 'nexopos_advanced' );?>',
                namespace   :   'image'
            },{
                text    :   '<?php echo _s( 'Utilisateurs authorisés', 'nexopos_advanced' );?>',
                namespace   :   'authorized_users',
                is          :   'array_of_object'
            },{
                text    :   '<?php echo _s( 'Par', 'nexopos_advanced' );?>',
                namespace   :   'author_name'
            },{
                text    :   '<?php echo _s( 'Crée le', 'nexopos_advanced' );?>',
                namespace   :   'date_creation',
                is          :   'date_span'
            },{
                text    :   '<?php echo _s( 'Modifié le', 'nexopos_advanced' );?>',
                namespace   :   'date_modification',
                is          :   'date_span'
            }
        ]
    }
}]);
