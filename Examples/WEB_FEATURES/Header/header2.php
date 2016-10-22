<?php

header('Token:  meu_token');
header('Token:  outro_valor',   false);
header('Invalid-Token:  meu_token', true,   401);

print_r(headers_list()); 
