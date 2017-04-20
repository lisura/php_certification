# Revisão sobre Segurança

PHP, é uma linguagem poderosa o bastante para executar arquivos e scripts em segundo plano, no servidor e fora da aplicação. Assim, um mal planejamento de questões de segurança pode deixar o sistema com portas abertas para invasões e ataques maliciosos.

PHP é desenhado especificamente para ser uma linguagem mais segura para escrever programas CGI que Perl ou C mas tenha sempre em mente que:
* Não há como proteger totalmente o sistema, existem formas bastante criativas de se sofrer ataques, mas com as medidas explicadas aqui podemos nos proteger de ataques mais comuns e dificultar a vida do invasor.
* Nunca confie no usuário, pois o mesmo pode ser o atacante. Tome sempre muito cuidado com os dados que o usuário envia para o sistema.


## Configuração

Como configurar corretamente o *php.ini* visando proteger o sistema de eventuais invasões ou falhas de segurança.

### Arquivo ini

*allow\_url\_fopen* e *allow\_url\_include*

É importante que estas variáveis tenham valor "Off", caso contrário o servidor permite que arquivos que não estejam no mesmo servidor possam ser incluidos, abrindo brecha para a Inclusão de Arquivos Remotos (RFI).

*max\_execution\_time* e *max\_input\_time*

São necessárias para definir o tempo de execução de um script e o tempo de interpretação de dados de entrada vindos de GET ou POST.

### Memoria

*memory_limit*: Limite de memória em bytes que um script pode alocar (ex: 16M)

*upload_max_filesize*: Tamanho máximo permitido para upload de arquivos.

*post_max_size*: Tamanho máximo de dados a serem enviados por POST. Deve ser maior que *upload_max_filesize*.

*max_input_nesting_level*: Determina a profundidade máxima de $\_GET e $\_POST.

### Erros

Cuidado com o que será exibido em caso de erros.

*display_errors*: Determina se os erros de sistemas serão exibidos para o usuário ou não.

*log_errors*: Determina se as mensagens de erro serão gravadas em logs do servidor.

*error_reporting*: Quais serão os tipos de erros a serem exibidos.  Determinados por constantes binárias como E_ALL , E_DEPRECATED e E_STRICT.

| valores | descição |
| --- | --- |
| E_ALL        |   Todos os erros e alertas (Cuidado. Veja o E_STRICT) |  
| E_ERROR      |   Erros fatais em runtime |  
| E_WARNING    |   Erros não fatais em runtime |  
| E_PARSE      |   Erros de compilação (antes da execução do código) |  
| E_DEPRECATED |   Avisos de coisas obsoletas, que serão retiradas no futuro |  
| E_NOTICE     |   Avisos que podem ou não ser bugs |
| E_STRICT     |   Dá recomendações de melhor interoperabilidade, desde o PHP 5 |

>Nota 1 - O padrão no PHP 4 e 5 é **E_ALL & ~ E_NOTICE**, ou seja, erros de Notice não serão exibidos.

>Nota 2 - No PHP5.3 ou maior o padrão é E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED.

>Nota 3 - Em produção o recomendado é sempre manter *error_reporting*: E_ALL & ~E_DEPRECTED & ~E_STRICT

## Segurança de Sessão

Embora o PHP trabalhe no servidor, cookies são gerados para a sessão em aberto e salvos no lado do usuário.

### Fixação de Sessão

Trata-se de alguém conseguir o ID da sessão de um cliente e usar o mesmo ID em outro navegador. Esse ID pode ser adquirido pelo cookie gerado pelo PHP ou pela URL através da variável PHPSESSID.

>bool session_start ([ array $options = [] ] )

Cria uma sessão ou retorna uma que esteja ativa  
No PHP 7 o parametro $options foi adicionado.
```PHP
<?php
// this is an associative array of options that will override the currently set session configuration directives.
session_start([
    'cookie_lifetime' => 86400,
    'read_and_close'  => true,
]);
```

>bool session_regenerate_id ([ bool $delete_old_session = false ] )

Atualiza o id da sessão atual com um novo id gerado.  
Desde a versão 7, o **session_regenerate_id()** salva a sessão anterior antes de fechar.

>int session_cache_expire ([ string $new_cache_expire ] )

