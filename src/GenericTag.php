<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler;

use MWStake\MediaWiki\Component\FormEngine\FormLoaderSpecification;
use MWStake\MediaWiki\Component\FormEngine\IFormSpecification;

abstract class GenericTag implements ITag {

	/**
	 * @inheritDoc
	 */
	public function getFormSpecification(): IFormSpecification|FormLoaderSpecification|null {
		return null;
	}

	/**
	 * @inheritDoc
	 */
	public function getResourceLoaderModules(): ?array {
		return [];
	}

	/**
	 * @inheritDoc
	 */
	public function getMarkerType(): MarkerType {
		return new MarkerType\General();
	}

	/**
	 * @inheritDoc
	 */
	public function getContainerElementName(): ?string {
		return 'div';
	}

	/**
	 * @inheritDoc
	 */
	public function shouldParseInput(): bool {
		return false;
	}
}