<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler\MarkerType;

use MWStake\MediaWiki\Component\GenericTagHandler\MarkerType;

class NoWiki extends MarkerType {
	public function __toString() {
		return 'nowiki';
	}
}
