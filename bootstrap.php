<?php

if ( defined( 'MWSTAKE_MEDIAWIKI_COMPONENT_GENERICTAGHANDLER_VERSION' ) ) {
	return;
}

define( 'MWSTAKE_MEDIAWIKI_COMPONENT_GENERICTAGHANDLER_VERSION', '1.0.0' );

MWStake\MediaWiki\ComponentLoader\Bootstrapper::getInstance()
->register( 'generictaghandler', function () {
	$GLOBALS['wgHooks']['ParserFirstCallInit'][] = function ( \Parser $parser ) {
		$factory = $this->getServices()->getService( 'MWStakeTagFactory' );
			$tags = $factory->getAll();
			foreach ( $tags as $tag ) {
				$genericHandler = new MWStake\MediaWiki\Component\GenericTagHandler\GenericHandler( $tag );
				$tagNames = $tag->getTagNames();
				foreach ( $tagNames as $tagName ) {
					$this->parser->setHook( $tagName, [ $genericHandler, 'handle' ] );
				}
			}

			return true;
	};
} );
