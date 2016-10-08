# SSL

Secure Socket Layer (SSL) é um padrão global em tecnologia de segurança desenvolvida pela Netscape em 1994. Ele cria um canal criptografado entre um servidor web e um navegador (browser) para garantir que todos os dados transmitidos sejam sigilosos e seguros.

## OpenSSL

OpenSSL é um módulo que usa as funções da **»OpenSSL** para geração e verificação de assinaturas e para criptografar e descriptografar dados. OpenSSL oferece muitos recursos que este módulo atualmente não suporta.

Para utilizar as funções do OpenSSL você precisa instalar o pacote **»OpenSSL**.

Para usar o suporte OpenSSL no PHP, você deverá compilar o PHP com **--with-openssl[=DIR]**.

### nota

Para efeitos de certificação, ficamos apenas na teoria e não na pratica do OpenSSL. As funções, e documentação não são nativas do PHP e requerem uma configuração extra para uso.

## SSH

Secure Shell (SSH) é um protocolo de rede criptográfico para operação de serviços de rede de forma segura sobre uma rede insegura. A melhor aplicação de exemplo conhecida é para login remoto a sistemas de computadores.

O SSH fornece um canal seguro sobre uma rede insegura em uma arquitetura cliente-servidor, conectando uma aplicação cliente SSH com um servidor SSH. Aplicações comuns incluem login em linha de comando remoto e execução remota de comandos, mas qualquer serviço de rede pode ser protegido com SSH. A especificação do protocolo distingue entre duas versões maiores, referidas como SSH-1 e SSH-2.

## Secure Shell2

SSH2 é uma extensão PHP para lidar com o protocolo SSH.

Informações para instalar essa extensão PECL pode ser encontrada no capítulo Instalação de Extensões PECL. Informações adicionais como novas versões, downloads, arquivos fontes, manutenções e CHANGELOG podem ser encontrados aqui: » http://pecl.php.net/package/ssh2.

### nota

Para efeitos de certificação somente a teoria é cobrada.

## Armazenamento seguro

SSL/SSH protege dados transitando de um cliente para o servidor, mas não protege os dados guardados em um banco de dados. SSL é um protocolo on-the-wire.

Uma vez que o atacante ganha acesso direto ao seu banco de dados(desviando do servidor web), os dados armazenados podem ser expostos ou sofre uso nocivo, a não ser que a informação seja protegida pelo banco em si.

A  maneira mais fácil de contornar esse problema é primeiro criar seu próprio pacote de criptografia, e então usá-lo no seus scripts PHP. O PHP pode ajudá-lo com várias extensões, tais como Mcrypt e Mhash, cobrindo uma grande variedade de algoritmos de criptografia. O script criptografa os dados antes de inseri-los no banco de dados e descriptografa quando os recupera.

## Dados sensíveis

No caso de dados realmente escondidos, se sua representação crua não é necessária (ex.: não será mostrada), usar uma função de hash pode ser levada em consideração. Como mostrado na **Aula 10 - Password Hashing API**
