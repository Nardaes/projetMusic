<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'musique';

//connexion à la base de données

$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'POST') {
	if (isset($_POST['envoyer'])) {
        if(!empty($_POST["exampleInputEmail1"]) && !empty($_POST['exampleInputPassword1'])){
            $login=$_POST["exampleInputEmail1"];
            $password = $_POST['exampleInputPassword1'];
    
            $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE mail_U = :email');
            $stmt->bindParam(':email', $login);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['mdp_U'])) {
                
                session_start();

                $_SESSION['connected'] = TRUE;
                $_SESSION['user_id'] = $user['Id_utilisateur'];
                $_SESSION['user_email'] = $user['mail_U'];
                $_SESSION['user_nom'] = $user['nom_U'];

                // var_dump($_SESSION);

                // Rediriger vers la page d'accueil
                header('Location: index.php');
                exit;
            } else {
                $message = 'Adresse e-mail ou mot de passe incorrect.';
            }
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Effectuer les opérations de déconnexion
    session_destroy();
    // Rediriger vers une autre page après la déconnexion
    header('Location: index.php');
    exit;
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
                            <li class="scroll-to-section"><a href="login.php">Connexion</a></li>
                            <?php //if($_SESSION['connected'] == TRUE){ ?>
                                
                            <?php //} ?>                    
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
                            <label for="exampleInputEmail1">Adresse Mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse Mail">
                            <small id="emailHelp" class="form-text text-muted">Nous partagerons jamais votre adresse mail avec quelqu'un.</small>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Mot de passe">
                            </div>
                            <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Se rappeler de moi</label>
                            </div>
                            <button type="submit" name="envoyer" id="envoyer" class="btn btn-primary">Envoyer</button>
                            <div class="form-group">
                                <div class="mt-2">
                                    <label >Pas inscrit ?</label><a href="register.php"> Par ici</a>
                                </div>
                                <?php if (isset($message)) : ?>
                                    <div><?= $message ?></div>
                                <?php endif ?>
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