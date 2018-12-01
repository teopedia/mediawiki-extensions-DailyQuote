<?php

class DailyQuote { 
    // Set tag name 
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
        $quote_file = dirname( __FILE__ ) . "/quotes/$wgLanguageCode.txt";
        $day = date("z");
        $quote_source = '';
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
                $output =  rtrim($line) ." (".  rtrim($quote_source) .")";
            }
        } else {
            echo "*** File $quote_file NOT found \n";
            $output = "File $quote_file NOT found";
        }
        return $output;
    }
}

