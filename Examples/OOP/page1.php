<?php
include("sharknado.inc");

$bestMovie = new BestMovie;
$s_bestMovie = serialize($bestMovie);
// store $s somewhere where page2.php can find it.
file_put_contents('storeBestMovie', $s_bestMovie);
