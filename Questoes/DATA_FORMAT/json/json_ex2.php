<?php
$json = '{"asterix":"é um guerreiro gaulês e o herói das histórias, morador da aldeia de Armórica.","obelix":" é o melhor amigo de Asterix.","ideiafix":"é um cão e o fiel companheiro de Obelix. É ainda o único cão ecologista de que há memória.","chatotorix":"é um bardo que irrita os moradores da aldeia quando começa a cantar e tocar com a sua harpa.","panoramix":"é um druida gaulês, responsável na preparação de uma poção mágica que dá força sobre-humana a quem a bebe."}';

echo "<pre>";
var_dump(json_decode($json));
var_dump(json_decode($json, true));
