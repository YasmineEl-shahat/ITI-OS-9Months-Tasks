( function( api ) {

	// Extends our custom "superb-ecommerce" section.
	api.sectionConstructor['superb-ecommerce'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
