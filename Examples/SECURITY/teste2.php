<?php
$options=array('options'=>array('default'=>1, 'min_range'=>1, 'max_range'=>3));
$priority=filter_input(INPUT_GET, 'movie_number', FILTER_VALIDATE_INT, $options);
echo "<pre>";
print_r($priority);
