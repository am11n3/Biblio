<?php 
echo  "Le lecteur n° ".$_SESSION['numL']." est reconnu";
echo '<h4>Voici la liste des ouvrages disponibles a la reservation</h4>';
$livres=$conn->prepare("SELECT livcode,livnomaut,livprenomaut,livtitre,livcategorie,livISBN FROM livres WHERE livdejareserve='0'");
	$livres->execute();

	if($livres->rowCount()>0)
	{
		echo "<table align='' border='1.5' >";
		echo "<tr align='center' style='color: red;'>";
			echo "<td>Code du livre</td>";
			echo "<td>Nom de l'auteur</td>";
			echo "<td>Prénom de l'auteur</td>";		
			echo "<td>Titre du livre</td>";
			echo "<td>Catégorie</td>";
			echo "<td>Numéro ISBN</td>";
			echo "<td></td>";
		echo "</tr>";
		while ( $row = $livres->fetch() )
		{
		echo "<tr align=''>";
			echo  "<td>".$row["livcode"]."</td>";
	        echo  "<td>".$row["livnomaut"]."</td>";
	        echo  "<td>".$row["livprenomaut"]."</td>";
	        echo  "<td>".$row["livtitre"]."</td>";
	        echo  "<td>".$row["livcategorie"]."</td>";
	        echo  "<td>".$row["livISBN"]."</td>";
	        echo "<td><a href=\"reserverLivre.php?code=$row[0]&nom=$row[1]&pre=$row[2]&titre=$row[3]&categorie=$row[4]&isbn=$row[5]\">Reserver</a></td>";
	    echo "</tr>";
		}
		
		echo "</table>";
	}

	echo '<h4>Voici la liste de vos réservations</h4>';
	echo "<table align='' border='1.5' >";
		echo "<tr align='center' style='color: red;'>";
			echo "<td>Code du livre</td>";
			echo "<td>Nom de l'auteur</td>";
			echo "<td>Prénom de l'auteur</td>";		
			echo "<td>Titre du livre</td>";
			echo "<td>Catégorie</td>";
			echo "<td>Numéro ISBN</td>";
		echo "</tr>";
?>