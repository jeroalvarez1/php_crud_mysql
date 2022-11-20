<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '1234',
    'php_mysql_crud'
);

// Verificar coneccion
/*
if (isset($conn)) {
    echo 'DB connection established';
};
*/

?>