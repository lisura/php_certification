# Sessions

O suporte a sessões no PHP consiste em uma maneira de preservar certos dados atráves dos acessos subsequentes.

Um visitante acessando o seu web site ganha um identificador único, o assim chamado id de sessão. Ele é salvo em um cookie do lado do usuário ou propagado via URL.

O suporte à sessão permite armazenar dados entre as requisições no array super global $\_SESSION. Quando um visitante acessar seu site, o PHP vai conferir automaticamente (se session.auto_start estiver definido como 1) ou quando você pedir (explicitamente atráves de session_start()) se um id de sessão específico foi enviado com a requisição. Se este for o caso, o ambiente anteriormente salvo é recriado.

$\_SESSION (e todas as variávels registradas) são serializadas internamente pelo PHP usando o manipulador de serialização especificado pela configuração INI session.serialize_handler depois que a requisição terminar. Variáveis registradas que estejam indefinidas são marcadas como não definidas. Nos acessos subsequentes, elas não são definidas pelo módulo da sessão, a menos que o usuário as definam posteriormente.

> **Aviso**:
Porque as variáveis de sessão são serializadas, variáveis resource não podem ser armazenadas em sessão. Manipuladores de serialização (**php e php_binary**) herdam as limitações de register_globals. Portanto, índices numéricos ou strings contendo caracteres especiais (| e !) não podem ser usados. Se usados, resultará em erros na finalização do script. php_serialize não possui tais limitações. **php_serialize** está disponível a partir do PHP 5.5.4.

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

### session.save_handler string
session.save_handler define o nome do manipulador que será utilizado para armazenar e recuperar dados associados à sessão. Padrão para files. Note que extensões podem registrar seus próprios save_handlers; manipuladores registrados podem ser obtidos ao se vefificar o phpinfo(). Veja também session_set_save_handler().

### session.save_path string
session.save_path define o argumento que é passado para o manipulador de gravação. Se você escolher o manipulador padrão (de arquivos), este é o caminho onde os arquivos serão criados. Veja também session_save_path().
Há um argumento opcional N para esta diretiva que determina o número de níveis de diretório que seus arquivos de sessão serão espalhados. Por exemplo, definindo para '5;/tmp' pode levar a criação de um arquivo de sessão e diretórios como /tmp/4/b/1/e/3/sess_4b1e384ad74619bd212e236e52a5a174If . Para fazer uso do N você deve criar todos estes diretórios antes do uso. Um pequeno script shell existe em ext/session para fazer isto, chamado mod_files.sh, com uma versão para o Windows chamada mod_files.bat. Também note que se N é usado e maior do que 0 então a limpeza de sessões não será executada, veja uma cópia do php.ini para mais informações. Também, se você usar N, certifique-se de cercar session.save_path com "aspas" porque o separador (;) é usado também para comentátios no php.ini.

O módulo de armazenamento em arquivo cria arquivos com permissões 600 por padrão. Esse padrão pode ser alterado com o argumento opcional MODE: N;MODE;/path onde MODE é o valor octal representando as permissões. Configurar MODE não afeta o umask do processo.

> ***ATENÇAO:*** Se você deixar isto definido num diretório de leitura público, como /tmp (o padrão), outros usuários no servidor poderão raptar sessõoes pegando a lista de arquivos nesse diretório.

> **Cuidado:** Ao utilizar o argumento opcional de nível de diretório N, como descrito acima, note que utilizar um valor maior que 1 ou 2 é inapropriado na maioria dos sites por conta da geração de um grande número de diretórios exigidos: por exemplo, um valor de 3 implica que existirão 64^3 diretórios em disco, o que pode resultar numa quantidade enorme de espaço e inodes desperdiçados. Somente use N maiores que 2 se você estiver absolutamente certo que o seu site é grande o suficiente para exigí-lo.

### session.name string
session.name especifica o nome da sessão que é usada como o nome do cookie. Deve conter apenas caracteres alfanuméricos. O padrão é PHPSESSID. Veja também session_name().

### session.auto_start boolean
session.auto_start especifica se o módulo da sessão deve iniciar uma sessão automaticamente no início da requisição. Padrão 0 (desabilitado).

