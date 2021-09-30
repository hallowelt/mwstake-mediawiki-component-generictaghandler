<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler;

use Exception;
use MWStake\MediaWiki\Component\GenericTagHandler\ITag;

class TagFactory {

	/**
	 *
	 * @return ITag[]
	 */
	public function getAll() {
		throw new Exception( 'Not implemented' );
	}
}