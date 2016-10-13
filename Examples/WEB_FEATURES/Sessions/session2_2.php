<?php
session_start();
echo '<pre>';
echo "session_id: " . session_id() .PHP_EOL;

$key = ini_get("session.upload_progress.prefix") . 'up1';
print_r($_SESSION);
