# Data Storage

Se estiver usando SQL para realizar as conexoes, seu codigo é sujeito a ataques de SQL Injection.

Felizmente para você, anteriormente foi realizada uma otima aula que te ensinou como se livrar destes usuarios malvados que podem realizar este tipo de ataque.

Mas.... como seu que você é um consumidor avido por conhecimento e gosta de manter sua aplicação super segura, aqui serão dadas mais algumas dicas de como pretejer seu banco de dados.



DATABASE DESIGN
o EMPLOY PRINCIPLE OF LIMITED RIGHTS - ASSIGN ONLY THOSE PRIVILEGES THAT ARE NEEDED BY USER
o DO NO EXPOSE DB SERVER TO THE INTERNET
o ISOLATE DATABASES WITH SENSITIVE INFORMATION TO SEPARATE NETWORK SEGMENTS
o REQUIRE PERIODIC PASSWORD CHANGES AND ENCRYPT BEFORE STORING
o READ THE LOGS
