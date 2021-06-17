<?php

namespace MWStake\MediaWiki\Component\GenericTagHandler;

class ParamType {
	/* ParamProcessor library */
	const BOOLEAN = 'boolean';
	const FLOAT = 'float';
	const INTEGER = 'integer';
	const STRING = 'string';
	const COORDINATE = 'coordinate';
	const DIMENSION = 'dimension';

	/* MWStake Component */
	const TITLE_LIST = 'titlelist';
	const NAMESPACE_LIST = 'namespacelist';
	const CATEGORY_LIST = 'categorylist';
}
