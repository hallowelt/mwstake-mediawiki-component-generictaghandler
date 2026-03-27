<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler;

use MediaWiki\MediaWikiServices;

/**
 * These tags do not render anything themselves,
 * they just wrap existing content in order to mark it for further processing
 */
abstract class WrapperTag extends GenericTag {

	/**
	 * @param MediaWikiServices $services
	 * @return ITagHandler
	 */
	public function getHandler( MediaWikiServices $services ): ITagHandler {
		return new NullHandler();
	}

	/**
	 * @return bool
	 */
	public function hasContent(): bool {
		return true;
	}
}
