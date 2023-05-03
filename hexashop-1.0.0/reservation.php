<?php 
    session_start();
    try{
        $db = new PDO('mysql:host=localhost;dbname=musique;charset=utf8', 'root', 'root');
        // $db = new PDO('mysql:host=10.31.176.99;dbname=musique;charset=utf8', 'jojo', 'dio');
        if (!isset($_SESSION['connected']) || $_SESSION['connected'] == false) {
            header('Location: index.php');
            exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
        }
    }
    catch(Exception $e){
        var_dump($e->__toString());
        exit;
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
                    <label id="label3" style="display : none">Date :</label>
                    <input id="select3" style="display : none" type="date" class="form-control">
                </div>


                <div class="form-group">
                    <label  style="display : none">Horaire :</label>
                    <input style="display : none" type="time" class="form-control">
                </div>
                <button style="display : none" type="submit" class="btn btn-primary">Reserver</button>
            </form>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    

    
    
    
    

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
        var select3 = document.getElementById("select3");
        var label2 = document.getElementById("label2");
        var label3 = document.getElementById("label3");
        var xhttpProf = new XMLHttpRequest();
        var WhereInTheForm = "";

        // recuperé les requete XML 
        xhttpProf.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                

                var Lemessage = JSON.parse(this.responseText)

                console.log(Lemessage);

                if(WhereInTheForm == "inprof"){
                    if(Lemessage.message[0] != null){
                        console.log("ya au moins un prof");

                        changeSelect2(Lemessage.message);
                    }
                    else{
                        select2.style.display = "none";
                        label2.style.display = "none";
                        select3.style.display = "none";
                        label3.style.display = "none";
                    }
                }

                if(WhereInTheForm == "indate"){
                    if(Lemessage.message[0] != null){
                        console.log("ya au moins une date");

                        changeSelect3(Lemessage.message);
                    }
                    else{
                        select3.style.display = "none";
                        label3.style.display = "none";
                    }
                }


             }
        };



        // ecouter le select des instrument et envoyer la requete XML
        select1.addEventListener("change", detecteSelect1);
        function detecteSelect1() {
            var nbrselect = select1.selectedIndex;
            var selectedOption = select1.options[nbrselect];
            var variableInstru = selectedOption.value;
            
            WhereInTheForm ="inprof";

            xhttpProf.open("GET", "changeSelect.php?instrument="+variableInstru, true);
            xhttpProf.send();
        }

        


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



        select2.addEventListener("change", detecteSelect2);
        function detecteSelect2() {
            var nbrselect = select2.selectedIndex;
            var selectedOption = select2.options[nbrselect];
            var variableProf = selectedOption.value;
            
            console.log(variableProf);

            WhereInTheForm ="indate";

            xhttpProf.open("GET", "changeSelect.php?prof="+variableProf, true);
            xhttpProf.send();
        }




        function changeSelect3(allDate){


            var today = new Date().toISOString().split('T')[0];
            select3.setAttribute('min', today);




            // Récupération des éléments du calendrier et des jours disponibles
            
            // var availableDays = ['lundi', 'mercredi'];

            // // Désactivation des dates qui ne correspondent pas aux jours disponibles
            // $(select3).find('.datepicker td').not('.disabled').each(function() {
            //     var date = new Date($(this).data('date'));
            //     var day = date.toLocaleDateString('fr-FR', { weekday: 'long' });
            //     if (availableDays.indexOf(day) === -1) {
            //         $(this).addClass('disabled');
            //     }
            // });


            select3.style.display = "block";
            label3.style.display = "block";

            

        }




    </script>

  </body>
</html>