<?php
 session_start();
 include("connexion.php");
 include("fonction.php");
 
 $prixvente=0;
  
     

	
	 
   function creationPanier(){
        if (!isset($_SESSION['panier'])){
           $_SESSION['panier']=array();
           $_SESSION['panier']['nomProduit'] = array();
           $_SESSION['panier']['prixvente'] = array();
           $_SESSION['panier']['quantite'] = array();
		   $_SESSION['client'] =""; //Variable de session pour le nomclient
             
		}
       return true;
     }// fin de la fonction  creationPanier
	 
	 
	function ajouterPanier(){
        if (isset($_POST['ajouter']) && creationPanier() ){
		     if(isset($_SESSION['client']))
				$_SESSION['client']=$_POST['nomclient'];
	        // ajout d'un produit dans le panier
			if(!array_search($_POST['nomProduit'],  $_SESSION['panier']['nomProduit'])){

            array_push( $_SESSION['panier']['nomProduit'],$_POST['nomProduit']);
            array_push( $_SESSION['panier']['prixvente'],$_POST['prixvente']);
            array_push( $_SESSION['panier']['quantite'],$_POST['quantite']);
			 return true;
           }else// fin de   if (isset($_POST['ajouterFacture']))
              return true;
		}
      }// fin de la fonction  ajouterPanier(){
	   
     /*selection des noms de  produits*/
      $requete3="select  nomproduit  from produit ";  
      $resultat3=$connexion->query($requete3);

	 
 include("meta/meta.html");
 include("header/header.html");
 include("leftSide/left.html");
 ?>
<div class="content">
<div class="f9 upp"> 
<div id="contact-form">
	<div>
		<h2>VENDRE UN PRODUIT</h2> <br> 
		 
	</div>
		<div>		          
		      <label for="subject">
		         
			       
		      	    <span style="color:red" class="required"> 
						<?php
							if (isset($_POST['ajouter'])){
									/*if(quantite($_POST['nomProduit'])< $_POST['quantite']){
											echo" le stock actuel est insuffisant pour cette demande";
				 	                }else*/
								         echo" ajout bien effectué";
							 }?>
					</span> 
		      	     
		            
		      </label>
			</div>
		 
		 

		   <form method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
		   
		   <div>
		      <label for="name">
		      	<span class="required">Nom Client: *</span> 
		      	<input type="text" id="name" name="nomclient" value=""   tabindex="1" autofocus="autofocus" />
		      </label> 
			</div>  
			<div>		          
		      <label for="subject">
		       Nom du produit:  
			      <select id="subject" name="nomProduit"  tabindex="4">  
			         <?php
					while($donnees3 = mysqli_fetch_assoc($resultat3)){?>
			         <option value="<?php echo $donnees3['nomproduit'];?>"><?php echo $donnees3['nomproduit'];?></option>
			         <?php }?> 
			      </select>
		      </label>
			</div>
			<div>
		      <label for=" ">
		      	<span class="required">Prix Unitaire: *</span> 
		      	<input type="numeric" id="name" name="prixvente" value="<?php echo($prixvente)?>" placeholder="entrer le prix unitaire" required="required" tabindex="1" autofocus="autofocus" />
		      </label> 
			</div>
			<div>
		      <label for=" ">
		      	<span class="required">Quantité: *</span> 
		      	<input type="numeric" id="quantite" name="quantite" value="" placeholder="entrer la quantité" required="required" tabindex="1" autofocus="autofocus" />
		      </label> 
			</div>
			 
			 
			<div>		           
		      <button name="ajouter" type="submit" id="" >ajouter A La Facture</button> 
			  <button name="annuler" type="submit" id="submit" >ANNULER</button>
			</div>
		   </form>
		   
		   <br> <br> <br> 
		   <fieldset>
		  <legend> Produit de la Facture  </legend >
		   <table border="4">
		      <tr>
			      <td >N° </td >
			      <td >Nom </td >
				  <td >Prix Unitaire </td >
				  <td >Quantite </td >
				   
				  
			  </tr ><br><br>
			  <?php 
					 
					  if (ajouterPanier()){
						$nbArticles=count($_SESSION['panier']['nomProduit']);
						if ($nbArticles <= 0){
							 
							}else
								for ($i=0 ;$i < $nbArticles ; $i++){
								     $j=$i+1;
									echo "<tr>";
									echo "<td>".$j."</ td>";
									echo "<td>". ($_SESSION['panier']['nomProduit'][$i])."</ td>";
									echo "<td>". ($_SESSION['panier']['prixvente'][$i])."</ td>";
									echo "<td>". ($_SESSION['panier']['quantite'][$i])."</td>";
									echo "</tr>";
					            } // fin de for           
					  
					}?>
			   
		
		  </table><br> <br><br><br>
		  <form method="post" action="facture.php" >
			<button name="imprimer" type="submit" id="submit" > AFFICHER FACTURE </button> 
				  
		  <form>
		
		</fieldset >

	</div>
    
</div>
</div>    
    
 			 
<?php
 include("right/right.html");
 ?>	