### session.serialize_handler string
session.serialize_handler define o nome do manipulador utilizado para serializar/desserializar dados. São suportados o formato serial do PHP (php_serialize), o formato interno do PHP (php e php_binary) e WDDX (wddx). O WDDX somente está disponível se o PHP foi compilado com suporte WDDX. php_serialize está disponível desde o PHP 5.5.4. php_serialize utiliza as funções serialize/unserialize internamente e não tem as limitações que php e php_binary tem. Serializadores antigos não conseguem gravar índices numéricos ou índices string que contenham caracteres especiais (| e !) no array $\_SESSION. Utilize php_serialize para evitar erros de índices numéricos ou índices com caracteres especiais no final do script. O padrão é php.

### session.gc_probability integer
session.gc_probability em conjunto com session.gc_divisor é usado para gerenciar a probabilidade que o gc (coletor de lixo) seja iniciado. O padrão é 1. Veja session.gc_divisor para detalhes.

### session.gc_divisor integer
session.gc_divisor em conjunto com session.gc_probability define a probabilidade que o processo do gc (coletor de lixo) seja iniciado na inicialização de cada sessão. A probabilidade é cauculada usando gc_probability/gc_divisor, ex. 1/100 indica que existe 1% de chance que o processo GC inicie em cada requisição. O padrão para session.gc_divisor é 100.

### session.gc_maxlifetime integer
session.gc_maxlifetime especifica o número de segundos, que, depois de decorridos, os dados serão considerados como lixo ('garbage') e eventualmente apagados. Isso pode ocorrer no início da sessão (dependendo de session.gc_probability e session.gc_divisor).

> **Nota:** Se scripts diferentes tem valores diferentes para session.gc_maxlifetime mas compartilham o mesmo lugar para guardar os dados da sessão então o script com o menor valor estará limpando os dados. Neste caso, use esta diretiva em conjunto com session.save_path.

### session.referer_check string
session.referer_check contém a substring que você quer checar contra cada HTTP Referer. Se o Referer for enviado pelo cliente e a sustring não foi encontrada, a id de sessão embutida será marcada como inválida. O padrão é uma string vazia.

### session.entropy_file string
session.entropy_file informa o caminho para um recurso externo (arquivo) que será usado como uma fonte de entropia no processo de criação da id de sessão. Exemplos são /dev/random ou /dev/urandom que estão disponíveis em muitos sistemas UNIX. Esse recurso é suportado no Windows a partir do PHP 5.3.3. Configurando session.entropy_length para um valor diferente de zero fará o PHP utilizar o Windows Random API como fonte de entropia.

> **Nota:** Removido no PHP 7.1.0. A partir do PHP 5.4.0 session.entropy_file tem como padrão /dev/urandom ou /dev/arandom, se disponível. No PHP 5.3.0 essa diretiva está em branco por padrão.

### session.entropy_length integer
session.entropy_length especifica o número de bytes que serão lidos do arquivo especificado acima. Padrão em 0 (desabilitado). Removido no PHP 7.1.0.

### session.use_strict_mode boolean
session.use_strict_mode especifica se o módulo utilizará o modo id de sessão rigoroso (strict). Se esse modo estiver ativo, o módulo não aceitará um id de sessão não inicializado. Se um id de sessão não inicializado for enviado pelo browser, um novo id de sessão é devolvido para o browser. Aplicações são protegidas da fixação de sessão adotando o modo de sessão rigoroso (strict). Padrão é 0 (desativado).

> **Nota:** Ativar session.use_strict_mode é mandatório para segurança geral das sessões. A todos os sites é recomendado mantê-lo ativado. Veja o código em session_create_id() para mais detalhes.

### session.use_cookies boolean
session.use_cookies especifica se o módulo utilizará cookies para guardar a id da sessão no lado do cliente. O padrão é 1 (habilitado).

### session.use_only_cookies boolean
session.use_only_cookies especifica se o módulo usará somente cookies para guardar a id no lado do cliente. Habilitar esta configuração previne ataques envolvendo passagem de ids de sessão nas URLs. Esta configuração foi adicionada no PHP 4.3.0. Padrão 1 (ativado) a partir do PHP 5.3.0.

### session.cookie_lifetime integer
session.cookie_lifetime especifica o tempo de vida do cookie em segundos que é enviado para o browser. O valor 0 significa "até o browser ser fechado". O padrão é 0. Veja também session_get_cookie_params() e session_set_cookie_params().

> **Nota:** O timestamp de expiração é informado em relação à hora do servidor, que não necessariamente coincide com o horário do navegador do cliente.

### session.cookie_path string
session.cookie_path especifica o caminho para definir em session_cookie. O padrão é /. Veja também session_get_cookie_params() e session_set_cookie_params().

