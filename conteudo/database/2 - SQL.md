# Structured Query Language

*Structured Query Language* (Linguagem de Consulta Estruturada) ou **SQL**, é uma linguagem de pesquisa declarativa padrão para banco de dados relacional.  
 Possui muitas variações e extensões produzidos pelos diferentes fabricantes de sistemas gerenciadores de bases de dados. Tipicamente a linguagem pode ser migrada de plataforma para plataforma sem mudanças estruturais principais.

 ## Tabelas

 Nos modelos de bases de dados relacionais, a tabela é um conjunto de dados dispostos em *n* colunas e *n* linhas.  
 As colunas são os campos da tabela, e caracterizam os tipos de dados que deverão constar na tabela (numéricos, alfa-numéricos, datas, etc). O número de linhas pode ser interpretado como o número de combinações de valores dos campos da tabela. A forma de identificar uma linha única é através de uma chave primária.

### Criando tabelas

 A declaração *CREATE TABLE* é utilizada para criar uma tabela.  
 ````SQL
 CREATE TABLE casa (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50) NOT NULL,
lema VARCHAR(30) NOT NULL,
sede VARCHAR(50),
reg_date TIMESTAMP
)
 ````
>**Nota**: *NULL* não é a mesma coisa que 0, *false* ou string vazia. *NULL* seria sem valor ou dado faltante.

### Alterando tabelas

A declaração *ALTER TABLE* é utilizada para alterar uma tabela.  
````SQL
ALTER TABLE casa MODIFY lema VARCHAR(254);
````

### Inserindo dados

A declaração *INSERT INTO* é utilizada para adicionar linhas de dados a uma tabela.  
````SQL
INSERT INTO casa (nome, lema, sede)
VALUES ('Stark', 'O inverno está quase ai', 'Winterfell');
````

### Buscando dados

A declaração *SELECT* é utilizada para buscar dados a uma tabela.  
````SQL
SELECT nome
FROM casa
WHERE lema LIKE "%inverno%";
````

### Atualizando dados

A declaração *UPDATE* é utilizada para alterar dados.  
````SQL
UPDATE casa
SET lema = 'O inverno está chegando'
WHERE nome = 'Stark';
````

### Deletando dados

A declaração *DELETE* é utilizada para deletar dados.  
````SQL
DELETE FROM casa
WHERE nome = 'Stark';
````

A declaração *TRUNCATE* é utilizada para deletar todas as linhas de uma tabela. Os contadores de *AUTO_INCREMENT* são resetados.  
````SQL
TRUNCATE casa;
````

A declaração *DROP* é utilizada para deletar uma tabela, indice ou banco de dados.  
````SQL
DROP TABLE casa;

DROP DATABASE game_of_thrones;
````

### Agrupando Dados

A declaração *GROUP BY* é usada em conjunto com funções de agregação para agrupar o resultado de uma querry em uma ou mais colunas.
````SQL
SELECT nome
FROM casa
WHERE lema LIKE "%inverno%"
GROUP BY id;
````

#### Funções de Agregação
* **AVG**()
recupera o valor médio do argumento.

* **BIT_AND()**
bitwise e.

* **BIT_OR()**
bitwise ou.

* **BIT_XOR()**
bitwise xor.

* **COUNT(DISTINCT)**
Conta a quantidade de valores diferentes.

* **COUNT()**
Conta a quantidade de linhas retornada.

* **GROUP_CONCAT()**
Retorna uma string concatenada.

* **MAX()**
Retorna o valor máximo.

* **MIN()**
Retorna o valor mínimo.

* **STDDEV_POP()**
recupera o desvio padrão da população.

* **SUM()**
Retorna soma.

* **VAR_POP()**
Retorna a população padrão.

### JOIN
JOINs são instruções usadas para combinar dados de dois conjuntos de dados, como tabelas.
Existem os seguintes tipos de join:

* **INNER JOIN**
Seleciona todos os registros dos conjuntos em que as condições do join forem atendidas.
````SQL
SELECT nome
FROM casa
INNER JOIN membro
ON membro.id_casa = casa.id;
````

* **LEFT JOIN**
Seleciona todos os registros do conjunto da esquerda, assim como os registros de todos os conjuntos em que as condições do join forem atendidas.
````SQL
SELECT nome
FROM casa
LEFT JOIN membro
ON membro.id_casa = casa.id;
````

* **RIGHT JOIN**
Seleciona todos os registros do conjunto da esquerda, assim como os registros de todos os conjuntos em que as condições do join forem atendidas.
````SQL
SELECT nome
FROM casa
RIGHT JOIN membro
ON membro.id_casa = casa.id;
````

* **FULL JOIN**
Seleciona todos os registros de todos os conjuntos, indenpendentemetne se as condições do join forem atendidas.
````SQL
SELECT nome
FROM casa
FULL OUTER JOIN membro
ON membro.id_casa = casa.id;
````
