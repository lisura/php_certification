<?php
echo '== Alphabets ==' . PHP_EOL;

$s = 'W';

for ($n=0; $n<6; $n++) {
    echo ++$s . PHP_EOL;
}

// Digit characters behave differently

echo '== Digits ==' . PHP_EOL;
$d = 'A8';

for ($n=0; $n<6; $n++) {
    echo ++$d . PHP_EOL;
}

$d = 'A08';

for ($n=0; $n<6; $n++) {
    echo ++$d . PHP_EOL;
}