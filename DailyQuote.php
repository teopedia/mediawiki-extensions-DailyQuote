<?php
if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'DailyQuote' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['DailyQuote'] = __DIR__ . '/i18n';
	wfWarn(
		'Deprecated PHP entry point used for the DailyQuote extension. ' .
		'Please use wfLoadExtension() instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the DailyQuote extension requires MediaWiki 1.26+' );
}

/* -pm- OLD VERSION
# Set up the hook, using different logic depending on the version of MediaWiki 

if (defined('MW_SUPPORTS_PARSERFIRSTCALLINIT')) {
	$wgHooks['ParserFirstCallInit'][] = 'DailyQuote::setup';
} else { 
	$wgExtensionFunctions[] = 'DailyQuote::setup';
}

# Autoload the implementation class
$wgAutoloadClasses['DailyQuote'] = dirname( __FILE__ ) . "/DailyQuote_body.php";
 
*/