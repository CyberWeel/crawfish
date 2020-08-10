<?php

$mysqlDatabase = '';
$mysqlHost = '';
$mysqlLogin = '';
$mysqlPassword = '';

$conn = new PDO(
    "mysql:host=$mysqlHost;dbname=$mysqlDatabase",
    $mysqlLogin,
    $mysqlPassword
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
