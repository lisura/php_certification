<?php

    $filename = 'exemplo.txt';

    //verifica se o arquivo existe
    if(file_exists($filename))
    {

        //retorna o nome do arquivo de um caminho
        echo basename($filename)."\n";

        //modifica permissao do arquivo
        chmod($filename, 0777);

        echo "$filename teve o ultimo acesso em: " . date ("F d Y H:i:s.", fileatime($filename))."\n";

        echo "$filename foi modificado em: " . date ("F d Y H:i:s.", filemtime($filename))."\n";
        if (touch ($filename)) {
            print "o tempo do $filename foi modificado para o dia e hora atual\n";
        } else {
            print "Desculpe, não foi possivel modificar o tempo de $filename\n";
        }

        echo "Tipo do arquivo: ".filetype($filename)."\n";

        //cria  um nome de arquivo único
        $filename2 = tempnam (getcwd(), 'exemplo.txt');

        echo 'arquivo copiado para: '.$filename2."\n";

        //copia o arquivo
        copy($filename, $filename2);

        $array = file($filename2);

       var_dump($array);

        //verifica se o arquivo possui permissao de leitura
        if(is_readable($filename2))
        {
            $fp = fopen($filename2, 'rb');

            //verifica quando eh o final do arquivo
            while(!feof($fp)) {
              //retorna o caractere do ponteiro
              echo fgetc($fp);
            }
            //exibe um status do arquivo baseado no ponteiro
            var_dump(fstat($fp));
            //retorna a posicao do ponteiro
            echo 'final do arquivo em '.ftell($fp)."\n";

            //retorna o ponteiro para o inicio do arquivo
            rewind($fp);
            echo 'voltou para o inicio em '.ftell($fp)."\n";

            fclose($fp)."\n";
        }

        //deleta o arquivo
        unlink($filename2);

        $link = 'link';

        //retorna o campo st_dev da estrutura stat do Unix C retornado pela chamada do sistema
        if(!linkinfo($link))
            //cria um link para o arquivo
            link($filename, $link);
        else
            echo "link ja existe\n";

    }
