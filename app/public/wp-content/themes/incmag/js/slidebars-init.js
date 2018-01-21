
// Init
		var $j = jQuery.noConflict();
		var controller = new slidebars();
		controller.init();
		
// Toggle main menu
		$j( '.menu-toggle' ).on( 'click', function ( event ) {
			event.preventDefault();
			event.stopPropagation();
			controller.toggle( 'slide-navigation' );
		} );
		
// Close any
		$j( document ).on( 'click', '.js-close-any', function ( event ) {
			if ( controller.getActiveSlidebar() ) {
				event.preventDefault();
				event.stopPropagation();
				controller.close();
			}
		} );
// Add close class to canvas container when Slidebar is opened
		$j( controller.events ).on( 'opening', function ( event ) {
			$j( '[canvas]' ).addClass( 'js-close-any' );
		} );

		// Add close class to canvas container when Slidebar is opened
		$j( controller.events ).on( 'closing', function ( event ) {
			$j( '[canvas]' ).removeClass( 'js-close-any' );
		} );	