Retorna o prazo do cache atual.

**Por padrão, uma sessão durará enquanto o navegador do usuário não for fechado.**

No php.ini, é possível definir qual o tempo máximo de vida de uma sessão através do parâmetro session.cache_expire.

Algumas configurações no php.ini para controle de sessões

*session.use_trans_sid*

Impede que o usuário gerencie sessões por URL. Vem desabilitado por padrão, e habilitar a mesma deve ser feita com muita cautela, pois a URL irá retornar o ID da sessão (PHPSESSID), o qual pode ser aproveitado por outros usuários.

*Verificação de sessão por IP*

Através da variável $\_SERVER e suas chaves REMOTE\_ADDR e SERVER\_ADDR, podemos verificar o IP de onde um usuário está acessando o sistema, destruindo a sessão caso identifiquemos que o IP de acesso é diferente do IP anterior.

### Definindo os parâmetros do cookie de sessão

A função session_set_cookie_params define parâmetros dos cookies configurados no arquivo php.ini. O efeito desta função é apenas pela duração do script. Então, você precisa chamar session_set_cookie_params() para cada requisição e antes que session_start() seja chamada.

As configuraçãoes podem por exemplo impedia que um usuario mal intencionado leia os cookies usando JS caso a tag httponly esteja marcada como true.

> session.cookie_httponly boolean

Marca o cookie para ser acessível apenas atráves do protocolo HTTP. Isto significa que o cookie não será acessível por linguagens de script, como o JavaScript. Esta configuração pode efetivamente reduzir o roubo de identidade atráves de ataques XSS (apesar de não ser suportado por todos os browsers).

**Relembrando da aula 1**

| Nome | Padrão | Modificável | Changelog |
|---|---|---|---|
|session.entropy_file	|""|	PHP_INI_ALL|	Removido no PHP 7.1.0.|
|session.entropy_length|	"0"|	PHP_INI_ALL|	Removido no PHP 7.1.0.|
|session.sid_bits_per_character|	"32"|	PHP_INI_ALL|	Disponível desde o PHP 7.1.0.|
|session.hash_bits_per_character|	"5"	|PHP_INI_ALL|	Removido no PHP 7.1.0.|
|session.lazy_write|	"1"|	PHP_INI_ALL	Disponível |desde PHP 7.0.0.|


## Cross-Site Scripting

Cross-Site Scripting, ou XSS, ocorre quando um código de Javascript, ou de qualquer linguagem executável no lado do cliente, é injetado no sistema, fazendo com que o código retorne dados que podem ser usados em ataques ao sistema.

Esse tipo de ataque ocorre quando o sistema aceita o envio de dados sem validar de fato o conteúdo do mesmo.

Para evitar esse tipo de ataque, podemos usar a função htmlentities, que faz com que o navegador não interprete o valor como HTML.

Exemplo:

```php
<?php
$usuario = htmlentities(filter_input(INPUT_POST, 'cpf'));
$senha = htmlentities(filter_input(INPUT_POST, 'senha'));
$codigoAcesso = htmlentities(filter_input(INPUT_POST, 'cod_acesso'));
```

>Nota sobre o metodo htmlentities:  
>>string htmlentities ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )    
>
No PHP5.6.0	- The default value for the encoding parameter was changed to be the value of the default_charset configuration option.

## Cross-Site Request Forgeries

Cross-site request forger, também conhecido como *ne-click attack* or *session riding* é um tipo de exploração maliciosa de um site onde comandos não autorizados são transmitidos de um usuário que o site confia. OCSRF explora a confiança que um site possui no navegador de um usuário.

Existem limitações no uso desse tipo de ataque:
* O usuário vítima precisa estar logado ou ter cookie/sessão ativos no momento do ataque
* O site alvo do ataque não verifica o header HTTP Referer (origem da requisição), o que é bem comum
* O atacante precisa saber os valores exatos do formulário que deseja usar no ataque

Algumas dicas para prevenção de CSRF:
* Prefira o uso de POST, não deixe o sistema aceitar qualquer protocolo
* O uso de tokens ou captchas ajuda bastante
* Limite o tempo de vida de sessão e dos cookies
* Verifique o header HTTP Referer para identificar de onde vem a requisição
* Lembre-se que o usuário pode ser o proprio atacante

