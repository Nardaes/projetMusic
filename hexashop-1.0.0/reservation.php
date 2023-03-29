<?php 
    // $db = new PDO('mysql:host=localhost;dbname=projetmusicbd;charset=utf8', 'root', 'root');
    try{
       $db = new PDO('mysql:host=10.31.176.99;dbname=musique;charset=utf8', 'jojo', 'dio'); 
    }
    catch(Exception $e){
        var_dump($e->__toString());
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
    <link rel="stylesheet" type="text/css" href="assets/css/projetmusique.css">
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
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Accueil</a></li>
                            <li class="scroll-to-section"><a href="#men">Réservation</a></li>                        
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
        <div class="reservationForm">
            <form action="formReservation.php" method="GET">
                <div class="form-group">
                    <label>Instrument :</label>
                    
                    <select id="select1" class="form-control" action = "updateSelect2()">
                        <option value="">Choisir un instrument</option>
                        <?php 
                            $instruments = $db->prepare('SELECT * FROM instrument');
                            $instruments->execute();
                            $lesinstruments = $instruments->fetchAll();
                    
                            foreach ($lesinstruments as $instru){
                                echo "<option value=". $instru["Id_instru"] . ">" . $instru["nom_instru"] ."</option>";
                            }
                            
                            
                        
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label id="label2" style="display : none">Professeur :</label>
                    <select id="select2" class="form-control" style="display : none">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label style="display : none">Date :</label>
                    <input style="display : none" type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label style="display : none">Horaire :</label>
                    <input style="display : none" type="time" class="form-control">
                </div>
                <button style="display : none" type="submit" class="btn btn-primary">Reserver</button>
            </form>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    

    
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a></li>
                            <li><a href="#">hexashop@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Men’s Shopping</a></li>
                        <li><a href="#">Women’s Shopping</a></li>
                        <li><a href="#">Kid's Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved. 
                        
                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>

                        <br>Distributed By: <a href="https://themewagon.com" target="_blank" title="free & premium responsive templates">ThemeWagon</a></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
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


    <script>
        var select1 = document.getElementById("select1");
        var select2 = document.getElementById("select2");
        var label2 = document.getElementById("label2");
        var xhttpProf = new XMLHttpRequest();


        // ecouter le select des instrument et envoyer la requete XML
        select1.addEventListener("change", detecteSelect1);
        function detecteSelect1() {
            var nbrselect = select1.selectedIndex;
            var selectedOption = select1.options[nbrselect];
            var variableInstru = selectedOption.value;
            

            xhttpProf.open("GET", "changeSelect.php?instrument="+variableInstru, true);
            xhttpProf.send();


        }

        // recuperé la requete XML 
        xhttpProf.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var lesProfs = JSON.parse(this.responseText)

                if(lesProfs.message[0] != null){
                    console.log("ya au moins un prof");

                    changeSelect2(lesProfs.message);
                }
                else{
                    select2.style.display = "none";
                    label2.style.display = "none";
                }
             }
        };


        // faire le select des profs
        function changeSelect2(allProf){

            //efacer les ancien prof
            var lesOptions = select2.getElementsByTagName('option');
            for (var i=lesOptions.length; i--;) {
                select2.removeChild(lesOptions[i]);
            }

            //mettre l'option 0 et faire aparaitre
            var theOption1 = document.createElement('option');
            theOption1.value = "";
            theOption1.textContent = "Choisir in professeur";
            select2.appendChild(theOption1);

            select2.style.display = "block";
            label2.style.display = "block";

            // mettre tout les prof en option
            for(var i=0; i<allProf.length; i++){
                console.log(allProf[i][1], allProf[i][2] ,allProf[i][0]);
                var theOption = document.createElement('option');
                theOption.value = allProf[i][0];
                theOption.textContent = allProf[i][1]+" "+allProf[i][2];
                select2.appendChild(theOption);
            }
            
        }

    </script>

  </body>
</html>