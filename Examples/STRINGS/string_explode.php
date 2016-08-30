<?php
$string = 'I ve had it with these mother fucking snakes on this mother fucking plane, every body strap in, I am about  to open some fucking windows';
$delimiter = 'fucking';
$saida = explode ( $delimiter , $string  );
print_r($saida);
$saida = explode ( $delimiter , $string, 2  );
print_r($saida);
$saida = explode ( $delimiter , $string, -1  );
print_r($saida);