### session.cookie_domain string
session.cookie_domain especifica o domínio para definir no cookie de sessão. O padrão é nenhum significando o nome do servidor que gerou o cookie de arcordo com a especificação dos cookies. Veja também session_get_cookie_params() e session_set_cookie_params().

### session.cookie_secure boolean
session.cookie_secure especifica se os cookies devem ser enviados apenas em conexões seguras. O padrão é off. Esta configuração foi adicionada no PHP 4.0.4. Veja também session_get_cookie_params() e session_set_cookie_params().

### session.cookie_httponly boolean
Marca o cookie para ser acessível apenas atráves do protocolo HTTP. Isto significa que o cookie não será acessível por linguagens de script, como o JavaScript. Esta configuração pode efetivamente reduzir o roubo de identidade atráves de ataques XSS (apesar de não ser suportado por todos os browsers).

### session.cache_limiter string
session.cache_limiter especifica o método de controle de cache para usar em páginas de sessão. Pode ser um dos seguintes valores: nocache, private, private_no_expire ou public. Padrão nocache. Veja também a documentação de session_cache_limiter() para ver o que os valores significam.

### session.cache_expire integer
session.cache_expire especifica o time-to-live (tempo de vida) para páginas de sessão em cache, em minutos, não tendo efeito na limitação de nocache. O padrão é 180. Veja também session_cache_expire().

### session.use_trans_sid boolean
session.use_trans_sid se o suporte a sid transparente está habilitado ou não. O padrão é 0 (desabilitado).

> **Nota:** Gerenciamento de sessões baseadas em URLs tem riscos de segurança adicionais comparados ao gerenciamento baseado em cookies. Usuários podem enviar uma URL que contenha uma ID de sessão ativa para seus amigos por e-mail ou usuários podem salvar uma URL que contenha uma ID de sessão em seus bookmarks e acessar seu site sempre com a mesma ID de sessão, por exemplo. Desde o PHP 7.1.0 uma URL completa, por exemplo https://php.net/, é manipulada pelo recurso trans sid. Versões anteriores do PHP manipulavam apenas URLs relativas. Alvos de rewrite estão definidos em session.trans_sid_hosts.

### session.trans_sid_tags string
session.trans_sid_tags especifica quais tags HTML serão reescritas para incluir IDs de sessão quando o suporte ao SID transparente estiver ativo. Por padrão: a=href,area=href,frame=src,input=src,form= form é uma tag especial. <input hidden="session_id" name="session_name"> é adicionado a variável de formulário.

> **Nota:** Antes do PHP 7.1.0 url_rewriter.tags era utilizada para essa funcionalidade. Desde o PHP 7.1.0, fieldset não é mais considerada uma tag especial.

### session.trans_sid_hosts string
session.trans_sid_hosts especifica quais hosts serão reescritos para incluir IDs de sessão quando o suporte ao SID transparente estiver ativo. Padrão para $\_SERVER['HTTP_HOST'] Vários hosts podem ser especificados, separados por ",", mas sem espaços entre os hosts. Por exemplo: php.net,wiki.php.net,bugs.php.net


### session.hash_function mixed
session.hash_function permite especificar o algoritimo de hash usado para gerar os IDs de sessão. '0' indica MD5 (128 bits) e '1' indica SHA-1 (160 bits).
Desde o PHP 5.3.0 também é possível especificar qualquer um dos algoritmos disponibilizados pela extensão hash (se habilitada), como sha512 ou whirlpool. A lista completa de algoritmos suportados pode ser obtida com a função hash_algos().

> **Nota:** Esta configuração introduzido no PHP 5. Removido no PHP 7.1.0.

### session.hash_bits_per_character integer
session.hash_bits_per_character permite a você definir quantos bits são guardados em cada caractere ao converter os dados binários de hash para algo legível. Os valores possíveis são '4' (0-9, a-f), '5' (0-9, a-v) e '6' (0-9, a-z, A-Z, "-", ",").

> **Nota:** Esta configuração introduzido no PHP 5. Removido no PHP 7.1.0.

### session.upload_progress.enabled boolean
Permite o rastreamento do progresso de upload, populando a variável $\_SESSION. O padrão é 1, habilitado.

### session.upload_progress.cleanup boolean
Limpa a informação de progresso assim que todos os dados POST forem lidos (upload completado). Padrão 1, habilitado.

> **Nota:** É altamente recomendável manter esse recurso ligado.

