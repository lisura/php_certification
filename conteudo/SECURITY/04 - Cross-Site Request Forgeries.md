# Cross-Site Request Forgeries

Cross-Site Request Forgeries, ou CSRF, é uma forma de ataque onde o usuário é enganado, fazendo com que digite dados em uma página maliciosa ou acessando uma imagem ou site aparentemente inofensivo mas contendo código HTML que o direciona para um site malicioso onde acabará deixando seus dados

No nosso caso precisamos estar atentos com os usuários tentando conseguir acesso ao nosso sistema através desse ataque. O exemplo abaixo demonstra como um sistema de login pode estar vulneravel.

[Exemplo - sistema Memeland](https://github.com/lisura/php_certification/tree/master/Questoes/SECURITY/memeland)

Para prevenir no caso acima, basta substituir o $_REQUEST por $_POST, evitando assim o login por $_GET.

Algumas dicas para prevenção de CSRF:
* Prefira o uso de POST, não deixe o sistema aceitar qualquer protocolo
* Considere ações mais sensíveis do sistema em que o usuário fornece a senha
* Lembre-se que o usuário pode ser o proprio atacante
* O uso de tokens ou captchas ajuda bastante
