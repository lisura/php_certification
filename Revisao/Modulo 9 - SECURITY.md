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

>O padrão no PHP 4 e 5 é **E_ALL & ~ E_NOTICE**, ou seja, erros de Notice não serão exibidos.

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

## SQL Injection

## Remote Code Injection
