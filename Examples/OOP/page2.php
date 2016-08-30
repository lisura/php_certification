<?php
include("sharknado.inc");
$s_bestMovie = file_get_contents('storeBestMovie');
$bestMovie = unserialize($s_bestMovie);
// now use the function show_one() of the $a object.
$bestMovie->show_best_movie_ever();
