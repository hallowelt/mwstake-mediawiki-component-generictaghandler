<?php

use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\GenericTagHandler\TagFactory;

return [

	/**
	 * @param MediaWikiServices $services
	 */
	'MWStakeTagFactory' => function ( $services ) {
		return new TagFactory( $services );
	}
];
