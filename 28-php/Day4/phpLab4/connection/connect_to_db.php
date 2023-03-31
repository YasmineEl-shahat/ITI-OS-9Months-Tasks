<?php

function connect_pdo(){
    $dsn = 'mysql:dbname=phplab4;host=127.0.0.1;port=3306;'; #port number
    $user = 'root';
    $password = 'asd5693';
    $db= new PDO($dsn, $user, $password);
    return $db;
}

?>