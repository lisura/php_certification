<?php

    // diretorio atual
    echo getcwd() . "\n";

    //altera o diretorio
    chdir('diretorio');

    echo getcwd() . "\n";

   //abre o handle do diretorio
   $dir = opendir(getcwd());
    
   //fecha o handle do diretorio
   closedir($dir);

    //exibe o nome do diretorio pai
    echo dirname(getcwd())."\n";

    //espaco disponivel no diretorio
    echo disk_free_space(getcwd())."\n";

    //espaco total do diretorio
    echo disk_total_space(getcwd())."\n";

    if(!is_dir('/nao/existe'))
    {
        echo "/nao/existe nao eh um diretorio\n";
    }

    //cria um diretorio
    mkdir("teste");

    //deleta o diretorio
    rmdir("teste");

   
