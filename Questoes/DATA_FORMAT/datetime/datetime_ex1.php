<?php
/* Extraído de PHP.net (date) */

echo '<br>'.date('F j, Y, g:i a');                 
echo '<br>'.date('m.d.y');                         
echo '<br>'.date('j, n, Y');                       
echo '<br>'.date('Ymd');                           
echo '<br>'.date('h-i-s, j-m-y, it is w Day');     // Aqui vamos ter um valor estranho pois cada caractere está sendo processado
echo '<br>'.date('\i\t \i\s \t\h\e jS \d\a\y.');   // Aqui os caracteres estão sendo escapados corretamente
echo '<br>'.date('D M j G:i:s T Y');               
echo '<br>'.date('H:m:s \m \i\s\ \m\o\n\t\h');     
echo '<br>'.date('H:i:s');                         
echo '<br>'.date('Y-m-d H:i:s');                   // Formato de data MySQL