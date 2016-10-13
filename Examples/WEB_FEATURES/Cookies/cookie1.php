<?php
$value = 'alguma coisa de algum lugar';

setcookie("CookieTeste", $value);
setcookie("CookieTeste", $value, time()+3600);  /* expira em 1 hora */

?>
