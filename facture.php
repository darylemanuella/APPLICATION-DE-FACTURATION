<?php
  session_start(); 
  include("fonction.php");

// enregistrement d'une facture dans la BD
	if (isset($_POST['imprimer'])) {
			if (!PanierVide()){
			$nbArticles=count($_SESSION['panier']['nomProduit']);
						if ($nbArticles <= 0){
							 
							}else
								for ($i=0 ;$i < $nbArticles ; $i++){
								     $j=$i+1;
									 if(insererFacture($_SESSION['client'],rechercherIdEmploye( $_SESSION['nom'],$_SESSION['password'])))
										if(insererListeFacture(rechercherIdFacture($_SESSION['client']),$_SESSION['client'],$_SESSION['panier']['quantite'][$i],$_SESSION['panier']['prixvente'][$i]))
											// decrementons la quantité du produit dans la bd
											if(updateQuantite(quantite($_SESSION['panier']['nomProduit'][$i])-$_SESSION['panier']['quantite'][$i],$_SESSION['panier']['nomProduit'][$i])){
											
											}
											
									   
								} // fin de for
			}
	}  
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>facture produit</title>
    <link rel="stylesheet" href="facture/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="facture/logo.png">
      </div>
      <div id="company">
        <h2 class="name">Agicam Commerce</h2>
        <div>Douala-Cameroun</div>
        <div>698 84 78 95/697 34 43 20</div>
		<div><a href="www.agicamgroupe.com">www.agicamgroupe.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Information du Client:</div>
          <h2 class="name"> <?php echo $_SESSION['client'] ?></h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
        </div>
        <div id="invoice">
          <h1>Numero de Facture:</h1>
          <div class="date">Date de la facture: <?php echo date("Y-m-d H:i:s") ;?> </div>
           
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">No</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">PRIX UNITAIRE</th>
            <th class="qty">QUANTITE</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
		
 	        <?php 
				$total=0;	 
				$nbArticles=count($_SESSION['panier']['nomProduit']);
				if ($nbArticles <= 0){
							 
					}else
						for ($i=0 ;$i < $nbArticles ; $i++){
							 $j=$i+1;
							 $total=$total+($_SESSION['panier']['prixvente'][$i])*$_SESSION['panier']['quantite'][$i];
				 ?>
		
          <tr>
            <td class="no"> <?php echo $j; ?></td>
            <td class="desc"><h3><?php echo($_SESSION['panier']['nomProduit'][$i]); ?></h3> </td>
            <td class="unit"><?php echo($_SESSION['panier']['prixvente'][$i]); ?></td>
            <td class="qty"><?php echo($_SESSION['panier']['quantite'][$i]); ?> </td>
            <td class="total"><?php echo($_SESSION['panier']['prixvente'][$i])*$_SESSION['panier']['quantite'][$i];?> </td>
          </tr>
          <?php } ?> 
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Montant Payé</td>
            <td><?php echo $total; ?></td>
          </tr>
           
           
        </tfoot>
      </table>
      <div id="thanks"><a href="vendreProduit.php" onclik=  >Merci de Votre Fidelité</a></div>
      <div id="notices">
        <div> </div>
        <div class="notice"><?php echo '<a href="javascript:window.print()"  >IMPRIMER  </a>' ;unset($_SESSION['panier']);?></div>
		   
      </div>
    </main>
    <footer>
 
    </footer>
  </body>
</html>