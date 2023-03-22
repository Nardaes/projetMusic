<?php
$db = new PDO('mysql:host=localhost;dbname=projetmusicbd;charset=utf8', 'root', 'root');
// Recevoir les données envoyées via une requête POST
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $instru = $_GET["instrument"];

    
    
    if($instru == null){
        $message = "c'est null";
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