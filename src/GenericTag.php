<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler;

abstract class GenericTag implements ITag {

	/**
	 * @inheritDoc
	 */
	public function getClientTagSpecification(): ClientTagSpecification|null {
		return null;
	}

	/**
	 * @inheritDoc
	 */
	public function getResourceLoaderModules(): ?array {
		return [];
	}

	/**
	 * @return array|null
	 */
	public function getResourceLoaderModuleStyles(): ?array {
		return [];
	}

	/**
	 * Usually tags want to show dynamic content
	 * @return boolean
	 */
	public function shouldDisableParserCache(): bool {
		return true;
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
		return true;
	}

	/**
	 * @inheritDoc
	 */
	public function shouldParseArguments(): bool {
		return true;
	}
}
