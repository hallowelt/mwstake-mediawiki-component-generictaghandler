<?php

use MediaWiki\MediaWikiServices;
use MWStake\MediaWiki\Component\GenericTagHandler\TagFactory;

return [

	/**
	 * @param MediaWikiServices $services
	 */
	'MWStakeTagFactory' => static function ( $services ) {
		return new TagFactory( $services );
	}
];
