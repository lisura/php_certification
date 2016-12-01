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
Um open mail relay é um servidor SMTP que permite que qualquer um envie emails sem cadastro ou identificação. Esse tipo de servidor é muito utilizado por spammers e worms.

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
