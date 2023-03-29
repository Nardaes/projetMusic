<?php

try{
    $db = new PDO('mysql:host=10.31.176.99;dbname=musique;charset=utf8', 'jojo', 'dio'); 
 }
 catch(Exception $e){
     var_dump($e->__toString());
     exit;
 }


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $instru = $_GET["instrument"];

    
    
    if($instru == null){
        $message = "";
    }
    else{
        $lesProfs = $db->prepare('SELECT pr.* FROM prof pr INNER JOIN possede po on po.Id_Prof = pr.Id_Prof WHERE Id_instru = :instru');
        $lesProfs->bindParam(':instru', $instru, PDO::PARAM_STR);
        $lesProfs->execute();
        $lesProfs = $lesProfs->fetchAll();

        
        
        $message = $lesProfs;
    }
    
    // Renvoyer une réponse au client au format JSON
    $response = array("message" => $message);
    echo json_encode($response);
}