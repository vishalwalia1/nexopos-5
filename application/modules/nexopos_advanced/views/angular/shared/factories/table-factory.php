tendooApp.factory( 'table', [ 'sharedAlert', '$location', function( sharedAlert, $location ){
    return new function(){
        this.columns            =   [];
        this.disabledFeatures   =   [];

        /**
         *  disable feature
         *  @param string feature to disable
         *  @return void
        **/

        this.disable            =   function( feature ) {
            this.disabledFeatures.push( feature );
        }

        /**
         *  Is Disable. checks whether an feature is enabeld or not
         *  @param string feature
         *  @return boolean
        **/

        this.isDisabled         =   function( feature ) {
            return _.indexOf( this.disabledFeatures, feature ) > -1 ? true : false;
        }

        // For select action for bulk operation
        this.selectedAction     =   void(0);

        /**
         *  Order Columns
         *  @param object column
         *  @return void
        **/

        this.order      =   function( column ) {

            // Set table order
            if( angular.isUndefined( this.order_type ) ) {
                this.order_type   =   'desc';
            } else if( this.order_type == 'desc' ) {
                this.order_type   =   'asc';
            } else  if( this.order_type == 'asc' ) {
                this.order_type   =   'desc';
            }

            if( angular.isDefined( column ) ) {
                this.order_by           =   column;
            }

            if( typeof this.get == 'function' ) {
                // Trigger callback
                this.get({
                    order_type      :   this.order_type,
                    order_by        :   this.order_by,
                    limit           :   this.limit,
                    current_page    :   this.currentPage
                });
            }
        }

        /**
         *  Get Page
         *  @param int page id
         *  @return void
        **/

        this.getPage                =   function( id ) {
            this.currentPage        =   id;
            $this                   =   this;
            this.order(void(0),function( data ) {
                $this.entries       =   data.entries;
                $this.pages         =   Math.ceil( data.num_rows / $scope.table.limit );
            });
        }

        /**
         *  Get Number
         *  @param int
         *  @return array
        **/

        this.__getNumber        =   function( number ) {
            if( angular.isDefined( number ) ) {
                return new Array( number );
            }
        }

        /**
         *  Toggle All Entry.
         *  @param object entries
         *  @return void
        **/

        this.toggleAllEntries         =   function( entries, headCheckbox ) {
            _.each( entries, function( entry ) {
                entry.checked  =   headCheckbox;
            });
        }

        /**
         *  Submit bulk Actions
         *  @param void
         *  @return void
        **/

        this.submitBulkActions          =   function() {

            if( this.selectedAction != false ) {

                var selectedEntries     =   [];

                _.each( this.entries, function( entry ) {
                    if( entry.checked == true ) {
                        selectedEntries.push( entry.id );
                    }
                })

                if( selectedEntries.length == 0 ) {
                    sharedAlert.warning( '<?php echo _s( 'Vous devez au moins sélectionner un élément', 'nexopos_advanced' );?>' );
                }

                if( this.selectedAction.namespace == 'delete' ) {
                    // Here perform actions
                    if( angular.isUndefined( this.delete ) ) {
                        console.log( '"delete" method is not defined' );
                        return;
                    }

                    this.delete({
                        'ids[]'  :   selectedEntries
                    });
                }
            }
        }

        /**
         *  Submit Single Action
         *  @param object entry
         *  @param object action
         *  @return void
        **/

        this.submitSingleAction          =   function( entry, action ) {
            if( action.namespace == 'delete' ) {
                // Here perform actions
                if( angular.isUndefined( this.delete ) ) {
                    console.log( '"delete" method is not defined' );
                    return;
                }

                this.delete({
                    'ids[]'  :   [ entry.id ]
                });
            } else if( action.namespace == 'edit' ) {
                $location.url( action.path + entry.id );
            }
        }
    }
}])
