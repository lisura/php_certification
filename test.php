<?php
class Casa {
    public function __construct($nome) {
        $this->nome = $nome;
        echo $this->id;
    }
}

try {
    $db = new PDO('mysql:host=localhost;dbname=game_of_thrones', 'root', '123mudar');
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $r = $db->query('SELECT * FROM casa LIMIT 1')
            ->fetchAll(PDO::FETCH_CLASS, 'casa', ['Baratheon']);
 var_dump($r);

} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