## SQL Injection

Injeção direta de comandos SQL é uma técnica onde um atacante cria ou altera comandos SQL existentes para expor dados escondidos, ou sobrescrever dados valiosos, ou ainda executar comandos de sistema perigosos no servidor. Isso é possível se a aplicação pegar a entrada do usuário e combinar com parâmetros estáticos para montar uma consulta SQL.

Por exemplo, devido à falta de validação de entrada e conectando ao banco de dados usando o super-usuário ou um usuário que pode criar usuário, o atacante pode criar um super-usuário no seu banco de dados.

```PHP
<?php
$offset = $argv[0]; // Cuidado, sem validação de entrada!
$query  = "SELECT id, name FROM products ORDER BY name LIMIT 20 OFFSET $offset;";
$result = pg_query($conn, $query);
```
Usuários normais clicam nos links 'próxima' e 'anterior' onde $offset é codificado na URL. O script espera que o valor de $offset seja um número decimal. No entanto, e se alguém tentar invadir acrescentando a forma codificada por urlencode() da URL seguinte:

```SQL
0;
insert into pg_shadow(usename,usesysid,usesuper,usecatupd,passwd)
    select 'crack', usesysid, 't','t','crack'
    from pg_shadow where usename='postgres';
--
```
Se isso acontecesse, então o script daria de presente acesso de super-usuário ao atacante. Perceba que 0; é para fornecer uma deslocamento válido para a consulta original e terminá-la.

### Técnicas para Evitar Ataques

Esses ataques se baseam principalmente em explorar falhas no código desenvolvido sem se preocupar com segurança. Nunca confie em nenhum tipo de entrada, especialmente aquela que vem do lado do cliente, mesmo que venha de um combobox, um campo de entrada escondido (hidden) ou um cookie. O primeiro exemplo mostra como uma consulta inocente pode causar desastres.

* Nunca conecte ao banco de dados como um super-usuário ou como o dono do banco de dados. Use sempre usuários personalidados com privilégios bem limitados.

* Verifique se uma entrada qualquer tem o tipo de dados esperados. O PHP tem um grande número de funções de validação de entrada, desde as mais simples encontrada em Funções de Variáveis e em Funções de Tipo de Caracteres (ex.: *is_numeric()*, *ctype_digit()* respectivamente) além de usar o suporte a Expressões Regulares Compatível com Perl.

>NOTA: *is_numeric()*
> > No PHP 7.0.0	 Strings in hexadecimal (e.g. 0xf4c3b00c) notation are no longer regarded as numeric strings, i.e. is_numeric() returns FALSE now.


* Se a aplicação espera por entradas numéricas, considere verificar os dados com a função *is_numeric()*, ou silenciosamente mudar o seu tipo usando *settype()*, ou usar a representação númerica usando a função *sprintf()*.

* Coloque as informações de conexão e permissões em um arquivo .php dentro da pasta *web* de sua aplicação.

## Remote Code Injection

Code Injection refere-se a qualquer meio que permite a um atacante injetar código-fonte em um aplicativo da web de modo que ele seja interpretado e executado. Isto não se aplica ao código injetado num cliente da aplicação, exemplo Javascript.

O código-fonte pode ser injetado diretamente de uma entrada não confiável ou, o aplicativo Web pode ser manipulado para carregá-lo a partir do sistema de arquivos local ou de uma fonte externa, por exemplo uma URL. Quando ocorre uma Injeção de Código como resultado de incluir um recurso externo (include), é comumente referido como Inclusão de Arquivo Remoto embora um ataque RFI em si precise sempre ser destinado a injetar código.

As principais causas de Injeção de Código são as falhas de Validação de Entrada:
- inclusão de entrada não confiável em qualquer contexto em que a entrada pode ser avaliada como código PHP;
- falhas na segurança dos repositórios de código fonte;
- falhas no cuidado com o download de bibliotecas de terceiros;
- configurações erradas do servidor.

É importante ressaltar a importância em não confiar no usuário e muito menos nos dados que serão enviados para o sistema, sendo essencial filtrar e validar todo dado de entrada e saída.

## E-mail Injection

E-mail injection é um tipo de ataque de injeção que atinge o PHP usando a função mail. Ele permite que o invasor mal-intencionado possa injetar em qualquer um dos campos de formulário um cabeçalho de e-mail. A principal razão deste ataque é o uso inapropriado de validações no inputs de formulários.

