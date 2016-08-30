# Configurações  

Os arquivos de configuração do PHP estabelecem as configurações iniciais para as aplicações, servidores e sistemas operacionais.  

## php.ini  
O php.ini é lido quando o PHP é iniciado. Para as versões de módulo de servidor, isso acontece apenas quando o servidor web for iniciado. Para as versões CGI e CLI, isso acontece a cada invocação.  

O php.ini é carregado pelo PHP em diversos locais, nesta ordem:
* Local específico do módulo SAPI
* A variável de ambiente PHPRC.
* A Localização do arquivo php.ini pode ser definida para versões diferentes do PHP. As seguintes chaves do registro são examinadas na ordem: [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x.y.z], [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x.y] e [HKEY_LOCAL_MACHINE\SOFTWARE\PHP\x], onde x, y e z significam a versão maior, menor e release do PHP. Se houver um valor para IniFilePath nestas chaves, então o primeiro encontrado será utilizado para a localização do php.ini (apenas Windows).
[HKEY_LOCAL_MACHINE\SOFTWARE\PHP], valor de IniFilePath (Somente Windows).
* Diretório de trabalho atual (exceto CLI)
* O diretório do servidor web (para módulo SAPI), ou diretório do PHP (caso contrário, no Windows).
* Diretório do Windows (C:\windows ou C:\winnt) (para Windows), ou a opção de tempo de compilação --with-config-file-path .

O uso de variáveis de ambiente podem ser usadas no php.ini . Exemplo:  
````php
; PHP_MEMORY_LIMIT is taken from environment
memory_limit = ${PHP_MEMORY_LIMIT}
````

## user.ini  
o PHP tem suporte para arquivos de configuração INI por cada diretório. Esses arquivos são processados apenas pelo CGI/FastCGI SAPI. Se está usando Apache, use arquivos .htaccess para o mesmo efeito.  

Somente configurações INI com os modos PHP_INI_PERDIR e PHP_INI_USER serão reconhecidos nos arquivos INI estilo .user.ini.  

## Onde uma configuração pode ser definida?

Existem modos que determinam quando e onde uma diretiva do PHP pode ou não pode ser definida. Por exemplo, algumas definições podem ser feitas em um script PHP usando ini_set(), enquanto outras só podem ser feitas no php.ini ou httpd.conf.  

Quando usar o PHP como módulo do Apache, pode mudar as configurações usando diretivas nos arquivos de configuração do Apache (ex.: httpd.conf e .htaccess). É necessário os privilégios "AllowOverride Options" ou "AllowOverride All" para fazer isso.

Definição dos modos PHP_INI_*  

| Modo	          | Significado                                                                                         |
|-----------------|-----------------------------------------------------------------------------------------------------|
|PHP_INI_USER     | A entrada pode ser definida nos scripts do usuário (com ini_set()) ou no registro do Windows. Desde o PHP 5.3 a entrada pode ser definida no .user.ini |
| PHP_INI_PERDIR  | A entrada pode ser definida no php.ini, .htaccess, httpd.conf ou .user.ini                          |
| PHP_INI_SYSTEM  | A entrada pode ser definida no php.ini ou httpd.conf                                                |
| PHP_INI_ALL     | A entrada pode ser definida em qualquer lugar                                                       |

[Lista de diretivas do php.ini](https://secure.php.net/manual/pt_BR/ini.list.php)  
