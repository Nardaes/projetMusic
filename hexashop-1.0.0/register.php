<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'musique';

//connexion à la base de données

$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
// print($request_method);

if ($request_method === 'POST'){
    if (isset($_POST['envoyer'])){
        // $stmt = $pdo->prepare('INSERT INTO utilisateur (nom_U, adresse_U, mdp_U, mail_U) VALUES (:nom, :adresse, :password, :email)');
            try {
            $nom = $_POST['exampleInputNom1'];
            $email = $_POST['exampleInputEmail1']; 
            $adresse = $_POST['exampleInputAdressePostal1'];
            $password = password_hash($_POST['exampleInputPassword1'], PASSWORD_DEFAULT);

            $stmt = $pdo->prepare('INSERT INTO utilisateur (nom_U, adresse_U, mdp_U, mail_U) VALUES (:nom, :adresse, :password, :email)');
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($result);

            session_start([
                'cookie_lifetime' => 86400,
            ]);
            $_SESSION['connected'] = TRUE;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = email;
            $_SESSION['user_nom'] = $nom;


            header('Location: index.php');
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Accueil</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Accueil</a></li>
                            <li class="scroll-to-section"><a href="reservation.php">Réservation</a></li>
                            <li class="scroll-to-section"><a href="login.php">Inscription</a></li>                    
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top" style="background-image:url(assets/images/guitar.jpg)">
        <div class="container-fluid">
            <div class="row">
                <div class="card" style=" margin: 0 auto; float: none; margin-bottom: 10px;">
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                            <label for="exampleInputNom1">Nom</label>
                            <input type="text" class="form-control" id="exampleInputNom1" name="exampleInputNom1" aria-describedby="textlHelp" placeholder="Nom">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputAdressePostal1">Adresse postal</label>
                            <input type="text" class="form-control" id="exampleInputAdressePostal1" name="exampleInputAdressePostal1" aria-describedby="textlHelp" placeholder="Adresse postal">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                            <small id="emailHelp" class="form-text text-muted">Nous partagerons jamais votre adresse mail avec quelqu'un.</small>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Mot de passe">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword2">Vérification du mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" name="exampleInputPassword1" placeholder="Tapez à nouveau le mot de passe">
                            </div>
                            <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
                            <div class="form-group">
                                <div class="mt-2">
                                    <label >Déjà inscrit ?</label><a href="login.php"> Par ici</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2023 Moukxico Co., Ltd. All Rights Reserved. 
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>