Em um formulário sem validação adequada, um invasor pode acrescentar ao header do email outras informações. Exemplo:
````php
<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
To: backtothe@future.com
From: <input type="text" name="sender">
Subject : <input type="text" name="subject">
Message :
<textarea name="message" rows="10" cols="60" lines="20"></textarea>
<input type="submit" name="send" value="Send">
</form>

<?php
$to="backtothe@future.com";
$from = $_POST['sender'];
mail($to, $_POST['subject'], $_POST['message'], "From: $from\n");
````

O atacante pode adicionar outros campos ao cabeçalho como CC e BCC:
> "Marty_McFly@back.to%0ACc:Dr_Emmett_Brown@back.to%0ABcc:Lorraine_Baines@back.to,George_McFly@back.to"  

Neste exemplo o e-mail é enviado para todos os e-mail listados. O valor hexadecimal “0x0A” (\n) é usado para separar cada campo.

### Open mail relay

Um open mail relay é um servidor SMTP que permite que qualquer um envie e-mails sem cadastro ou identificação. Esse tipo de servidor é muito utilizado por spammers e worms.

## Input Filtering

Uma forma de aumentar a segurança é sanitizar os dados recebidos de um formuário.  
É recomendado desligar as diretivas register_globals, magic_quotes, ou outras configurações convenientes que pode causar confusão em relação a validação, origem, ou valor de uma variável qualquer.

### Filtro dos dados de entrada
Filter, é uma extensão que serve para validar e filtrar dados vindos de alguma fonte insegura, como uma entrada do usuário.

| função | descrição |
| --- | --- |
| filter_var() | Filtra a variável com um especificado filtro |
| filter_var_array() | Obtêm múltiplas variáveis e opcionalmente as filtra |
| filter_input() | Obtêm a específica variável externa pelo nome e opcionalmente a filtra |
| filter_input_array() | Obtêm variáveis externas e opcionalmente as filtra |

### Attack Vector - Encoding Bypassing
*Attack vector* é um termo para "método ou tipo de ataque".  
Muitos Attack vectors usam de *encoding bypassing*. Esta técnica de ataque consistem de encodar os parâmetros da requisição do usuário, duas vezes em formato hexadecimal e com isso passar por cima dos controles de segurança ou causar um comportamento indesejado da aplicação. Utilizar UTF-8 como charset padrão tanto para a aplicação quanto para a base de dados é uma forma de impedir que isto ocorra.

## Escape Output
É importante tratar todos os dados de OUTPUT no PHP. O que estiver fora das tags PHP é ignorado pelo interpretador, o que permite arquivos PHP de conteúdo misto.

### Funções para Escape Output

| funcoes | descricao |
| --- | --- |
|**htmlentities()** | Converte todos os caracteres aplicáveis em entidades html |
|html_entity_decode() | Converte todas as entidades HTML para os seus caracteres |
|get_html_translation_table() | Retorna a tabela de tradução usada por htmlspecialchars e htmlentities |
|**htmlspecialchars()** | Converte caracteres especiais para a realidade HTML |
|nl2br() | Insere quebras de linha HTML antes de todas newlines em uma string |
|urlencode() | Codifica uma URL |
|**strip_tags()** | Retira as tags HTML e PHP de uma string |

## Password Hashing API
Password Hashing fornece uma maneira simples de criação e manutenção de passwords de forma segura.
Extensão esta disponível oficialmente desde o PHP 5.5.0  

### Função crypt

**crypt()** providencia encriptação unidirecional de string (hashing). Retorna uma string criptografada usando o algoritmo de encriptação Unix Standard DES-based ou algoritmos alternativos disponíveis no sistema.

>Nota: When the failure string "\*0" is given as the salt, "\*1" will now be returned for consistency with other crypt implementations.
>Nota: 5.6.0	 Raise E_NOTICE security warning if salt is omitted.

