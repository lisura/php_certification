<?php
echo '=>  preg_match_all  <='.PHP_EOL;
preg_match_all("|<[^>]+>(.*)</[^>]+>|U",
    "<b>Um homem que não se dedica à família: </b><div align=left>jamais será um homem de verdade</div>",
    $out, PREG_PATTERN_ORDER);
print_r($out);
echo PHP_EOL;echo PHP_EOL;
echo '=>  preg_match  <='.PHP_EOL;
$subject = "Eu vou fazer-lhe uma oferta que você não pode recusar. ";
$pattern = '/^Eu/';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
echo PHP_EOL;echo PHP_EOL;
echo '=>  preg_quote  <='.PHP_EOL;
$keywords = 'Os homens mais rico$ são aqueles que possuem *amigos* mais poderosos';
$keywords = preg_quote($keywords, '/');
echo $keywords;
echo PHP_EOL;echo PHP_EOL;
