# Cookies

O PHP suporta transparentemente cookies HTTP. Cookies é um mecanismo para guardar dados no navegador remoto e permite o ratreamento ou identificação do retorno de usuários. Você pode criar cookies usando a função **setcookie()** ou **setrawcookie()**. Os cookies são uma parte do cabeçalho HTTP, logo **setcookie()** precisa ser chamada antes que qualquer outro dado seja enviado ao navegador. Esta é a mesma limitação que a função **header()** tem. Você pode usar as funções de output buferizado para atrasar as impressões do script até que você tenha decidido, ou não, configurar qualquer cookie ou enviar quaisquer cabeçalhos.

Qualquer cookie enviado por você para o cliente automaticamente será incluido na array auto-global **$\_COOKIE** se variables_order contém "C". Se você deseja definir vários valores em um único cookie, simplesmente acrescente [] ao nome do cookie.

Dependendo da register_globals, variáveis regulares do PHP podem ser criadas para cookies. Contudo, não é recomendado confiar neste recurso, que pode ser frequentemente desabilitado por motivos de segurança.

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
path.
O caminho no servidor aonde o cookie estará disponível. Se configurado para '/', o cookie estará dosponível para todo o domain. Se configurado para o diretório '/foo/', o cookie estará disponível apenas dentro do diretório /foo/ e todos os subdiretórios como /foo/bar do domain. O valor padrão é o diretório atual onde o cookie está sendo configurado.

> **Nota**: Browsers antigos ainda implementam a » RFC 2109 e podem requerer um . no início para funcionar com todos os subdomínios.

* **secure**: Indica que o cookie só podera ser transimitido sob uma conexão segura HTTPS do cliente. Quando configurado para TRUE, o cookie será enviado somente se uma conexão segura existir. No lado do servidor, fica por conta do programador enviar esse tipo de cookie somente sob uma conexão segura (ex respeitando $\_SERVER["HTTPS"]).

* **httponly**: Quando for TRUE o cookie será acessível somente sob o protocolo HTTP. Isso significa que o cookie não será acessível por linguagens de script, como JavaScript. É dito que essa configuração pode ajudar a reduzir ou identificar roubos de identidade através de ataques do tipo XSS (entretanto ela não é suportada por todos os browsers), mas essa informação é constantemente discutida. Foi adicionada no PHP 5.2.0. TRUE ou FALSE

### Retorno (boolean)

Se existe saída antes da chamada dessa função, setcookie() irá falhar e retornará FALSE. Se a função setcookie() for executada com sucesso, ela retornará TRUE. Isso não indica que o usuário aceitou o cookie.

#### Exemplos:

**Definir**
```php
<?php
$value = 'alguma coisa de algum lugar';

setcookie("CookieTeste", $value);
setcookie("CookieTeste", $value, time()+3600);  /* expira em 1 hora */
//setcookie("CookieTeste", $value, time()+3600, "/~rasmus/", ".example.com", 1);
?>
```

**Exibir e Usar**
```php
<?php
// Mostra um cookie individual
echo $_COOKIE["CookieTeste"];

// Outra maneira de depurar(debug)/testar é vendo todos os cookies
print_r($_COOKIE);
?>
```

**Deletar**

Quando estiver deletando um cookie, tenha certeza de que a data de expiração dele está no passado, para acionar o mecanismo de remoção do seu navegador. O exemplo a seguir mostra como deletar os cookies enviados no exemplo anterior:

```php
<?php
setcookie("CookieTeste", "", time() - 3600);
?>
```
