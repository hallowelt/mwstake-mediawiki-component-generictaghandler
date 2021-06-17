<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler;

use MWStake\MediaWiki\Component\GenericTagHandler\MarkerType\General;

abstract class Tag implements ITag {

	/**
	 *
	 * @return bool
	 */
	public function needsDisabledParserCache() {
		return false;
	}

	/**
	 *
	 * @return string
	 */
	public function getContainerElementName() {
		return 'div';
	}

	/**
	 *
	 * @return array
	 */
	public function getResourceLoaderModuleStyles() {
		return [];
	}

	/**
	 *
	 * @return array
	 */
	public function getResourceLoaderModules() {
		return [];
	}

	/**
	 *
	 * @return bool
	 */
	public function needsParsedInput() {
		return true;
	}

	/**
	 *
	 * @return bool
	 */
	public function needsParseArgs() {
		return true;
	}

	/**
	 *
	 * @return MarkerType
	 */
	public function getMarkerType() {
		return new General();
	}

	/**
	 * @return \BlueSpice\ParamProcessor\IParamDefinition
	 */
	public function getInputDefinition() {
		return null;
	}

	/**
	 * @return \BlueSpice\ParamProcessor\IParamDefinition[]
	 */
	public function getArgsDefinitions() {
		return [];
	}
}