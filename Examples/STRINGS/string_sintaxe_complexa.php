<?php 
class beers {
    const softdrink = 'rootbeer';
    public static $ale = 'ipa';
}
$rootbeer = 'A & W';
$ipa = 'Alexander Keith\'s';
echo "I'd like an " . beers::softdrink . " \n";
echo "I'd like an {${beers::softdrink}} \n";
echo "I'd like an " . beers::$ale . " \n";
echo "I'd like an {${beers::$ale}} \n";
