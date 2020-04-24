<?php 
	session_start();

	if(! isset($_SESSION['livreCode'])) $_SESSION['livreCode']="";
		$code = $_GET['code'];
		$nom = $_GET['nom'];
		$prenom = $_GET['pre'];
		$titre = $_GET['titre'];
		$categorie = $_GET['categorie'];
		$isbn = $_GET['isbn'];
		$_SESSION['livreCode']=$_SESSION['livreCode']."/".$code;
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reserver un livre</title>
</head>
<body>
	<h2>Reserver un livre</h2>
	Vous désirez réserver le livre suivant : <br><br>
	<table>
		<tr>
			<td>Code du livre</td> <td><?php echo "$code"; ?></td>
		</tr>
		<tr>
			<td>Nom de l'auteur</td> <td><?php echo "$nom"; ?></td>
		</tr>
		<tr>
			<td>Prenom de l'auteur</td> <td><?php echo "$prenom"; ?></td>
		</tr>
		<tr>
			<td>Titre</td> <td><?php echo "$titre"; ?></td>
		</tr>
		<tr>
			<td>Categorie</td> <td><?php echo "$categorie"; ?></td>
		</tr>
		<tr>
			<td>ISBN</td> <td><?php echo "$isbn"; ?></td>
		</tr>
	</table>

</body>
</html>