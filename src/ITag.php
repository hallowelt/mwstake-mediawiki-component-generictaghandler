<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler;

use MediaWiki\MediaWikiServices;

interface ITag {

	/**
	 * @return array
	 */
	public function getTagNames(): array;

	/**
	 * @return bool
	 */
	public function hasContent(): bool;

	/**
	 * Key value pairs, where keys are parameter names and values are
	 * either instances of IProcessor or array of processor specs
	 *
	 * @return array|null
	 */
	public function getParamDefinition(): ?array;

	/**
	 * @return ClientTagSpecification|null
	 */
	public function getClientTagSpecification(): ClientTagSpecification|null;

	/**
	 * @return array|null
	 */
	public function getResourceLoaderModules(): ?array;

	/**
	 * @return array|null
	 */
	public function getResourceLoaderModuleStyles(): ?array;

	/**
	 * @return boolean
	 */
	public function shouldDisableParserCache(): bool;

	/**
	 * @return MarkerType
	 */
	public function getMarkerType(): MarkerType;

	/**
	 * @return string|null
	 */
	public function getContainerElementName(): ?string;

	/**
	 * @return bool
	 */
	public function shouldParseInput(): bool;

	/**
	 * @return bool
	 */
	public function shouldParseArguments(): bool;

	/**
	 * @param MediaWikiServices $services
	 * @return ITagHandler
	 */
	public function getHandler( MediaWikiServices $services ): ITagHandler;
}
