<?php
$what = "Harlem";
echo "1- Just Do The $what Shake.".PHP_EOL;
echo "2- Just Do The $whatis Shake.".PHP_EOL;
echo "3- Just Do The ${what} Shake.".PHP_EOL;
echo PHP_EOL.PHP_EOL.PHP_EOL;
//outro exemplo
$styles = array("Harlem", "Shake", "Dance" => "Crazy");
echo "1- He Just Do $styles[0] Dance.".PHP_EOL;
echo "2- He Just Do $styles[1] Dance.".PHP_EOL;
echo "3- He Just Do $styles[Dance] Dance.".PHP_EOL;
class People {
    public $john = "John Smith";
    public $jane = "Jane Smith";
    public $robert = "Robert Paulsen";
    public $smith = "Smith";
}
$people = new People();
echo "4- $people->john just do $styles[0] Dance.".PHP_EOL;
echo "5- $people->john then said hello to $people->jane.".PHP_EOL;
echo "6- $people->john's wife greeted $people->robert.".PHP_EOL;
echo "7- $people->robert greeted the two $people->smiths."; // Won't work
