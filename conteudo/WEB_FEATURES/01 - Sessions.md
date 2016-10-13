#  Introdução

O suporte a sessões no PHP consiste em uma maneira de preservar certos dados atráves dos acessos subsequentes.

Um visitante acessando o seu web site ganha um identificador único, o assim chamado id de sessão. Ele é salvo em um cookie do lado do usuário ou propagado via URL.

O suporte à sessão permite armazenar dados entre as requisições no array super global $\_SESSION. Quando um visitante acessar seu site, o PHP vai conferir automaticamente (se session.auto_start estiver definido como 1) ou quando você pedir (explicitamente atráves de session_start()) se um id de sessão específico foi enviado com a requisição. Se este for o caso, o ambiente anteriormente salvo é recriado.

$\_SESSION (e todas as variávels registradas) são serializadas internamente pelo PHP usando o manipulador de serialização especificado pela configuração INI session.serialize_handler depois que a requisição terminar. Variáveis registradas que estejam indefinidas são marcadas como não definidas. Nos acessos subsequentes, elas não são definidas pelo módulo da sessão, a menos que o usuário as definam posteriormente.

> **Aviso**:
Porque as variáveis de sessão são serializadas, variáveis resource não podem ser armazenadas em sessão. Manipuladores de serialização (**php e php_binary**) herdam as limitações de register_globals. Portanto, índices numéricos ou strings contendo caracteres especiais (| e !) não podem ser usados. Se usados, resultará em erros na finalização do script. php_serialize não possui tais limitações. **php_serialize** está disponível a partir do PHP 5.5.4.

---

## Registro e Desregistro de Sessão

Note que ao trabalhar com sessões, um registro na sessão não é criado até que a variável seja registrada usando  uma nova chave ao array super global $\_SESSION. Isto continua valendo mesmo se uma sessão foi iniciada usando a função session_start().

**Registro:**
```php
<?php
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
?>
```

**Desregistro:**
```php
<?php
session_start();
unset($_SESSION['count']);
?>
```

---

## Configurações

Para mais detalhes e definições dos modos PHP_INI_*, veja Onde uma configuração deve ser definida.
O sistema de gerenciamento de sessões suporta várias opções de configurações que podem ser colocados no arquivo php.ini. A seguir um breve resumo.

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

---

## Manipuladores de Sessão Personalizados

Para implementar as sessões em banco de dados, ou qualquer outro método de armazenamento, é preciso usar session_set_save_handler() para criar um conjunto de funções de armazenamento a nível de usuário. A partir do PHP 5.4.0 podem ser criados manipuladores de sessões usando SessionHandlerInterface ou estender os manipuladores internos do PHP herdando de SessionHandler.

Os callbacks especificados em session_set_save_handler() são métodos executados pelo PHP durante o ciclo de vida de uma sessão: open, read, write e close e para as tarefas de manutenção: destroy para deletar uma sessão e gc para recolha periódica de lixo.

Portanto, o PHP sempre requer manipuladores de gravação de sessão. O padrão normalmente é o manipulador de gravação interno de '**arquivos**'. Um manipulador personalizado pode ser configurado usando session_set_save_handler(). Manipuladores internos alternativos também são disponibilizados por extensões do PHP, como sqlite, memcache e memcached e podem ser definidos com session.save_handler.

Quando a sessão inicia, o PHP internamente executa o manipulador open seguido pelo callback read que deve retornar uma string codificada exatamente como foi originalmente passado para armazenamento. Após o read retornar a string codificada, o PHP vai decodificá-la e colocar o array resultante na super global $\_SESSION.

Quando o PHP é encerrado (ou quando session_write_close() for chamada), o PHP internamente vai codificar a super global $\_SESSION e passá-la junto com o ID de sessão para o callback write. Depois que o callback write finalizar, o PHP internamente invocará o callback close.

Quando uma sessão é destruída, o PHP chamará o manipulador destroy com o ID de sessão.

O PHP executará o callback gc de tempo em tempo para apagar quaisquer informações na sessão de acordo com o tempo de vida máximo (lifetime) definido para a sessão. Esta rotina deve apagar todas as informações do armazenamento persistente em que a diferença de tempo do último acesso até o momento atual seja maior que $lifetime.

## SessionHandler

