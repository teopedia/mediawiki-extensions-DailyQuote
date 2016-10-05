<?php

class DailyQuote { 
	const NAME = 'dailyquote';

	// The entry point. Associates the tag with a function.
	static function setup() { 
	  global $wgParser;
	  $wgParser->setHook(self::NAME, array('DailyQuote', 'render'));
	  return true;
	} 

	//This function reads from file a line = day of the year
	static function render($input, $argv, $parser) {
		global $wgLanguageCode;
		$quote_file = dirname( __FILE__ ) . "/gems/$wgLanguageCode.txt";
 		//date_default_timezone_set("Europe/Moscow");
		//$date = date("Y.m.d");
		//$zone = date("e");
		$day = date("z");
		$output = '';
		if (file_exists($quote_file)) {
		    $handle = @fopen($quote_file, "r");
		    if ($handle) {
				$ln = 0;
		        $quote_source = fgets($handle); //first line holds source of quotes
		        while ( ($line = fgets($handle)) and ($ln != $day) ) {
		    		++$ln;
			    }
			    fclose($handle);
				$output = $line;
			}
		} 
		else {
			echo "*** File $quote_file NOT found \n";
		}
		//echo "date = $date, day = $day, zone = $zone \n";
		//echo "Qoute : $quote_text";
		//echo "Source: $quote_source";

		return $output;
	}

}

