<?php

preg_match_all("/<.*>/", "<p>PHP</p>", $matches);
//print_r($matches);
echo $matches[0];
echo PHP_EOL;
