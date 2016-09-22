# Introdução

PHP é uma linguagem de programação rápida de se aprender, e por conta disso muitos nem se dão conta de pensar no aspecto da segurança dos sistemas programados, sendo esses pontos deixados de lado em favor de uma entrega rápida do projeto. 

No entanto, a segurança deveria ser ponto chave em qualquer sistema online. No caso de PHP, a linguagem em si é poderosa o bastante para executar arquivos e scripts em segundo plano, no servidor e fora da aplicação. Assim, um mal planejamento de questões de segurança pode deixar o sistema com portas abertas para invasões e ataques maliciosos.

Nesta aula veremos como tomar medidas para garantir a segurança dos sistemas em PHP, através do controle de sessões, controle de dados enviados pelo usuário,  configurações do arquivo **php.ini**, entre outros. 

Tenha sempre em mente que 
* Não há como proteger totalmente o sistema, existem formas bastante criativas de se sofrer ataques, mas com as medidas explicadas aqui podemos nos proteger de ataques mais comuns e dificultar a vida do invasor.
* Nunca confie no usuário, pois o mesmo pode ser o atacante. Tome sempre muito cuidado com os dados que o usuário envia para o sistema.
