# Sessions

O suporte a sessões no PHP consiste em uma maneira de preservar certos dados atráves dos acessos subsequentes.

Um visitante acessando o seu web site ganha um identificador único, o assim chamado id de sessão. Ele é salvo em um cookie do lado do usuário ou propagado via URL.

O suporte à sessão permite armazenar dados entre as requisições no array super global $\_SESSION. Quando um visitante acessar seu site, o PHP vai conferir automaticamente (se session.auto_start estiver definido como 1) ou quando você pedir (explicitamente atráves de session_start()) se um id de sessão específico foi enviado com a requisição. Se este for o caso, o ambiente anteriormente salvo é recriado.

$\_SESSION (e todas as variávels registradas) são serializadas internamente pelo PHP usando o manipulador de serialização especificado pela configuração INI session.serialize_handler depois que a requisição terminar. Variáveis registradas que estejam indefinidas são marcadas como não definidas. Nos acessos subsequentes, elas não são definidas pelo módulo da sessão, a menos que o usuário as definam posteriormente.

> **Aviso**:
Porque as variáveis de sessão são serializadas, variáveis resource não podem ser armazenadas em sessão. 
**php_serialize** está disponível a partir do PHP 5.5.4.

---

## Registro e Desregistro de Sessão

```php
<?php
session_start();
//Registro:
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
?>
```

```php
<?php
session_start();
//Desregistro:
unset($_SESSION['count']);
?>
```

---

## Configurações

* session.save_handler string
* session.save_path string
* session.name string
* session.auto_start boolean
* session.serialize_handler string
* session.gc_probability integer
* session.gc_divisor integer
* session.gc_maxlifetime integer
* session.referer_check string
* session.entropy_file string
* session.entropy_length integer
* session.use_strict_mode boolean
* session.use_cookies boolean
* session.use_only_cookies boolean
* session.cookie_lifetime integer
* session.cookie_path string
* session.cookie_domain string
* session.cookie_secure boolean
* session.cookie_httponly boolean
* session.cache_limiter string
* session.cache_expire integer
* session.use_trans_sid boolean
* session.trans_sid_tags string
* session.trans_sid_hosts string
* session.hash_function mixed
* session.hash_bits_per_character integer
* session.upload_progress.enabled boolean
* session.upload_progress.cleanup boolean
* session.upload_progress.prefix string
* session.upload_progress.name string
* session.upload_progress.freq mixed
* session.upload_progress.min-freq integer
* session.lazy_write boolean

## Manipuladores de Sessão Personalizados

*session_set_save_handler()* define as funções de armazenamento de sessão que serão usadas par guardar e buscar dados associados com uma sessão. Ela é mais útil quando um método de armazenamento diferente do disponibilizado pelas sessões do PHP é preferido. i.e. Armazenar os dados de sessão em um banco de dados.

```php
bool session_set_save_handler ( callable $open , callable $close , callable $read , callable $write , callable $destroy , callable $gc [, callable $create_sid ] )

//A partir do PHP 5.4.0
bool session_set_save_handler ( SessionHandlerInterface $sessionhandler [, bool $register_shutdown = true ] )
```

O PHP sempre requer manipuladores de gravação de sessão. O padrão normalmente é o manipulador de gravação interno de '**arquivos**'. Um manipulador personalizado pode ser configurado usando session_set_save_handler(). Manipuladores internos alternativos também são disponibilizados por extensões do PHP, como sqlite, memcache e memcached e podem ser definidos com session.save_handler.

## SessionHandler

```php
<?php
SessionHandler implements SessionHandlerInterface {

    /* Métodos */
    public bool close ( void )
    public string create_sid ( void )
    public bool destroy ( string $session_id )
    public bool gc ( int $maxlifetime )
    public bool open ( string $save_path , string $session_name )
    public string read ( string $session_id )
    public bool write ( string $session_id , string $session_data )
}
?>
```

## Progresso de Upload em Sessão

Quando a configuração INI session.upload_progress.enabled estiver habilitada, o PHP será capaz de rastrear o progresso do upload de arquivos individuais que estiverem sendo feito upload. 

```php
<?php
$key = ini_get("session.upload_progress.prefix") . $_POST[ini_get("session.upload_progress.name")];
var_dump($_SESSION[$key]);
?>
```

Também é possível cancelar o upload do arquivo em andamento ao definir o índice **$\_SESSION[$key]["cancel_upload"]** para TRUE. Quando um upload é cancelado dessa forma, o índice error no array $\_FILES será alterado para UPLOAD_ERR_EXTENSION.

As configurações INI session.upload_progress.freq e session.upload_progress.min_freq controlam a frequência com que a informação do progresso do upload deve ser recalculado.

## Funções para Sessão

