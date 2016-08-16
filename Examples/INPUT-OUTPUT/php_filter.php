<?php

/* Definindo nossa classe de filtro */
class strtoupper_filter extends php_user_filter {
  function filter($in, $out, &$consumed, $closing)
  {
    while ($bucket = stream_bucket_make_writeable($in)) {
      $bucket->data = strtoupper($bucket->data);
      $consumed += $bucket->datalen;
      stream_bucket_append($out, $bucket);
    }
    return PSFS_PASS_ON;
  }
}

/* Registrando nosso filtro no PHP */
stream_filter_register("strtoupper", "strtoupper_filter")
    or die("Falha ao registrar o filtro");

$fp = fopen("exemplo2.txt", "w");

/* Adiciona o filtro registrado a stream recem aberta */
stream_filter_append($fp, "strtoupper");

fwrite($fp, "Pichu\n");
fwrite($fp, "Pikachu\n");
fwrite($fp, "Raichu\n");

fclose($fp);

/* Le o conteudo do arquivo
 */
readfile("exemplo2.txt");
