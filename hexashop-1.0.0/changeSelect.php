<?php

try{
    // $db = new PDO('mysql:host=localhost;dbname=projetmusicbd;charset=utf8', 'root', 'root');
    $db = new PDO('mysql:host=10.31.176.99;dbname=musique;charset=utf8', 'jojo', 'dio'); 
 }
 catch(Exception $e){
     var_dump($e->__toString());
     exit;
 }


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if(isset($_GET["instrument"])){$instru = $_GET["instrument"];}

    if(isset($_GET["prof"])){$profSelect = $_GET["prof"];}

    $message = "";


    if(isset($instru)){
        $lesProfs = $db->prepare('SELECT pr.* FROM prof pr INNER JOIN possede po on po.Id_Prof = pr.Id_Prof WHERE Id_instru = :instru');
        $lesProfs->bindParam(':instru', $instru, PDO::PARAM_STR);
        $lesProfs->execute();
        $lesProfs = $lesProfs->fetchAll();

        
        
        $message = $lesProfs;
    }


    if(isset($profSelect)){
        $lesjour = $db->prepare('SELECT dp.* FROM disponibilite dp WHERE Id_prof = :prof');
        $lesjour->bindParam(':prof', $profSelect, PDO::PARAM_STR);
        $lesjour->execute();
        $lesjour = $lesjour->fetchAll();

        
        $message = $lesjour;
    }




    
    // Renvoyer une réponse au client au format JSON
    $response = array("message" => $message);
    echo json_encode($response);
    
}