<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler\Validator;

use MediaWiki\MediaWikiServices;
use ValueValidators\ValueValidatorObject;

class NamespaceValidator extends ValueValidatorObject {

	/**
	 *
	 * @var bool
	 */
	protected $hasToExist = false;

	/**
	 *
	 * @var array
	 */
	protected $aBlacklist = [];

	/**
	 *
	 * @param bool $hasToExist
	 */
	public function setHasToExist( $hasToExist ) {
		$this->hasToExist = $hasToExist;
	}

	/**
	 *
	 * @param array $aBlacklist
	 */
	public function setBlacklist( $aBlacklist ) {
		$this->aBlacklist = $aBlacklist;
	}

	/**
	 *
	 * @param mixed $value
	 */
	public function doValidation( $value ) {
		$namespaceInfo = MediaWikiServices::getInstance()->getNamespaceInfo();
		// TODO: finalize implementation
		if ( $this->hasToExist && !$namespaceInfo->exists( $value ) ) {
			$this->addErrorMessage(
				wfMessage(
					'mwstake-components-generictaghandler-validator-error-namespace-does-not-exist',
					$value
				)->plain()
			);
		}

		if ( in_array( $value, $this->aBlacklist ) ) {
			$this->addErrorMessage(
				wfMessage(
					'mwstake-components-generictaghandler-validator-error-namespace-on-blacklist',
					$value
				)->plain()
			);
		}
	}

	/**
	 *
	 * @param array $options
	 */
	public function setOptions( array $options ) {
		parent::setOptions( $options );

		if ( isset( $options['hastoexist'] ) ) {
			$this->setHasToExist( $options['hastoexist'] );
		}

		if ( isset( $options['blacklist'] ) ) {
			$this->setBlacklist( $options['blacklist'] );
		}
	}
}
