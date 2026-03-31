<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler;

use MediaWiki\Parser\Parser;
use MediaWiki\Parser\PPFrame;

class NullHandler implements ITagHandler {

	/**
	 * @inheritDoc
	 */
	public function getRenderedContent( string $input, array $params, Parser $parser, PPFrame $frame ): string {
		return '';
	}
}
