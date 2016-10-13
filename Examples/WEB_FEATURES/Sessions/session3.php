<?php

/* define o limitador de cache para 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* define o prazo do cache em 30 minutos */
session_cache_expire(30);
$cache_expire = session_cache_expire();

/* inicia a sessão */
session_start();

echo "O limitador de cache esta definido agora como $cache_limiter<br />";
echo "As sessoes em cache irao expirar depois de $cache_expire minutos";
