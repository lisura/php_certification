# Arquivos e Funções de Sistema de Arquivos

É possível utilizar o PHP para manipular arquivos e diretórios.
Para tal, existem funções de manipulação de arquivos.

Funções de filesystem e arquivo:

* Recursos de arquivos
* Recursos de escrita
* Output

Funções de operações:

* Diretório
* Arquivo de informação
* Filesystem

Recurso (resource) é uma fonte de dados que pode ser manipulada. Um recurso de arquivo (file resource) é um arquivo no filesystem no qual o PHP pode manipular. O resource é único para a sessão do usuário.

As funções que começam com a letra *f* (como fopen(), fclose()) lidam com recursos
de arquivos, já as que se iniciam com *file* (exemplo: file_get_content()) lidam
com nomes de arquivos.
