#campuslands
segundo filtro, php

Creación de la base de datos desde la terminal
    mysql -u campus -p
    Enter password: 
    Welcome to the MySQL monitor.  Commands end with ; or \g.
    Your MySQL connection id is 10
    Server version: 8.0.33-0ubuntu0.22.04.2 (Ubuntu)

    Copyright (c) 2000, 2023, Oracle and/or its affiliates.

    Oracle is a registered trademark of Oracle Corporation and/or its
    affiliates. Other names may be trademarks of their respective
    owners.

    Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

    mysql> CREATE DATABASE campuslands;
    Query OK, 1 row affected (0,01 sec)

    mysql> SHOW DATABASE;
    ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DATABASE' at line 1
    mysql> SHOW DATABASES;
    +--------------------+
    | Database           |
    +--------------------+
    | campuslands        |
    | country            |
    | information_schema |
    | mitienda           |
    | mysql              |
    | performance_schema |
    | phpmyadmin         |
    | prueba             |
    | sgavapp            |
    | sys                |
    | tabla              |
    +--------------------+
    11 rows in set (0,00 sec)

    mysql> USE campuslands;
    Database changed
    mysql> CREATE TABLE pais(
        -> idPais int not null auto_increment,
        -> nombrePais varchar(50) not null,
        -> CONSTRTAINT pk_pais PRIMARY KEY (idPais)
        -> );
    ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'pk_pais PRIMARY KEY (idPais)
    )' at line 4
    mysql> CREATE TABLE pais( idPais int not null auto_increment, nombrePais varchar(50) not null, PRIMAR
    Y KEY (idPais) );
    Query OK, 0 rows affected (0,02 sec)

    mysql> SHOW TABLES;
    +-----------------------+
    | Tables_in_campuslands |
    +-----------------------+
    | pais                  |
    +-----------------------+
    1 row in set (0,00 sec)

    mysql> describe pais;
    +------------+-------------+------+-----+---------+----------------+
    | Field      | Type        | Null | Key | Default | Extra          |
    +------------+-------------+------+-----+---------+----------------+
    | idPais     | int         | NO   | PRI | NULL    | auto_increment |
    | nombrePais | varchar(50) | NO   |     | NULL    |                |
    +------------+-------------+------+-----+---------+----------------+
    2 rows in set (0,00 sec)

    mysql> CREATE TABLE departamento(
        -> idDep int not null auto_increment,
        -> nombreDep varchar(50) not null,
        -> idPais int(12),
        -> primary key (idDep),
        -> CONTRAINT fk_PaisDep foreign key (idPais) references pais(idPais)
        -> );
    ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'fk_PaisDep foreign key (idPais) references pais(idPais)
    )' at line 6
    mysql> CREATE TABLE departamento( idDep int not null auto_increment, nombreDep varchar(50) not null,
    idPais int(12), primary key (idDep), foreign key (idPais) references pais(idPais) );
    Query OK, 0 rows affected, 1 warning (0,02 sec)

    mysql> describe departamento;
    +-----------+-------------+------+-----+---------+----------------+
    | Field     | Type        | Null | Key | Default | Extra          |
    +-----------+-------------+------+-----+---------+----------------+
    | idDep     | int         | NO   | PRI | NULL    | auto_increment |
    | nombreDep | varchar(50) | NO   |     | NULL    |                |
    | idPais    | int         | YES  | MUL | NULL    |                |
    +-----------+-------------+------+-----+---------+----------------+
    3 rows in set (0,00 sec)

    mysql> CREATE TABLE region(
        -> idReg int not null auto_increment,
        -> nombreReg varchar(60) not null,
        -> idDep int(14),
        -> primary key (idReg),
        -> CONSTRAINT fk_DepRegion foreign key (idDep) references departamento(idDep);
    ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 6
    mysql> CREATE TABLE region( idReg int not null auto_increment, nombreReg varchar(60) not null, idDep
    int(14), primary key (idReg), CONSTRAINT fk_DepRegion foreign key (idDep) references departamento(idDep));
    Query OK, 0 rows affected, 1 warning (0,02 sec)

    mysql> describe region;
    +-----------+-------------+------+-----+---------+----------------+
    | Field     | Type        | Null | Key | Default | Extra          |
    +-----------+-------------+------+-----+---------+----------------+
    | idReg     | int         | NO   | PRI | NULL    | auto_increment |
    | nombreReg | varchar(60) | NO   |     | NULL    |                |
    | idDep     | int         | YES  | MUL | NULL    |                |
    +-----------+-------------+------+-----+---------+----------------+
    3 rows in set (0,00 sec)

    mysql> CREATE TABLE campers(
        -> idCamper int not null auto_increment,
        -> nombreCamper varchar(50) not null,
        -> apellidoCamper varchar(50) not null,
        -> fechaNac date,
        -> idReg int not null,
        -> primary key (idCamper),
        -> CONSTRAINT fk_RegionCampers foreign key (idReg) references region (idReg)
        -> );
    Query OK, 0 rows affected (0,03 sec)

    mysql> describe campers;
    +----------------+-------------+------+-----+---------+----------------+
    | Field          | Type        | Null | Key | Default | Extra          |
    +----------------+-------------+------+-----+---------+----------------+
    | idCamper       | int         | NO   | PRI | NULL    | auto_increment |
    | nombreCamper   | varchar(50) | NO   |     | NULL    |                |
    | apellidoCamper | varchar(50) | NO   |     | NULL    |                |
    | fechaNac       | date        | YES  |     | NULL    |                |
    | idReg          | int         | NO   | MUL | NULL    |                |
    +----------------+-------------+------+-----+---------+----------------+
    5 rows in set (0,00 sec)
