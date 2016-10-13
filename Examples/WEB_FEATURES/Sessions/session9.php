<?php
session_name('FHCSESSIONID');

session_start();

echo '<pre>';

print_r(array(
  'session_status' => session_status(),
  'status_possiveis' => array(
    'PHP_SESSION_DISABLED' => PHP_SESSION_DISABLED,
    'PHP_SESSION_NONE' => PHP_SESSION_NONE,
    'PHP_SESSION_ACTIVE' => PHP_SESSION_ACTIVE
  )
));

echo PHP_EOL;

if(empty($_SESSION['user'])){
    echo "Definida para Fernando".PHP_EOL;
    $_SESSION['user'] = [
      'name' => 'Fernando H Correa',
      'date' => '1981-05-05 09:32:00'
    ];

    session_commit();

} else {

  echo "Redefinida para Yan".PHP_EOL;

  $_SESSION['user'] = [
    'name' => 'Yan Astolpho Correa',
    'date' => '2015-03-16 07:19:00'
  ];

  //session_commit();
  //session_register_shutdown();

}


print_r($_SESSION);


session_destroy();
?>
