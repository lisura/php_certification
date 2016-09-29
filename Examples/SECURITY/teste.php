<?php
$search_html = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$search_url = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_ENCODED);
echo "<pre>";
print_r($search_html);
print_r($search_url);
