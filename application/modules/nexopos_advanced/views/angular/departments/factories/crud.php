tendooApp.factory( 'crud', function(){
    return  {
        title   :   '<?php echo __( 'Créer une nouveau rayon', 'nexopos_advanced' );?>',
        return  :   '<?php echo __( 'Revenir vers la liste', 'nexopos_advanced' );?>',
        returnLink  :   '<?php echo site_url([ 'dashboard', 'nexopos', 'departments' ] );?>',
        itemTitle  :   '<?php echo __( 'nouveau rayon', 'nexopos_advanced' );?>',
        saveBtnText :   '<?php echo __( 'Sauvegarder', 'nexopos_advanced' );?>',
        fieldsTitle :   '<?php echo __( 'Options', 'nexopos_advanced' );?>',
        addNewLink  :   '<?php echo site_url( [ 'dashboard', 'nexopos', 'departments', 'add' ] );?>',
        listTitle   :   '<?php echo __( 'Liste des rayons', 'nexopos_advanced' );?>',
        addNew  :   '<?php echo __( 'Nouveau Rayons', 'nexopos_advanced' );?>'
    }
});
