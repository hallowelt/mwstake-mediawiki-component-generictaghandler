<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler\ParamDefinition;

use MWStake\MediaWiki\Component\GenericTagHandler\Validator\TitleValidator;

class TitleListParam extends \ParamProcessor\ParamDefinition {
	protected $delimiter = '|';
	protected $validator = null;

	protected function postConstruct() {
		$this->validator = new TitleValidator();
	}

	/**
	 * @return bool
	 */
	public function isList() : bool {
		return true;
	}
}
