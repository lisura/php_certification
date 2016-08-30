<?php
$string = <<<THESTRING
enuf is enuf, I ve had it with these mother %1\$s <br />
snakes on this mother %3\$s <br />
plane, every body strap in, I am about  to open some %2\$s <br />
windows
THESTRING;
$returnText = vprintf(  $string, array('fucking','LOVING','fucking')  );
echo $returnText;
