<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler\ParamDefinition;

use MWStake\MediaWiki\Component\GenericTagHandler\Validator\TitleValidator;

class CategoryListParam extends \ParamProcessor\ParamDefinition {

	/** @var string */
	protected $delimiter = '|';
	/** @var TitleValidator */
	protected $validator = null;

	protected function postConstruct() {
		$this->validator = new TitleValidator();
	}

	/**
	 * @return bool
	 */
	public function isList(): bool {
		return true;
	}
}
