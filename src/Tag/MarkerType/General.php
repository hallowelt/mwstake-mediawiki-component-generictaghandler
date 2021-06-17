<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler\MarkerType;

use MWStake\MediaWiki\Component\GenericTagHandler\MarkerType;

class General extends MarkerType {
	public function __toString() {
		return 'general';
	}
}
