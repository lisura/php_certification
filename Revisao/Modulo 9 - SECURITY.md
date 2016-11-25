# Revisão sobre Segurança

PHP, é uma linguagem poderosa o bastante para executar arquivos e scripts em segundo plano, no servidor e fora da aplicação. Assim, um mal planejamento de questões de segurança pode deixar o sistema com portas abertas para invasões e ataques maliciosos.

Tenha sempre em mente que
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

>Nota 2 - Em produção o recomendado é sempre manter *error_reporting*:   E_ALL & ~E_DEPRECTED & ~E_STRICT

## Segurança de Sessão

Embora o PHP trabalhe no servidor, cookies são gerados para a sessão em aberto e salvos no lado do usuário.

### Fixação de Sessão

Trata-se de alguém conseguir o ID da sessão de um cliente e usar o mesmo ID em outro navegador. Esse ID pode ser adquirido pelo cookie gerado pelo PHP ou pela URL através da variável PHPSESSID.

>bool session_regenerate_id ([ bool $delete_old_session = false ] )

Atualiza o id da sessão atual com um novo id gerado.

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

As configuraçãoes pondem por exemplo impedira que um usuario mal intencionado leia os cookies usando JS caso a tag httponly esteja marcada como true.

> session.cookie_httponly boolean

Marca o cookie para ser acessível apenas atráves do protocolo HTTP. Isto significa que o cookie não será acessível por linguagens de script, como o JavaScript. Esta configuração pode efetivamente reduzir o roubo de identidade atráves de ataques XSS (apesar de não ser suportado por todos os browsers).

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

Esses ataques se baseam principalmente em explorar falhas no código escrito sem se preocupar com segurança. Nunca confie em nenhum tipo de entrada, especialmente aquela que vem do lado do cliente, mesmo que venha de um combobox, um campo de entrada escondido (hidden) ou um cookie. O primeiro exemplo mostra como uma consulta inocente pode causar desastres.

* Nunca conecte ao banco de dados como um super-usuário ou como o dono do banco de dados. Use sempre usuários personalidados com privilégios bem limitados.

* Verifique se uma entrada qualquer tem o tipo de dados experado. O PHP tem um grande número de funções de validação de entrada, desde as mais simples encontrada em Funções de Variáveis e em Funções de Tipo de Caracteres (ex.: *is_numeric()*, *ctype_digit()* respectivamente) além de usar o suporte a Expressões Regulares Compatível com Perl.

* Se a aplicação espera por entradas numéricas, considere verificar os dados com a função *is_numeric()*, ou silenciosamente mudar o seu tipo usando *settype()*, ou usar a representação númerica usando a função *sprintf()*.

* Coloque as informações de conexão e permissões em um arquivo .php dentro da pasta *web* de sua aplicação.

## Remote Code Injection

Code Injection refere-se a qualquer meio que permite a um atacante injetar código-fonte em um aplicativo da web de modo que ele seja interpretado e executado. Isto não se aplica ao código injectado num cliente da aplicação, exemplo Javascript.

O código-fonte pode ser injetado diretamente de uma entrada não confiável ou o aplicativo da Web pode ser manipulado para carregá-lo a partir do sistema de arquivos local ou de uma fonte externa, como um URL. Quando ocorre uma Injeção de Código como resultado de incluir um recurso externo, é comumente referido como Inclusão de Arquivo Remoto embora um ataque RFI em si precise sempre ser destinado a injetar código.

As principais causas de Injeção de Código são as falhas de Validação de Entrada, a inclusão de entrada não confiável em qualquer contexto em que a entrada pode ser avaliada como código PHP, falhas na segurança dos repositórios de código fonte, falhas no cuidado com o download de bibliotecas de terceiros e configurações erradas do servidor.

É importante ressaltar a importância em não confiar no usuário e muito menos nos dados que serão enviados para o sistema, sendo essencial filtrar e validar todo dado de entrada e saída.

___
That's all folks!
___