* **session_start** — Inicia uma nova sessão ou resume uma sessão existente
* **session_destroy** — Destrói todos os dados registrados em uma sessão
* **session_cache_expire** — Retorna o prazo do cache atual
* **session_cache_limiter** — Obtém e/ou define o limitador do cache atual
* **session_encode** — Codifica os dados atuais da sessão como uma sessão codificada em formato string
* **session_decode** — Decodifica dados de sessão de uma sessão codificada em formato string
* **session_unset** — Libera todas as variáveis de sessão
* **session_gc** — Perform session data garbage collection
* **session_set_cookie_params** — Define os parâmetros do cookie de sessão
* **session_get_cookie_params** — Obtém os parâmetros do cookie da sessão
* **session_id** — Obtém e/ou define o id de sessão atual
* **session_name** — Obtém e/ou define o nome da sessão atual
* **session_module_name** — Obtém e/ou define o módulo da sessão atual
* **session_regenerate_id** — Atualiza o id da sessão atual com um novo id gerado
* **session_status** — Retorna o status atual da sessão
* **session_commit** — Sinônimo de session_write_close
* **session_write_close** — Guarda os dados de sessão e fecha a sessão
* **session_register_shutdown** — Função de finalização da sessão
* **session_save_path** — Obtém e/ou define o caminho para armazenamento da sessão atual
* **session_set_save_handler** — Define funções de armazenamento de sessão

## Forms

Uma das características mais fortes do PHP é o jeito como ele trata formulários HTML. Qualquer elemento de formulário irá automaticamente ficar disponível para uso em scripts PHP. O script que recebe os dados é definido no parâmetro action. Caso esse parametro não seja definido, os dados são enviados para a URI atual.

As variáveis $\_POST[] e $\_GET[] são criadas automaticamente pelo PHP. Podemos utilizar a superglobal $\_REQUEST, se não se importar com qual a origem dos dados enviados. Ele conterá os dados mesclados de origens GET, POST e COOKIE.

**Configurações php.ini**

* **variables_order string**: Define a ordem de interpretação das variáveis EGPCS (Environment, Get, Post, Cookie, e Server). Por exemplo, se variables_order estiver defindo como "SP" então o PHP vai criar as variáveis superglobals $_SERVER e $_POST, mas não irá criar $_ENV, $_GET e $_COOKIE. Configurar para "" significa que superglobals não será definida.
* **track_vars boolean**: Se habilitado, então as variáveis Environment, GET, POST, Cookie, e Server podem ser encontradas nas arrays associativas $_ENV, $_GET, $_POST, $_COOKIE, e $_SERVER. A partir do PHP 4.0.3, track_vars está sempre em ON.
* **request_order**: Esta diretiva descreve a ordem na qual PHP regista as variáves GET, POST, e Cookie no array _REQUEST. Registro é feito da esquerda para direita, valores mais recentes sobreescrevem os valores antigos. Se esta diretiva não está definida, variables_order é usado para conteúdo $_REQUEST. Note que a distribuição padrão do arquivo php.ini não contém o 'C' para cookies, por motivos de segurança.

**Estrutura de $\_FILE**:
$_FILES ['filename'][.......]

* ['name'] CLIENT-SIDE FILE NAME
* ['type'] MIME TYPE
* ['size'] FILE SIZE
* ['error'] ERROR CODE FOR UPLOAD
* ['tmp_name'] TEMPORARY FILENAME OF FILE IN WHICH THE UPLOADED FILE WAS STORED ON THE SERVER

Exemplo de upload em form:
```PHP
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste de Upload</title>
    </head>
    <body>

    <?php
      if(!empty($_FILES)){
        echo '<pre>' . print_r($_FILES,1) . '</pre>';
      }
    ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>"  enctype="multipart/form-data">
      <p>&lt; 2 mb</p>
       <p><input type="file" name="file1" /></p>
       <p><input type="file" name="file2" /></p>
       <input type="submit" />
    </form>
    </body>
</html>
```

# Cookies

Cookies é um mecanismo para guardar dados no navegador remoto e permite o ratreamento ou identificação do retorno de usuários. Você pode criar cookies usando a função **setcookie()** ou **setrawcookie()**. Os cookies são uma parte do cabeçalho HTTP, logo **setcookie()** precisa ser chamada antes que qualquer outro dado seja enviado ao navegador. 

Qualquer cookie enviado por você para o cliente automaticamente será incluido na array auto-global **$\_COOKIE** se variables_order contém "C".

## setcookie

A função setcookie() define um cookie para ser enviado juntamente com o resto dos cabeçalhos HTTP. Como outros cabeçalhos (headers), os cookies devem ser enviados antes de qualquer saída do seu script (isso é uma restrição do protocolo). O que quer dizer que você deve colocar chamadas a essa função antes de qualquer saída, incluindo as tags \<html\> e \<head\> e também espaços em branco.

