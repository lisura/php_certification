# Configuração

Veremos como alterar o arquivo php.ini para manter o PHP corretamente configurado.

## Linux

Caminho do arquivo: /etc/php5/apache2/

## Windows com Wamp

C:/wamp/bin/apache/Apache

# Mac OS X

sudo cp /etc/php.ini.default /etc/php.ini

>Caso o PHP não esteja rodando em mode CGI ou CLI, será preciso executar o PHP em modo servidor. Cada alteração no php.ini resulta em ter que reiniciar o servidor para que as alterações tenham efeito.

## O Arquivo php.ini

Com grandes poderes vem grandes responsabilidades...

Embora o PHP tenha muitos recursos dinâmicos, estes podem se tornar uma dor de cabeça devido ao potencial risco de segurança (como gravar arquivos no servidor e obter controle ou trocar a página inicial, etc). 

Seguem algumas modificações visando proteger o sistema de eventuais invasões ou falhas de segurança.

*allow_url_fopen e allow_url_include*

É importante que estas variáveis tenham valor "Off", caso contrário o servidor permite que arquivos que não estejam no mesmo servidor possam ser incluidos, abrindo brecha para a Inclusão de Arquivos Remotos (RFI). Com isso o invasor poderia executar códigos no servidor, causar DoS ou roubar dados. 

*max_execution_time e max_input_time*

São necessárias para definir o tempo de execução de um script e o tempo de interpretação de dados de entrada vindos de GET ou POST.

### Uso de Memória

Essas configurações determinam o quanto de memória um script pode alocar, sendo muito importante para que um invasor não consiga consumir toda a memória do servidor.

*memory_limit*

Limite de memória em bytes que um script pode alocar (ex: 16M)

*upload_max_filesize*

Tamanho máximo permitido para upload de arquivos.

*post_max_size*

Tamanho máximo de dados a serem enviados por POST. Influencia diretamente a configuração acima, pois esta precisa ser maior, caso contrário o arquivo não poderá ser postado.

*max_input_nesting_level*

Determina a profundidade máxima de $_GET e $_POST. Reduz a possibilidade de DoS que tente se aproveitar da colisão de hash (multiplos valores em um POST, causando DoS)

### Exibição e log de erros

A forma como os erros são exibidos podem fornecer dados que um invasor procura para poder atacar o servidor. Assim é importante tomar cuidado com o que será exibido em caso de erros.

*display_errors*

Determina se os erros de sistemas serão exibidos para o usuário ou não.

*log_errors*

Determina se as mensagens de erro serão gravadas em logs do servidor.

*error_reporting*

Quais serão os tipos de erros a serem exibidos. Os tipos são determinados por constantes binárias como E_ALL , E_DEPRECATED e E_STRICT. O padrão no PHP 4 e 5 é **E_ALL & ~ E_NOTICE**, ou seja, erros de Notice não serão exibidos. 



