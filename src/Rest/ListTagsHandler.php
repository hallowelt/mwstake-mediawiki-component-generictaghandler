<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler\Rest;

use MediaWiki\Rest\SimpleHandler;
use MWStake\MediaWiki\Component\GenericTagHandler\TagFactory;
use MWStake\MediaWiki\Component\InputProcessor\IProcessor as ParamValidator;

class ListTagsHandler extends SimpleHandler {
	public function __construct(
		private readonly TagFactory $tagFactory
	) {
	}

	public function execute() {
		$tags = $this->tagFactory->getAll();

		$result = [];
		foreach ( $tags as $tag ) {
			$result[] = [
				'tags' => $tag->getTagNames(),
				'hasContent' => $tag->hasContent(),
				'paramDefinition' => $tag->getParamDefinition(),
				'clientSpecification' => $tag->getClientTagSpecification(),
			];
		}

		return $this->getResponseFactory()->createJson( $result );
	}
}