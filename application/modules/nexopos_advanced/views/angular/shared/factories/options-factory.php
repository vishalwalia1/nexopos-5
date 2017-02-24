tendooApp.factory( 'options', function(){
    return {
        yesOrNo         :   [
            {
                value       :   'yes',
                label       :   '<?php echo _s( 'Oui', 'nexo' );?>'
            },{
                value       :   'no',
                label       :   '<?php echo _s( 'Non', 'nexo' );?>'
            }
        ],
        percentOrFlat       :   [
            {
                value       :   'percent',
                label       :   '<?php echo _s( 'Pourcentage', 'nexo' );?>'
            },{
                value       :   'flat',
                label       :   '<?php echo _s( 'Fixe', 'nexo' );?>'
            }
        ],
        maleOrFemale       :   [
            {
                value       :   'male',
                label       :   '<?php echo _s( 'Masculin', 'nexo' );?>'
            },{
                value       :   'female',
                label       :   '<?php echo _s( 'Féminin', 'nexo' );?>'
            }
        ]
    }
});