Uma vez que os cookies foram setados, eles podem ser acessados **no próximo carregamento da página** através do array *$\_COOKIE*. Os valores dos cookies também podem existir no *$\_REQUEST*.

### Parâmetros

A RFC 6265 fornece a referência normativa de como cada parâmetro de setcookie() é interpretado.

* **name**: O nome do cookie.
* **value**: O valor do cookie. Esse valor é guardado no computador do cliente; não guarde informação sensível. Supondo que o name seja 'nomedocookie', o valor pode ser lido través de $\_COOKIE['nomedocookie']
* **expire** :O tempo para o cookie expirar. Se configurado para 0, ou omitido, o cookie irá expirar ao fim da sessao (quando o navegador fechar)
* **domain**: O (sub)domínio para qual o cookie estará disponível. Definindo para um subdomínio (como 'www.example.com') deixará o cookie disponível para aquele subdomínio e todos os outros sub-domínios abaixo dele (exemplo w2.www.example.com). Para deixar o cookie disponível para todo o domínio (incluindo todos os subdomínios dele), simplesmente defina o valor para o nome do domínio ('example.com', nesse caso).
* **path**: O caminho no servidor aonde o cookie estará disponível. Se configurado para '/', o cookie estará dosponível para todo o domain. Se configurado para o diretório '/foo/', o cookie estará disponível apenas dentro do diretório /foo/ e todos os subdiretórios como /foo/bar do domain. O valor padrão é o diretório atual onde o cookie está sendo configurado.
* **secure**: Indica que o cookie só podera ser transimitido sob uma conexão segura HTTPS do cliente. Quando configurado para TRUE, o cookie será enviado somente se uma conexão segura existir. No lado do servidor, fica por conta do programador enviar esse tipo de cookie somente sob uma conexão segura (ex respeitando $\_SERVER["HTTPS"]).
* **httponly**: Quando for TRUE o cookie será acessível somente sob o protocolo HTTP. Isso significa que o cookie não será acessível por linguagens de script, como JavaScript. É dito que essa configuração pode ajudar a reduzir ou identificar roubos de identidade através de ataques do tipo XSS (entretanto ela não é suportada por todos os browsers), mas essa informação é constantemente discutida. Foi adicionada no PHP 5.2.0. TRUE ou FALSE

### Retorno (boolean)

Se existe saída antes da chamada dessa função, setcookie() irá falhar e retornará FALSE. Se a função setcookie() for executada com sucesso, ela retornará TRUE. Isso não indica que o usuário aceitou o cookie.

#### Exemplo:

```php
<?php
$value = 'Teste';

setcookie("CookieTeste", $value);
setcookie("CookieTeste", $value, time()+3600);  /* expira em 1 hora */
?>

<?php
// Mostra um cookie individual
echo $_COOKIE["CookieTeste"];

// Outra maneira de depurar(debug)/testar é vendo todos os cookies
print_r($_COOKIE);
?>

<?php
//Quando estiver deletando um cookie, tenha certeza de que a data de expiração dele está no passado, para acionar o mecanismo de remoção do seu navegador.
setcookie("CookieTeste", "", time() - 3600);
?>
```

# HTTP HEADERS

Embora o conceito de HTTP Headers seja abstraído no desenvolvimento, o PHP permite trabalhar com os headers nativamente. Para mais detalhes de HTTP Headers, segue o link https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers

## Função  header()

**Parametros**

* Header String - String con a entrada de Header;
* Replace Boolean - True para sobreescrita;
* Http_response_code String - Força o Code de Http com a String Não Nula de Header.

```php
<?php
header('Content-Type: application/json');
```

Podemos também encadear diversos cabeçalhos a serem enviados chamando a função header diversas vezes. Além de utilizarmos Content-Type, podemos usar o HTTP/1.0 200 OK para indicar que a requisição foi aceita e a resposta foi recebida com sucesso e sem nenhum erro.

## Funções de HTTP Header

* headers_list() - Lista de headers enviados ou pendentes de envio, array indexado
* headers_sent() - Booleano, Confirma headers que foram enviados ou não
* header_remove() - Remove header setado anteriormente

## Códigos HTTP Header

* isError - Booleano; verifica se o código do status é de erro (Erro de client - 4XX / Erro de server - 5XX)
* isSuccessful - Booleano; verifica se o código do status é de sucesso (2XX)

## Outros códigos HTTP Header:

* 1XX - INFORMATIONAL
* 3XX - REDIRECTION

## Exemplos

* 200 - OK
* 202 - Accepted
* 301 - Moved Permanently
* 305 - Use Proxy
* 401 - Unauthorized
* 403 - Forbidden
* 404 - Not Found

Mais detalhes dos códigos HTTP em https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
