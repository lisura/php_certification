# Transaction

*Transaction* permite executar um conjunto de operações SQL para garantir que o banco de dados nunca execute operações parciais. Num conjunto de operações, se um deles falhar, a reversão (*rollback*) ocorre para restaurar a base de dados. Se não houve erro, todo o conjunto de instruções é 'commitado'.

Exemplo:
````SQL
START TRANSACTION;

INSERT INTO casa (nome, lema, sede) VALUES ('Stark', 'O Inverno está chegando', 'Winterfell');
INSERT INTO casa (nome, lema, sede) VALUES ('Targaryen', 'Fogo e Sangue', 'Fortaleza Vermelha');

COMMIT;
````
