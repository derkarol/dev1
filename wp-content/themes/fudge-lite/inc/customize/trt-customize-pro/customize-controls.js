( function( api ) {

	// Extends our custom "fudge-lite-pro" section.
	api.sectionConstructor['fudge-lite-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
