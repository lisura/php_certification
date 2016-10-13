<?php
session_start();

$old_sessionid = session_id();

session_regenerate_id();

$new_sessionid = session_id();

echo "Session id antiga: $old_sessionid<br />";
echo "Session id nova: $new_sessionid<br />";

print_r($_SESSION);

session_destroy();
?>
