<?php
// Establecer la conexión con la base de datos
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

// Asegurarnos de que nuestra base de datos recién creada sea la activa
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Crear la tabla users con el motor de almacenamiento MyISAM
$query= 'CREATE TABLE employees (
    emp_no      INT             NOT NULL,  
    birth_date  DATE            NOT NULL,
    first_name  VARCHAR(14)     NOT NULL,
    last_name   VARCHAR(16)     NOT NULL,
    gender      ENUM ("M","F")  NOT NULL,   
    hire_date   DATE            NOT NULL,
    PRIMARY KEY (emp_no)                   
                                           
                                           
);';
mysqli_query($db, $query) or die ("Error al crear la tabla users: " . mysqli_error($db));
// Cerrar conexión
$query= 'CREATE TABLE departments (
    dept_no     CHAR(4)         NOT NULL,  
    dept_name   VARCHAR(40)     NOT NULL,
    PRIMARY KEY (dept_no),                 
    UNIQUE  KEY (dept_name)                
);';
mysqli_query($db, $query) or die ("Error al crear la tabla users: " . mysqli_error($db));

$query= 'CREATE TABLE dept_emp (
    emp_no      INT         NOT NULL,
    dept_no     CHAR(4)     NOT NULL,
    from_date   DATE        NOT NULL,
    to_date     DATE        NOT NULL,
    KEY         (emp_no),   
    KEY         (dept_no),  
    FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE,
    FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE,
    PRIMARY KEY (emp_no, dept_no)
);';
mysqli_query($db, $query) or die ("Error al crear la tabla users: " . mysqli_error($db));


$query= 'CREATE TABLE dept_manager (
    dept_no      CHAR(4)  NOT NULL,
    emp_no       INT      NOT NULL,
    from_date    DATE     NOT NULL,
    to_date      DATE     NOT NULL,
    KEY         (emp_no),
    KEY         (dept_no),
    FOREIGN KEY (emp_no)  REFERENCES employees (emp_no)    ON DELETE CASCADE,
                                
    FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE,
    PRIMARY KEY (emp_no, dept_no)  
 );';
mysqli_query($db, $query) or die ("Error al crear la tabla users: " . mysqli_error($db));
mysqli_close($db);
?>