<?php

$host = 'localhost';
$dbname = 'fil_rouge';
$username = 'root';
$password = 'root';

try 
{
    $bdd = new PDO("mysql:host=$host;dbname=$dbname; utf8_general_ci", $username , $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

?> 
