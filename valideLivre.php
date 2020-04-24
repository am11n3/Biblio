<?php  
	$conn = new mysqli("localhost","root","","librairie");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$done = 0;
	if(isset($_POST['enregistrer'])){
		$nom_auteur = $_POST['nom_auteur'];
		$prenom_auteur = $_POST['prenom_auteur'];
		$titre_livre = $_POST['titre'];
		$categorie = $_POST['categorie'];
		$isbn = $_POST['isbn'];
		$code_livre = substr($nom_auteur, 0, 2).substr($prenom_auteur, 0, 2).substr($categorie, 0, 2).substr($isbn, -2);

		if ($nom_auteur&&$prenom_auteur&&$titre_livre&&$categorie&&$isbn)
		{
			if ( (preg_match('`^[a-zA-Z ]{3,22}$`', $nom_auteur)) && (preg_match('`^[a-zA-Z ]{3,22}$`', $prenom_auteur)) && (preg_match('`^[a-zA-Z ]{3,22}$`', $titre_livre)) ) 
			{
				if ( (preg_match('`^[0-9]{6,11}$`', $isbn)) ) 
				{
					$stm = $conn->prepare("INSERT INTO livres VALUES(?,?,?,?,?,?,'0')");
					$stm->bind_param("ssssss",$code_livre,$nom_auteur,$prenom_auteur,$titre_livre,$categorie,$isbn);
					$stm->execute();
					$done = 1;
				}
				else
				{
					$erreur = '<h3 style="color:red;">Le Numéro ISBN doit contient juste des chiffres</h3>';
				}
			}
			else
			{
				$erreur = "<h3 style='color:red;'>Le nom et prenom d'auteur et le titre doit contient des lettres</h3>";
			}
		}
		else
		{
			$erreur = '<h3 style="color:red;"> Veuillez remplir tous les champs </h3>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>valideLivre</title>
</head>
<body>
	<h2>Validation d'un livre</h2>
	<br>
	<?php if($done == 1){?>
	<table>
		<tr>
			<td>Nom de l'auteur</td>
			<td style="color: green"><?php echo ": $nom_auteur"; ?></td>
		</tr>
		<tr>
		<tr>
			<td>Prénom de l'auteur</td>
			<td style="color: green"><?php echo ": $prenom_auteur"; ?></td>
		</tr>
		<tr>
			<td>Titre du livre</td>
			<td style="color: green"><?php echo ": $titre_livre"; ?></td>
		</tr>
		<tr>
			<td>Catégorie</td>
			<td  style="color: green"><?php echo ": $categorie"; ?></td>
		</tr>
		<tr>
			<td>Numéro ISBN</td>
			<td  style="color: green"><?php echo ": $isbn"; ?></td>
		</tr>
		<tr>
			<td>Code du livre</td>
			<td style="color: green"><?php echo ": $code_livre"; ?></td>
		</tr>
	</table>
	<?php } ?>
	<?php 
		if(isset($erreur))
		{
			echo $erreur;
		}
	?>
	<?php if($done==0){ ?>
	<a href="livreForm.php">Retourner a la page livreForm</a>
	<?php } ?>
	<?php if($done==1){ ?>
	<a href="login.php">Aller a la page de connexion</a>
	<?php } ?>
</body>
</html>
