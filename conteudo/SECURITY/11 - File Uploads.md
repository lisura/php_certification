#File Uploads

Permitir que um usuario possa realizar upload em seu site é como abrir uma porta para que o usuario mal intencionada comprometa seu servidor.

Ainda hoje, diversos sistemas WEB não têm formas de upload de arquivos seguras. Algumas dessas vulnerabilidades podem ser facilmente explorados, e poderíamos ter acesso ao sistema do servidor que hospeda esses aplicativos web.

## Formualrio simples sem validação

Ainda hoje podemos achar aplicações com formularios como o demosntrado abaixo.

```html
<form enctype="multipart/form-data" action="uploader.php" method="POST">
  <input type="hidden" name="MAX_FILE_SIZE" value="100000" /> Choose a file to upload:
  <input name="uploadedfile" type="file" /><br />
  <input type="submit" value="Upload File" />
</form>
```

No lado do PHP temos o arquivo PHP "uploader.php"

```php
<?php
$target_path  =  "uploads/";
$target_path  =  $target_path  .  basename($_FILES['uploadedfile']['name']);
if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
  echo "The file " . basename($_FILES['uploadedfile']['name']) . " has been uploaded";
} else {
  echo "There was an error uploading the file, please try again!";
}
```

Quando o PHP recebe um POST com o encoding multipart/form-data, ele cria um arquivo temporario com um nome randomico no diretorio temporario. Ele tambem popula o array \_FILES com informações do arquivo.

- $\_FILES[‘uploadedfile’][‘name’]: Nome original do arquivo
- $\_FILES[‘uploadedfile’][‘type’]: mime type do arquivo
- $\_FILES[‘uploadedfile’][‘size’]: O tamanho do arquivo
- $\_FILES[‘uploadedfile’][‘tmp_name’]: O nome temporario do arquivo

A função _move_uploaded_file_  vai mover o arquivo temporario para uma local indicado pelo usuario. Neste caso o destino é abaixodo root do servidor, podendo então ser acessaro pela URL www.sua_url.com/uploads/uploadedfile.ext.

No exemplo como não temos restrição do tipo de arquivo o usuario vai poder realizar um upload de um arquivo php por exemplo. Apesar de ser um exemplo tosco, ainda hoje podemos achar aplicações que não tratam no servidor seus arquivos.

### Funções

Estas são duas funções que podem ser usadas para realizar um tratamento no arquivo de entrada.

**is_uploaded_file** — Diz se o arquivo foi enviado por POST HTTP

>bool is_uploaded_file ( string $filename )

Retorna TRUE se o arquivo com o nome filename foi enviado por POST HTTP. Isto é útil para ter certeza que um usuário malicioso não está tentando levar o script a trabalhar em arquivos que não deve estar trabalhando --- por exemplo, _/etc/passwd_.

```php
<?php
if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
   echo "O arquivo ". $_FILES['userfile']['name'] ." foi enviado com sucesso.\n";
   echo "Mostrando o conteúdo\n";
   readfile($_FILES['userfile']['tmp_name']);
} else {
   echo "Possível ataque de envio de arquivo: ";
   echo "nome do arquivo '". $_FILES['userfile']['tmp_name'] . "'.";
}
```

**move_uploaded_file** — Move um arquivo enviado para uma nova localização

>bool move_uploaded_file ( string $filename , string $destination )

Esta função verifica para ter certeza de que o arquivo designado por filename é um arquivo de upload válido (que tenha sido enviado pelo mecanismo PHP de envio por POST HTTP). Se o arquivo for válido, ele será movido para o nome de arquivo dado por destination.

Este tipo de verificação é especialmente imporante se existir alguma change que qualquer coisa feita com os arquivos enviados possa revelar seu conteúdo ao usuário, ou mesmo para outros usuários no memo sistema.

Retorna: FALSE se não for um arquivo enviado válido.

```php
<?php
$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}
echo 'Aqui está mais informações de debug:';
print_r($_FILES);
```
