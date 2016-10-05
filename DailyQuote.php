<?php
$wgExtensionCredits ['other'] [] = array (		
	'name' => 'DailyQuote',
	'author' => 'Pavel Malakhov',
	'url' => 'http://theosophy.wiki',
	'version' => '1.0',
	'description' => 'Quote of the day. Inserts with tag <dailyquote></dailyquote>');

# Set up the hook, using different logic depending on the version of MediaWiki 
if (defined('MW_SUPPORTS_PARSERFIRSTCALLINIT')) {
	$wgHooks['ParserFirstCallInit'][] = 'DailyQuote::setup';
} else { 
	$wgExtensionFunctions[] = 'DailyQuote::setup';
}

# Autoload the implementation class
$wgAutoloadClasses['DailyQuote'] = dirname( __FILE__ ) . "/DailyQuote_body.php";
 