SessionHandler é uma classe especial que pode ser usada para expor o manipulador interno atual do PHP de gravação de sessão por herança. Existem sete métodos que envolvem (wrap) as sete funções internas de callbacks do manipulador de gravação de sessão (open, close, read, write, destroy, gc e create_sid). Por padrão, esta classe vai envolver qualquer manipulador de gravação interno definido pela diretiva de configuração session.save_handler, que normalmente é files por padrão. Outros manipuladores internos de gravação de sessão podem ser fornecidos por extensões do PHP, como por exemplo SQLite (como sqlite), Memcache (como memcache), e Memcached (como memcached).

Quando uma instância de SessionHandler é definida como manipulador de gravação usando session_set_save_handler(), ela envolverá o manipulador de gravação atual. Uma classe que estende SessionHandler permite sobrescrever os métodos, interceptá-los ou filtrá-los chamando os métodos da classe pai que envolvem os manipuladores de sessão internos do PHP.

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
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session1.php)

## Progresso de Upload em Sessão

Quando a configuração INI session.upload_progress.enabled estiver habilitada, o PHP será capaz de rastrear o progresso do upload de arquivos individuais que estiverem sendo feito upload. Esta informação não é muito útil para a requisição atual, mas durante o upload do arquivo uma aplicação pode enviar uma requisição POST para um endpoint separado (via XHR por exemplo) para checar o status.

O progresso do upload estará disponível na variável super global $a_SESSION quando um upload estiver em progresso e quando a requisição POST tiver uma variável com o mesmo nome que a configuração INI session.upload_progress.name estiver configurada. Quando o PHP detectar requisições como essa, ele preencherá um array em $a_SESSION, onde o índice é um valor resultante da concatenação de session.upload_progress.prefix e session.upload_progress.name (configurações INI). O índice normalmente é obtido lendo essas configurações INI, ou seja

```php
<?php
$key = ini_get("session.upload_progress.prefix") . $_POST[ini_get("session.upload_progress.name")];
var_dump($_SESSION[$key]);
?>
```

Também é possível cancelar o upload do arquivo em andamento ao definir o índice **$\_SESSION[$key]["cancel_upload"]** para TRUE. Quando houver upload de múltiplos arquivos em uma mesma requisição, isso vai cancelar apenas o upload dos arquivos que ainda estiverem em andamento e pendentes, mas não removerá uploads já concluídos com sucesso. Quando um upload é cancelado dessa forma, o índice error no array $\_FILES será alterado para UPLOAD_ERR_EXTENSION.

As configurações INI session.upload_progress.freq e session.upload_progress.min_freq controlam a frequência com que a informação do progresso do upload deve ser recalculado. Com um valor razoável para estas duas configurações, a sobrecarga desse recurso é quase inexistente.

> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session2_1.php)
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session2_2.php)


## Funções para Sessão

* **session_start** — Inicia uma nova sessão ou resume uma sessão existente
* **session_destroy** — Destrói todos os dados registrados em uma sessão


* **session_cache_expire** — Retorna o prazo do cache atual
* **session_cache_limiter** — Obtém e/ou define o limitador do cache atual
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session3.php)


* **session_encode** — Codifica os dados atuais da sessão como uma sessão codificada em formato string
* **session_decode** — Decodifica dados de sessão de uma sessão codificada em formato string
* **session_unset** — Libera todas as variáveis de sessão
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session4.php)



* **session_gc** — Perform session data garbage collection

```php
<?php
// Note: This script should be executed by the same user of web server process.
session_start();

// Executes GC immediately
session_gc();

session_destroy();
?>
```

* **session_set_cookie_params** — Define os parâmetros do cookie de sessão
* **session_get_cookie_params** — Obtém os parâmetros do cookie da sessão
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session5.php)

* **session_id** — Obtém e/ou define o id de sessão atual
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session6.php)

* **session_name** — Obtém e/ou define o nome da sessão atual
* **session_module_name** — Obtém e/ou define o módulo da sessão atual
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session7.php)


* **session_regenerate_id** — Atualiza o id da sessão atual com um novo id gerado
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session8.php)


* **session_status** — Retorna o status atual da sessão
* **session_commit** — Sinônimo de session_write_close
* **session_write_close** — Guarda os dados de sessão e fecha a sessão
* **session_register_shutdown** — Função de finalização da sessão
> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session8.php)


* **session_save_path** — Obtém e/ou define o caminho para armazenamento da sessão atual
* **session_set_save_handler** — Define funções de armazenamento de sessão
> Usamos no Exemplo: [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Sessions/session1.php)
