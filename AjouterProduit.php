 <?php
 include("connexion.php");
 session_start();
 if(isset($_POST['enregistrer'])){
		$j=0;                          // $j est l'indice des produits enregistrer
	/*insertion dans la table produit*/
      $requete="INSERT INTO produit SET nomproduit='".$_POST['nomProduit']."',quantite=".$_POST['quantite'].",prixvente=".$_POST['prixvente'].",prixventemin=".$_POST['prixVenteMin'].",quantiteseuil=".$_POST['quantiteMin'].",description='".$_POST['description']."',uom='".$_POST['uom']."',urlPhoto='".$_POST['urlPhoto']."'";
      $resultat=$connexion->query($requete);
	  if($resultat){
	     $i='true';
		 $j++;
	  }
	 

}
 function creationPanier(){
        if (!isset($_SESSION['panierProduit'])){
           $_SESSION['panierProduit']=array();
           $_SESSION['panierProduit']['nomProduit'] = array();
           $_SESSION['panierProduit']['prixvente'] = array();
           $_SESSION['panierProduit']['prixVenteMin'] = array();
		   $_SESSION['panierProduit']['quantite'] = array();
           $_SESSION['panierProduit']['quantiteMin'] = array();
            
        }
       return true;
     }// fin de la fonction  creationPanier
	 function ajouterPanier(){
        if (isset($_POST['enregistrer']) && creationPanier() )
	        // ajout d'un produit dans le panier
			if(!array_search($_POST['nomProduit'],  $_SESSION['panierProduit']['nomProduit'])){

            array_push( $_SESSION['panierProduit']['nomProduit'],$_POST['nomProduit']);
            array_push( $_SESSION['panierProduit']['prixvente'],$_POST['prixvente']);
            array_push( $_SESSION['panierProduit']['prixVenteMin'],$_POST['prixVenteMin']);
			array_push( $_SESSION['panierProduit']['quantite'],$_POST['quantite']);
            array_push( $_SESSION['panierProduit']['quantiteMin'],$_POST['quantiteMin']);
             
		    return true;
           }else// fin de   if (isset($_POST['ajouterFacture']))
              return true;
      }// fin de la fonction  ajouterPanier(){
	 
	
 include("meta/meta.html");
 include("header/header.html");
 include("leftSide/left.html");
 ?>
 <div class="content">
 <div class="f9 upp"> 

    <div id="contact-form">
	     <div>
		   <h2>ENREGISTRER UN PRODUIT</h2> <br> 
		 </div>
		 

		 <form method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
		   <div>		          
		        <label for="subject">
		          <label for=" ">
		      	    <span style="color:red" class="required"> 
					  <?php 
						if(isset($_POST['enregistrer'])){
			                if($i='true')
						        echo"produit enregistré avec succès";
								 else
								    echo"erreur d'enregistrement";
							}?>
					</span> 
		      	     
		          </label> 
		        </label>
			</div>
		     
			<div>		          
		      <label for="subject">
		          <label for=" ">
		      	     <span class="required">Nom du produit:: *</span> 
		      	     <input type="text" id="name" name="nomProduit" value="" placeholder="entrer nom du produit" required="required" tabindex="1"   />
		          </label> 
			    </label>
			</div>
			
			<div>
		      <label for=" ">
		      	<span class="required">Prix Vente: *</span> 
		      	<input type="numeric" id="name" name="prixvente" value="" placeholder="entrer le prix vente" required="required" tabindex="1"   />
		      </label> 
			</div>
			
			<div>
		      <label for=" ">
		      	<span class="required">Prix Vente Minimal: *</span> 
		      	<input type="numeric" id="name" name="prixVenteMin" value="" placeholder="entrer le prix vente minimal" required="required" tabindex="1"   />
		      </label> 
			</div>
			<div>
		      <label for=" ">
		      	<span class="required">Quantité: *</span> 
		      	<input type="numeric" id="" name="quantite" value="" placeholder="entrer la quantité minimal du produit en stock" required="required" tabindex="1"   />
		      </label> 
			</div>
			<div>
		      <label for=" ">
		      	<span class="required">Quantité Minimal en Stock: *</span> 
		      	<input type="numeric" id="" name="quantiteMin" value="" placeholder="entrer la quantité" required="required" tabindex="1"   />
		      </label> 
			</div>
			<div>
		      <label for=" ">
		      	<span class="required">Indicatif UOM:</span> 
		      	<input type="text" id="name" name="uom" value="" placeholder="entrer le lieu de fabrication"   tabindex="1"   />
		      </label> 
			</div>
			<div>
		      <label for=" ">
		      	<span class="required">Photo du Produit</span> 
		      	<input type="file" id="name" name="urlPhoto" value=""     tabindex="1"   />
		      </label> 
			</div>
			<div>
		      <label for=" ">
		      	<span class="required">Description du Produit: *</span> 
		      	<input type="textarea" id="name" name="description" value="" placeholder="ici la description du Produit" required="required" tabindex="1"   />
		      </label> 
			</div>
			 
			 
			<div>		           
		      <button name="enregistrer" type="submit" id="submit" >Enregistrer</button> 
			  
			</div>
		 </form>
		   
		   <br> <br> <br> 
		   <fieldset>
		      <legend> Produit Enregistrer </legend >
		        <table border="4">
		          <tr>
			        <td >N° </td >
			        <td >Nom </td >
				    <td >Prix Vente </td>
				    <td >Prix Vente Minimal </td>
				    <td >Quantite Stock </td >
				    <td >Quantite Stock Minimal </td>
				  </tr ><br><br>
			    <?php 
					if (ajouterPanier()){
						$nbArticles=count($_SESSION['panierProduit']['nomProduit']);
						if ($nbArticles <= 0){
							 
							}else
								for ($i=0 ;$i < $nbArticles ; $i++){
								     $j=$i+1;
									echo "<tr>";
									echo "<td>".$j."</ td>";
									echo "<td>". ($_SESSION['panierProduit']['nomProduit'][$i])."</ td>";
									echo "<td>". ($_SESSION['panierProduit']['prixvente'][$i])."</ td>";
									echo "<td>". ($_SESSION['panierProduit']['prixVenteMin'][$i])."</td>";
									echo "<td>". ($_SESSION['panierProduit']['quantite'][$i])."</ td>";
									echo "<td>". ($_SESSION['panierProduit']['quantiteMin'][$i])."</td>";
									echo "</tr>";
					            } // fin de for           
					} ?>
		
		       </table ><br> <br><br><br>
		    </fieldset >

	    </div>
    </div>
 </div> 
    
<?php
 include("right/right.html");
 ?>	 			 
 
		 
 
 
		