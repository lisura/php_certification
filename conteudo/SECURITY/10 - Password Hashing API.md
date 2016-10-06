# Password Hashing API

Password Hashing fornece uma maneira simples ao redor da função _crypt()_ para tornar facil a criação e manutenção de passwords de forma segura.

Esta extensão esta disponivel oficialmente desde o PHP 5.5.0

Do ponto de vista de segurança, é recomendado que nunca se guarde o senhar em _CLEARTEXT_

Uma opção muito utilizada é criar um hash usando **md5()** que cria um hash de 32 caracteres ou **sha1()** que cria um hahs de 40 caracteres. Porem ambos são vulneraveis a ataques de força bruta, e por este motivo não são consideredos seguros.

## Função crypt

_Crypt_ — Encriptação unidirecional de string (hashing)

>string crypt ( string $str [, string $salt ] )

**crypt()** retornará uma string criptografada usando o algoritmo de encriptação Unix Standard DES-based ou ou algoritmos alternativos disponíveis no sistema.

Em sistemas onde a função crypt() suporta variados tipos de codificação, as seguintes funções são definidas para 0 ou 1 a depender se um dado tipo está disponível:

+ CRYPT_STD_DES - Codificação Standard DES-based com um salt de 2 caracteres
+ CRYPT_EXT_DES - Codificação Extended DES-based com um salt de 9 caracateres
+ CRYPT_MD5 - Codificação MD5 com um salt de 12 caracteres começando com $1$
+ CRYPT_BLOWFISH - Codificação Blowfish com um salt de 16 caracteres começando com $2$

```php
echo "<pre>";
$password = crypt('MartinSeamusMcFly'); // salt automatically generated
$user_input = 'MartinSeamusMcFly';
if (crypt($user_input, $password) == $password) {
   echo "Password verified!". PHP_EOL;
}
```

## Password Hashing

Serie de funções ao redor da função **crypt()** para ajudar a codificação de strings.


| funções | descrição |
| --- | --- |
| password_get_info | Retona as informações de um dado Hash |
| password_hash | Cria um Hash de um dados password |
| password_needs_rehash | Verifica se um hash combina com as opções dadas |
| password_verify | Verifica se o password combina com o hash |


**password_get_info** — Retona as informações de um dado Hash

>array password_get_info ( string $hash )

hash: Um hash criado por password_hash().

Retorna um array associativo com 3 chaves que são as informaçoes deste hash.

```php
echo "<pre>";
$hash = password_hash("MartinSeamusMcFly", PASSWORD_DEFAULT);
print_r(password_get_info($hash));
```

**password_hash** - Cria um Hash de um dado password

Cria um novo hash do password usando algoritimo de hashing de via unica.

>string password_hash ( string $password , integer $algo [, array $options ] )

algo: Uma constante de algoritmo de senha indicando qual algoritmo utilizar no hash de senha.

```php
<?php
echo "<pre>";
print_r(password_hash("MartinSeamusMcFly", PASSWORD_DEFAULT));
$options = [
    'cost' => 12,
];
echo PHP_EOL;
print_r(password_hash("MartinSeamusMcFly", PASSWORD_BCRYPT, $options));
$options = [
    'cost' => 12,
	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
echo PHP_EOL;
print_r(password_hash("MartinSeamusMcFly", PASSWORD_BCRYPT, $options));
```

##### Cuidado
É fortemente recomendado que você nao gere seu proprio SALT para esta função. Ela cria um salt seguro de forma automatica se você não especificar um.


**password_needs_rehash** - Verifica se um hash combina com as opções dadas

Esta função verifica para ver se o hash fornecido implementa o algoritmo e as opções fornecidas. Se não, é assumido que o hash precisa ser refeita.

>boolean password_needs_rehash ( string $hash , integer $algo [, array $options ] )

```php
<?php
echo "<pre>";
$password = 'MartinSeamusMcFly';
$hash = password_hash("MartinSeamusMcFly", PASSWORD_DEFAULT);
$options = array('cost' => 11);
if (password_verify($password, $hash)) {
    if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {
        $newHash = password_hash($password, PASSWORD_DEFAULT, $options);
    }
}
echo $hash;
echo PHP_EOL;
echo $newHash;
```

**password_verify** - Verifica se o password combina com o hash

>boolean password_verify ( string $password , string $hash )

```php
<?php
echo "<pre>";
$hash = '$2y$10$L/fhTBrHcTCqqQXe/0bSZOlkiCFMGvNVX4jfFhqCH7emnCVEpeMrC';
if (password_verify('MartinSeamusMcFly', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
```
