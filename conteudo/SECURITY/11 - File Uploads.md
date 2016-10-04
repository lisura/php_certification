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

A função _move_uploaded_file_  .. continuar.



The PHP function move_uploaded_file will move the temporary file to a location provided by the user. In this case, the destination is below the server root. Therefore the files can be accessed using a URL like: http://www.domain.tld/uploads/uploadedfile.ext. In this simple example, there are no restrictions about the type of files allowed for upload and therefore an attacker can upload a PHP or .NET file with malicious code that can lead to a server compromise.

This might look like a naïve example, but we did encounter such code in a number of web applications.


FUNCOES
http://php.net/manual/pt_BR/function.is-uploaded-file.php
http://php.net/manual/pt_BR/function.move-uploaded-file.php

FILE
  UPLOADS

$_FILES IS FILLED WITH USER-SUPPLIED DATA, AND THEREFORE POSES RISK
  o RISK: FILE NAME CAN BE FORGED
  o COUNTER: USE CHECKS AND
  o RISK: MIME TYPE CAN BE FORGED
  o COUNTER: IGNORE
  o RISK: TEMP FILE NAME CAN BE FORGED UNDER CERTAIN CONDITIONS
  o COUNTER: USE  *_uploaded_file() FUNCTIONS (* = is, move)
