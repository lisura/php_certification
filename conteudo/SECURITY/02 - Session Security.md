# Segurança de Sessão

Embora o PHP trabalhe no servidor, cookies são gerados para a sessão em aberto e salvos no lado do usuário, o que pode ser uma porta aberta para invasões.

## Fixação de Sessão

Trata-se de alguém conseguir o ID da sessão de um cliente e usar o mesmo ID em outro navegador. Caso um atacante consiga esse ID, poderia ter acesso aos dados de um usuário e obter total controle e acesso aos dados do mesmo. Esse ID pode ser adquirido pelo cookie gerado pelo PHP ou pela URL através da variável PHPSESSID (http://<url>?PHPSESSID=abcd1234).

Seguem algumas funções para impedir esse tipo de ataque.

*session_regenerate_id*

Esta função, ao ser chamada após session_start(), gera um novo ID de sessão, renovando a cada acesso.

*session.cache_expire e session_cache_expire*

No php.ini, é possível definir qual o tempo máximo de vida de uma sessão através do parâmetro session.cache_expire. A função session_cache_expire() pode ser usada para obter o valor definido no php.ini, ou também para definir no script o tempo de vida da sessão. Essa função deve ser acionada antes de session_start, pois essa ao ser executada irá definir o valor padrão definido no php.ini.

Aqui cabe pensar se vale a pena manter uma sessão longa. Isso daria uma nova usabilidade ao sistema, evitando frustrações maiores com logins expirados. No entanto, sessões longas estão mais expostas a serem aproveitadas por invasores.

```php
//Tempo atual da sessão vinda do arquivo php.ini
$tempoSessaoAtual = session_cache_expire ();
print "Tempo de sessão Atual: $tempoSessaoAtual";

//Modificação do tempo de sessão
session_cache_expire(10);
$tempoSessaoModificado = session_cache_expire();
print "Tempo de Sessão modificada: $tempoSessaoModificado";

//session_cache_expire deve ser chamado antes de session_start
session_start();
$_SESSION['sessaoNormal'] = 'Teste';
print_r($_SESSION, 1);
```

*session.use_trans_sid*

Impede que o usuário gerencie sessões por URL. Vem desabilitado por padrão.

*Verificação de sessão por IP*

Através da variável $_SERVER e suas chaves REMOTE_ADDR e SERVER_ADDR, podemos verificar o IP de onde um usuário está acessando o sistema, destruindo a sessão caso identifiquemos que o IP de acesso é diferente do IP anterior, evitando que o usuário tenha a mesma sessão iniciada em difentes m[aquinas sem o seu conhecimento. 