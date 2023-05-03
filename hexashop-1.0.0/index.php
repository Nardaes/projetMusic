<?php

// SERVEUR
// $host = '10.31.176.99';
// $user = 'jojo';
// $password = 'dio';
// $database = 'musique';

//LOCAL
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'musique';

session_start();

//connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
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
                            <?php if (isset($_SESSION['connected']) && $_SESSION['connected'] === true): ?>
                                <li class="scroll-to-section"><a href="index.php?action=logout">Déconnexion</a></li>
                            <?php else: ?>
                                <li class="scroll-to-section"><a href="login.php">Connexion</a></li>
                            <?php endif; ?>
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
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Saxophone</h4>
                                <div class="main-border-button">
                                    <?php if(isset($_SESSION['connected'])){
                                        if($_SESSION['connected'] == TRUE){ 
                                            $_SESSION['instru'] = 'saxophone';
                                            ?>
                                            <a href="reservation.php">En savoir plus</a> 
                                    <?php }
                                    } else {?>
                                    <a href="login.php">En savoir plus</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <img src="assets/images/saxophone.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Trompette</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Trompette</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <?php if(isset($_SESSION['connected'])){
                                                        if($_SESSION['connected'] == TRUE){ 
                                                            $_SESSION['instru'] = 'trompette';
                                                            ?>
                                                            <a href="reservation.php">En savoir plus</a> 
                                                    <?php }
                                                    } else {?>
                                                    <a href="login.php">En savoir plus</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-01.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Piano</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Piano</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <?php if(isset($_SESSION['connected'])){
                                                        if($_SESSION['connected'] == TRUE){ 
                                                            $_SESSION['instru'] = 'piano';
                                                            ?>
                                                            <a href="reservation.php">En savoir plus</a> 
                                                    <?php }
                                                    } else {?>
                                                    <a href="login.php">En savoir plus</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-02.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Batterie</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Batterie</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                <?php if(isset($_SESSION['connected'])){
                                                    if($_SESSION['connected'] == TRUE){ 
                                                        $_SESSION['instru'] = 'batterie';
                                                        ?>
                                                        <a href="reservation.php">En savoir plus</a> 
                                                <?php }
                                                } else {?>
                                                <a href="login.php">En savoir plus</a>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-03.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Clarinette</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Clarinette</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                <?php if(isset($_SESSION['connected'])){
                                                    if($_SESSION['connected'] == TRUE){ 
                                                        $_SESSION['instru'] = 'Clarinette';
                                                        ?>
                                                        <a href="reservation.php">En savoir plus</a> 
                                                <?php }
                                                } else {?>
                                                <a href="login.php">En savoir plus</a>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-04.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Instrument</h2>
                        <span>Instruments disponibles pour les cours.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="sizeImg">
                                        <div class="hover-content">
                                            <ul>
                                                <li>
                                                <?php if(isset($_SESSION['connected'])){
                                                    if($_SESSION['connected'] == TRUE){ 
                                                        $_SESSION['instru'] = 'saxophone';
                                                        ?>
                                                        <a href="reservation.php"><i class="fa fa-eye"></i></a>
                                                <?php }
                                                } else {?>
                                                <a href="login.php"><i class="fa fa-eye"></i></a>
                                                <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/men-01.jpg" alt="" style="max-width: 350px; max-height: 301.26px;">
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>Bandonéon</h4>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="sizeImg">
                                        <div class="hover-content">
                                            <ul>
                                                <li>
                                                    <?php if(isset($_SESSION['connected'])){
                                                        if($_SESSION['connected'] == TRUE){ 
                                                            $_SESSION['instru'] = 'flûte';
                                                            ?>
                                                            <a href="reservation.php"><i class="fa fa-eye"></i></a>
                                                    <?php }
                                                    } else {?>
                                                    <a href="login.php"><i class="fa fa-eye"></i></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/men-02.jpg" alt="" style="max-width: 350px; max-height: 301.26px;">
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>Flûte traversière </h4>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="sizeImg">
                                        <div class="hover-content">
                                            <ul>
                                                <li>
                                                    <?php if(isset($_SESSION['connected'])){
                                                        if($_SESSION['connected'] == TRUE){ 
                                                            $_SESSION['instru'] = 'Accordéon';
                                                            ?>
                                                            <a href="reservation.php"><i class="fa fa-eye"></i></a>
                                                    <?php }
                                                    } else {?>
                                                    <a href="login.php"><i class="fa fa-eye"></i></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/men-03.jpg" alt="" style="max-width: 350px; max-height: 301.26px;">
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>Accordéon </h4>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="sizeImg">
                                        <div class="hover-content">
                                            <ul>
                                                <li>
                                                    <?php if(isset($_SESSION['connected'])){
                                                        if($_SESSION['connected'] == TRUE){ 
                                                            $_SESSION['instru'] = 'saxophone';
                                                            ?>
                                                            <a href="reservation.php"><i class="fa fa-eye"></i></a>
                                                    <?php }
                                                    } else {?>
                                                    <a href="login.php"><i class="fa fa-eye"></i></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/saxophone.jpg" alt="" style="max-width: 350px; max-height: 301.26px;">
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>Saxophone</h4>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="sizeImg">
                                        <div class="hover-content">
                                            <ul>
                                                <li>
                                                    <?php if(isset($_SESSION['connected'])){
                                                        if($_SESSION['connected'] == TRUE){ 
                                                            $_SESSION['instru'] = 'trompette';
                                                            ?>
                                                            <a href="reservation.php"><i class="fa fa-eye"></i></a>
                                                    <?php }
                                                    } else {?>
                                                    <a href="login.php"><i class="fa fa-eye"></i></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/baner-right-image-01.jpg" alt="" style="max-width: 350px; max-height: 301.26px;">
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>Trompette</h4>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="sizeImg">
                                        <div class="hover-content">
                                            <ul>
                                                <li>
                                                    <?php if(isset($_SESSION['connected'])){
                                                        if($_SESSION['connected'] == TRUE){ 
                                                            $_SESSION['instru'] = 'piano';
                                                            ?>
                                                            <a href="reservation.php"><i class="fa fa-eye"></i></a>
                                                    <?php }
                                                    } else {?>
                                                    <a href="login.php"><i class="fa fa-eye"></i></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/baner-right-image-02.jpg" alt="" style="max-width: 350px; max-height: 301.26px;">
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>Piano</h4>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="sizeImg">
                                        <div class="hover-content">
                                            <ul>
                                            <li>
                                                <?php if(isset($_SESSION['connected'])){
                                                    if($_SESSION['connected'] == TRUE){ 
                                                        $_SESSION['instru'] = 'batterie';
                                                        ?>
                                                        <a href="reservation.php"><i class="fa fa-eye"></i></a>
                                                <?php }
                                                } else {?>
                                                <a href="login.php"><i class="fa fa-eye"></i></a>
                                                <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/baner-right-image-03.jpg" alt="" style="max-width: 350px; max-height: 301.26px;">
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>Batterie</h4>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="sizeImg">
                                        <div class="hover-content">
                                            <ul>
                                                <li>
                                                    <?php if(isset($_SESSION['connected'])){
                                                        if($_SESSION['connected'] == TRUE){ 
                                                            $_SESSION['instru'] = 'Clarinette';
                                                            ?>
                                                            <a href="reservation.php"><i class="fa fa-eye"></i></a>
                                                    <?php }
                                                    } else {?>
                                                    <a href="login.php"><i class="fa fa-eye"></i></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/baner-right-image-04.jpg" alt="" style="max-width: 350px; max-height: 301.26px;">
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>Clarinette</h4>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->
    
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