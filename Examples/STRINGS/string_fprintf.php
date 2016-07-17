<?php
if (!($fp = fopen('string_sample.txt', 'w'))) {
    return;
}
$texto = 'enuf is enuf, I ve had it with these mother fucking snakes on this mother fucking plane, every body strap in, I am about  to open some fucking windows';
fprintf($fp, "%s", $texto);