Em sistemas onde a função crypt() suporta variados tipos de codificação, as seguintes funções são definidas para 0 ou 1 a depender se um dado tipo está disponível:  
* CRYPT_STD_DES - Codificação Standard DES-based com um salt de 2 caracteres
* CRYPT_EXT_DES - Codificação Extended DES-based com um salt de 9 caracteres
* CRYPT_MD5 - Codificação MD5 com um salt de 12 caracteres começando com $1$
* CRYPT_BLOWFISH - Codificação Blowfish com um salt de 16 caracteres começando com $2$
* CRYPT_SHA256 - Codificação SHA-256 com salt de 16 caracteres prefixado com $5$
* CRYPT_SHA512 - Codificação SHA-512 com salt de 16 caracteres prefixado com $6$

````php
<?php
$password = crypt('MartinSeamusMcFly'); // salt automatically generated
$user_input = 'MartinSeamusMcFly';
if (crypt($user_input, $password) == $password) {
   echo "Password verified!". PHP_EOL;
}
````

### Outras Funções

| funções | descrição |
| --- | --- |
| password_get_info | Retona as informações de um dado Hash |
| password_hash | Cria um Hash de um dados password |
| password_needs_rehash | Verifica se um hash combina com as opções dadas |
| password_verify | Verifica se o password combina com o hash |

## File Uploads

Grande vulnerabilidade é a possibilidade de um usuário mal-intencionado explorar o upload de arquivos disponível em um sistema. Um formulário que não possúi validação pode permitir que um usuário realize um upload de um arquivo que possa ser executado (como um .php), comprometendo o servidor.

Funções de validação de entrada de arquivos que podem ser utilizadas para aumentar a segurança do upload:

* **is_uploaded_file** — Diz se o arquivo foi enviado por POST HTTP. Útil para verificar se o arquivo foi realmente enviado por upload, e que o usuário não está tentando executar um arquivo que já esteja no servidor.
* **move_uploaded_file** — Move um arquivo enviado para uma nova localização.  Essa função não só verifica se o arquivo foi enviado via upload, mas o move para um novo local.

## Data Storage
Além de SQL Injection, a conexão com uma base de dados está sujeita a outros tipos de ataque. Algumas formas de evitar esses ataques:  
* Atribuir a cada usuário os privilégios que são necessários, não deixando que o mesmo tenha acesso ou permissões em locais onde ele não teria acesso. Aplicações nunca devem conectar ao banco de dados como seu dono ou um superusuário.
* Limitar o acesso ao servidor de BD apenas aos servidores que precisam de acesso.
* Isolar bancos de dados com informações confidenciais para diferente segmentos de rede - Cada local da rede só acessa os bancos de dados que eles precisam, limitando o acesso a informação.
* Exigir a alteração de senha de forma periódica.
* Verificar os logs
* Não implementar toda a lógica de negócio na aplicação web. Ao invés disso, implemente uma parte no esquema do banco, usando view, triggers ou rules.

## SSL
Secure Socket Layer (SSL) é um padrão global em tecnologia de segurança desenvolvida pela Netscape em 1994. Ele cria um canal criptografado entre um servidor web e um navegador (browser) para garantir que todos os dados transmitidos sejam sigilosos e seguros.

### OpenSSL
OpenSSL é um módulo que usa as funções da **OpenSSL** para geração e verificação de assinaturas e para criptografar e descriptografar dados. A **OpenSSL** é um projeto de código aberto que fornece um conjunto de ferramentas robusto, comercial e completo para os protocolos TLS (Transport Layer Security) e Secure Sockets Layer (SSL).

### SSH
Secure Shell (SSH) é um protocolo de rede criptográfico para operação de serviços de rede.

O SSH fornece um canal seguro sobre uma rede insegura em uma arquitetura cliente-servidor, conectando uma aplicação cliente SSH com um servidor SSH.  

### Secure Shell2
SSH2 é uma extensão PHP para lidar com o protocolo SSH.

### Armazenamento seguro
SSL/SSH protege dados transitando de um cliente para o servidor, mas não protege os dados guardados em um banco de dados. Uma vez que o atacante ganha acesso direto ao seu banco de dados(desviando do servidor web), os dados armazenados podem ser expostos ou sofre uso nocivo, a não ser que a informação seja protegida pelo banco em si.

A maneira mais fácil de contornar esse problema é primeiro criar seu próprio pacote de criptografia, e então usá-lo no seus scripts PHP. O script criptografa os dados antes de inseri-los no banco de dados e descriptografa quando os recupera.
