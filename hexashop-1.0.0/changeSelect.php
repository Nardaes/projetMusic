<?php
// Recevoir les données envoyées via une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instru = $_POST["instrument"];
    
    if($instru == null){
        $message = "c'est null"+$instru;
    }
    else{
        $message = "c'est pas null"+$instru;
    }
    
    // Renvoyer une réponse au client au format JSON
    $response = array("message" => $message);
    echo json_encode($response);
}