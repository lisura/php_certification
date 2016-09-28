# Instruções Preparadas

Instruções Preparadas (*Prepared Statements*) são uma forma de executar um mesmo (ou similar) comando
SQL repetidamente de forma eficiente.  
Com uma instrução preparada, a querry só é passada uma vez, mas pode ser executada repetidamente com os mesmos ou diferentes parâmentros. Os parâmentros não precisam ser colocados entre aspas, diminuindo a chance de sofrer *SQL injection*.

Exemplo:
````PHP
<?php
$sql = "INSERT INTO casa (nome, lema, sede) VALUES (?, ?, ?)";
````

[Exemplo usando MySQLi]()