### session.upload_progress.prefix string
Um prefixo utilizado na chave da variável $\_SESSION. Essa chave será concatenada com o valor de $\_POST[ini_get("session.upload_progress.name")] para prover um índice único. Padrão "upload_progress_".


### session.upload_progress.name string
O nome da chave utilizada em $\_SESSION para armazenar a informação de progresso. Veja também session.upload_progress.prefix. Se $\_POST[ini_get("session.upload_progress.name")] não for passado ou estiver indisponível, o progresso de upload não será registrado. Padrão "PHP_SESSION_UPLOAD_PROGRESS".

### session.upload_progress.freq mixed
Define a frequência com que a informação de progresso de upload será atualizada. Isso pode ser definido em bytes ("atualize a informação a cada 100 bytes") ou em percentagens ("atualize a informação de progresso a cada 1% do total do arquivo"). Padrão "1%".

### session.upload_progress.min-freq integer
O intervalo mínimo entre as atualizações, em segundos. Padrão "1" (um segundo).

### session.lazy_write boolean
session.lazy_write, quando configurado para 1, significa que os dados de sessão somente serão reescrito caso eles mudem. O padrão é 1, habilitado.
A configuração register_globals influencia em como as variáveis de sessão são guardadas e restauradas.
O progresso de upload não será registrado, a não ser que session.upload_progress.enabled esteja habilitado e a variável $\_POST[ini_get("session.upload_progress.name")] esteja definida. Veja Progresso de Upload em sessões para mais detalhes dessa funcionalidade.

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

Uma das características mais fortes do PHP é o jeito como ele trata formulários HTML. Qualquer elemento de formulário irá automaticamente ficar disponível para uso em scripts PHP.

As variáveis $\_POST[] e $\_GET[] são criadas automaticamente pelo PHP. Podemos utilizar a superglobal $\_REQUEST, se não se importar com qual a origem dos dados enviados. Ele conterá os dados mesclados de origens GET, POST e COOKIE.

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

A função setcookie() define um cookie para ser enviado juntamente com o resto dos cabeçalhos HTTP. Como outros cabeçalhos (headers), os cookies devem ser enviados antes de qualquer saída do seu script (isso é uma restrição do protocolo). O que quer dizer que você deve colocar chamadas a essa função antes de qualquer saída, incluindo as tags <html> e <head> e também espaços em branco.

Uma vez que os cookies foram setados, eles podem ser acessados no próximo carregamento da página através do array $\_COOKIE. Os valores dos cookies também podem existir no $\_REQUEST.

### Parâmetros

A » RFC 6265 fornece a referência normativa de como cada parâmetro de setcookie() é interpretado.

* **name**: O nome do cookie.

* **value**: O valor do cookie. Esse valor é guardado no computador do cliente; não guarde informação sensível. Supondo que o name seja 'nomedocookie', o valor pode ser lido través de $\_COOKIE['nomedocookie']

* **expire** :O tempo para o cookie expirar. Esse valor é uma timestamp Unix, portanto é o número de segundos desde a época (epoch). Em outras palavras, você provavelmente irá utilizar isso com a função time() mais o número de segundos que você quer que ele expire. Ou você pode utilizar a função mktime(). time()+60*60*24*30 irá configurar o cookie para expirar em 30 dias. Se configurado para 0, ou omitido, o cookie irá expirar ao fim da sessao (quando o navegador fechar).

* **domain**: O (sub)domínio para qual o cookie estará disponível. Definindo para um subdomínio (como 'www.example.com') deixará o cookie disponível para aquele subdomínio e todos os outros sub-domínios abaixo dele (exemplo w2.www.example.com). Para deixar o cookie disponível para todo o domínio (incluindo todos os subdomínios dele), simplesmente defina o valor para o nome do domínio ('example.com', nesse caso).

> **Nota**:Você pode ver que o parâmetro expire recebe uma timestamp Unix, ao contrário do formato de data Wdy, DD-Mon-YYYY HH:MM:SS GMT, isso se dá porque o PHP faz essa conversão internamente.

* **path**: O caminho no servidor aonde o cookie estará disponível. Se configurado para '/', o cookie estará dosponível para todo o domain. Se configurado para o diretório '/foo/', o cookie estará disponível apenas dentro do diretório /foo/ e todos os subdiretórios como /foo/bar do domain. O valor padrão é o diretório atual onde o cookie está sendo configurado.

> **Nota**: Browsers antigos ainda implementam a » RFC 2109 e podem requerer um . no início para funcionar com todos os subdomínios.

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
