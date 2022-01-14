<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>CONNEXION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="User/css/reset.css">
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="User/css/style.css">
    </head>
    <body>
        
    
        <!-- Mixins-->
        <!-- Pen Title-->
        <div class="pen-title">
          <h1>Bienvenue Chez Agicam Commerce</h1><span>Pen <i class='fa fa-code'></i> by <a href='#'>SoftExpDev</a></span>
        </div>
        <div class="rerun"><a href="">Connexion</a></div>
        <div class="container">
          <div class="card"></div>
          <div class="card">
            <h1 class="title">Login</h1>
            <form action = "connect.php" method="post">
              <div class="input-container">
                <input type="text" id="Username" required="required" name = "nom"/>
                <label for="Username">Nom utilisateur</label>
                <div class="bar"></div>
              </div>
              <div class="input-container">
                <input type="password" id="Password" required="required" name="password"/>
                <label for="Password">Mot de passe</label>
                <div class="bar"></div>
              </div>
              <div class="button-container">
                  <button><span>OK</span></button>
              </div>
             <!--<div class="footer"><a href= 'Inscription.html'>Créer un Compte !!!!</a></div> <!--<a href="#">Forgot your password?</a> <br/> -->-->
            </form>
          </div>
            <div class="card alt">
            <div class="toggle"></div>
           </div>
        </div>
        <!-- Portfolio <a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>-->
        <!-- CodePen  <a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>-->
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

                <script src="js/index.js"></script>
    </body>
</html>
