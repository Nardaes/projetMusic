<?php

try{
    // $db = new PDO('mysql:host=localhost;dbname=projetmusicbd;charset=utf8', 'root', 'root');
    $db = new PDO('mysql:host=10.31.176.99;dbname=musique;charset=utf8', 'jojo', 'dio');
 }
 catch(Exception $e){
     var_dump($e->__toString());
     exit;
 }

$test = $db->prepare('SELECT * FROM prof');

$test->execute();
$letest = $test->fetchAll();

foreach($letest as $oui){
    echo($oui["NOM"]);
}