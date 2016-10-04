# Cross-Site Request Forgeries

Cross-Site Request Forgeries, ou CSRF, é uma forma de ataque onde o usuário é enganado, fazendo com que digite dados em uma página maliciosa contendo código submetendo o formulário de um sistema alvo do ataque. Tome como exemplo um usuário que acessa o site do banco xyz.com. O atacante engana o usuário ao fazer com que ele entre em uma página aparentemente inofensiva, mas caso ele ainda esteja logado no site do banco, a página maliciosa executa uma requisição para submeter o formulário (ex: xyz.com/transfer.php?beneficiario=attacker&valor=10000), fazendo com que uma operação seja efetuada sem o consentimento do usuário.

Para verificar o ataque, temos o exemplo de sistema abaixo. Basta executar o login no sistema e depois executar a página *problem.php* para efetuar o ataque e inserir um novo registro sem a aprovação do usuário.

[Exemplo - sistema Memeland](https://github.com/lisura/php_certification/tree/master/Questoes/SECURITY/memeland)

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
