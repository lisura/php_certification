# Data Storage

Se estiver usando SQL para realizar as conexões, seu código é sujeito a ataques de SQL Injection.

Felizmente para você, anteriormente foi realizada uma ótima aula que te ensinou como se livrar destes usuários malvados que podem realizar este tipo de ataque.

Mas.... como seu que você é um consumidor avido por conhecimento e gosta de manter sua aplicação super segura, aqui serão dadas mais algumas dicas de como proteger seu banco de dados.


## DATABASE DESIGN

- Aplicar o principio dos direitos limitados - Atribuir a cada usuário os privilégios que são necessários, não deixando que e o mesmo tenho acesso ou permissões em locais onde ele não teria acesso.
- Não expor o servidor DB à Internet - Limitar o acesso ao servidos apenas aos servidores que precisam de acesso.
- Isolar bancos de dados com informações confidenciais para diferente segmentos de rede - Cada local da rede só acessa os bancos de dados que eles precisam, limitando o acesso a informação.
- Exigir a alteração de senha de forma periódica.
- Leia os logs para saber o que acontece com seu banco de dados.
