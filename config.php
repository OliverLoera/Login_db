<?php
    define('USER', '4586180_aeromexico');
    define('PASSWORD', 'JmY%7r@32);9d:vt');
    define('HOST', 'fdb1030.awardspace.net');
    define('DATABASE', '4586180_aeromexico');

    try{
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    }catch(PDOException $e){
        exit("Error: ". $e->getMessage());
    }
?>