# GenericTagHandler for MediaWiki

## Compatibility
- `3.0.x` -> MediaWiki 1.47
- \>= `1.0.x` -> MediaWiki 1.43

## Use in a MediaWiki extension

Require this component in the `composer.json` of your extension:

```json
{
	"require": {
		"mwstake/mediawiki-component-generictaghandler": "~3"
	}
}
```

## Register tags

## Tag definition

Implement an instance of `MWStake\MediaWiki\Component\GenericTagHandler\ITag` interface and register it:

```php

// By global
$GLOBALS['mwsgGenericTagRegistry'] = [
    'class' => 'MyClass',
    'services' => [ '...' ]
];

// By hook
$wgHooks['MWStakeGenericTagHandlerInitTags'][] = function ( &$tags ) {
    $tags[] = new MyTag(...);
};

// By registry
$registry = \MediaWiki\MediaWikiServices::getInstance()->getService( 'MWStake.GenericTagHandler.TagFactory' );
$registry->register( new MyTag( ... ) );
```

## Exclude tags

To disable tags for a setup without unloading their extension, configure the
following setting in `LocalSettings.php`:

```php
$mwsgGenericTagExcludeList = [
	'mytagname',
];
```

The default is an empty array, which keeps all registered tags enabled. Names are
matched case-insensitively against all names returned by `ITag::getTagNames()`.
Matching any name excludes the entire tag, including all its aliases. Unknown names have
no effect.

The filter applies to both registry and hook registrations. Excluded tags are not
registered with the parser or returned by the REST tag list. REST rendering returns
the existing `404` response for unknown tags. Existing wikitext is not modified;
excluded tags are treated as unregistered tags. Invalidate affected parser caches
after changing this setting.


## VisualEditor integration (over VisualEditorPlus)

You can return a `MWStake\MediaWiki\Component\GenericTagHandler\ClientTagSpecification` from your tag implementation
to automatically register a tag in VisualEditor.

### Without a custom form

Pass `null` to `$formSpecification` param to let the default form be used.

### With server-side-defined form

Pass a `MWStake\MediaWiki\Component\FormEngine\StandaloneFormSpecification` object to `$formSpecification`
param to use a custom form.

```php
$formSpec = new StandaloneFormSpecification();
		$formSpec->setItems( [
			[
				'type' => 'text',
				'name' => 'field',
				'label' => 'My field',
			],
			[
				'type' => 'checkbox',
				'name' => 'framed',
				'label' => 'Is framed'
			],
		] );

```

### With client-side defined form

You can implement an instance of `mw.ext.forms.standalone.Form` client-side and use it in the `ClientTagSpecification`

For that you would pass a `MWStake\MediaWiki\Component\FormEngine\FormLoaderSpecification` as `$formSpecification` param.

```php
$formSpec = new FormLoaderSpecification( 'my.form.class', [ 'modules.loading.the.form.class' ] );
```

### Register custom VisualEditor definition classes

In very specific cases you may want to override the default VisualEditor tag definition class

Load a JS file using `getResourceLoaderModules` method, that will override the tag class

```js
mw.hook( 'ext.visualEditorPlus.tags.getTagDefinition' ).add( ( definitionData, tagDefinition ) =>  {
	if ( definitionData.tagname !== 'myfancytag' ) {
		return;
    }

	// definition data contains the info from `ClientTagSpecification`

	tagDefinition = new my.class.inheriting.from.ext.visualEditorPlus.ui.tags.Definition( {
        ... data
    } );
};
```

In this case, you would likely pass `null` to `$formSpecification` param in the PHP class.