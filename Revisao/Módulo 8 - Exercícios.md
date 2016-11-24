# Questões

## 1)  You have been given the following code snippet ?

```php
<?php
$stmt = $dbh->prepare("SELECT * FROM USER where name = ?");
if ($stmt->execute(array($_GET['name']))) {
  while (??????) {
    print_r($row);
  }
}
```

A) $row = $stmt->fetchall()

B) $row = $stmt->getch()

C) $row = $stmt->fetch()

D) $row = $stmt->get()

---

## 2)  Which of the following prepared query strings is used to execute a prepared statement?

A) PDOStatement::fetchAll

B) PDOStatement::fetch

C) PDOStatement::execute

D) PDOStatement::errorInfo

---

## 3)  Which of the following methods of PDOStatement class returns the next rowset in a multi-query statement?

A) PDOStatement->fetch()

B) PDOStatement->fetchAll()

C) PDOStatement->rowCount()

D) PDOStatement->nextRowset()

---

## 4)  Martin works as a Database Administrator for MTech Inc. He designs a database that has a table named Products. He wants to create a report listing different product categories. He does not want to display any duplicate row in the report. Which of the following SELECT statements will Martin use to create the report?

A) SELECT Product_No, Prod_Category FROM Products;

B) SELECT Product_No, Prod_Category FROM Products GROUP BY Product_No;

C) SELECT Product_No, Prod_Category FROM Products GROUP BY Product_No ORDER BY Product_No;

D) SELECT DISTINCT Product_No, Prod_Category FROM Products;

---

## 5)  Which of the following are the limitations of the prepared statements ? Each correct answer represents a complete solution. Choose all that apply.

A) It does not allow you to repeat the same statement without the overhead of parsing the SQL.

B) It is limited to SELECT, INSERT, REPLACE, UPDATE, DELETE, and CREATE TABLE queries.

C) It is slower for one time queries since it requires two requests from the MySQL server.

D) It cannot prevent SQL injection without needing to escape data.

---

## 6)  You work as a Database Administrator for Dolliver Inc. The company uses an Oracle database. The database contains two tables, named Employees and Departments. You want to retrieve all matched and unmatched rows from both the tables. Which of the following types of joins will you use to accomplish this?

A) FULL OUTER JOIN

B) LEFT OUTER JOIN

C) CROSS JOIN

D) RIGHT OUTER JOIN

---

## 7)  Which of the following statements describes the use of a GROUP BY clause?

A) A GROUP BY clause automatically sorts the grouped result in descending order.

B) A GROUP BY clause automatically sorts the grouped result in ascending order, if the DESC keyword is not defined.

C) A GROUP BY clause returns a single row of information for each group of rows, in addition to all the rows.

D) A GROUP BY clause returns a single row of information for each group of rows.

---

## 8)  You are using a database named HumanResource. You have to delete some tables from the database using SQL statements. Which of the following statements will you use to accomplish the task?

A) DELETE TABLE <table_name> FROM DATABASE

B) DELETE TABLE <table_name>

C) DROP TABLE <table_name>

D) DROP TABLE <table_name> FROM DATABASE

---

## 9) Which of the following joins will you use to display data that do not have an exact match in the column?

A) Self join

B) Equijoin

C) Outer join

D) Non-equijoin

---

## 10) Maria writes a query that uses outer join between two tables. Which of the following operators are not allowed in the query? Each correct answer represents a complete solution. Choose two.

A) OR

B) AND

C) IN

D) =

---
---


## Respostar

1 - C ) These are not valid formats for fetching data from prepared statements.

2 - C ) PDOStatement::execute is used to execute a prepared statement. PDO is a PHP extension for establishing PHP's database connections by creating a uniform interface.

3 - D ) The PDOStatement->nextRowset() method of PDOStatement class returns the next rowset in a multi-query statement.

4 - D ) The SELECT statement in answer option D will display different product categories in the Products table.

5 - B,C)

6 - A) FULL OUTER JOIN returns all rows from the left and right tables in a join expression, even if the data values in joined columns do not match.

7 - D ) Answer option C is incorrect. The GROUP BY clause only returns a single row of information for each group of rows. It does not return information for all the rows.

8 - C)

9 - D)

10 - A,C)
