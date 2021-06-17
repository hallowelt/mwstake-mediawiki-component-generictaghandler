<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler\MarkerType;

use MWStake\MediaWiki\Component\GenericTagHandler\MarkerType;

class None extends MarkerType {
	public function __toString() {
		return 'none';
	}
}
