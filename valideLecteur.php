//amine EEJORFI


<?php 	

	$conn = new mysqli("localhost","root","","librairie");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$done = 0;
	if(isset($_POST['enregistrer'])){
		$num = $_POST['num'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$adresse = $_POST['adresse'];
		$ville = $_POST['ville'];
		$code_postal = $_POST['code_postal'];
		$mot_de_passe = $_POST['password'];

		if ($num&&$nom&&$prenom&&$adresse&&$ville&&$code_postal&&$mot_de_passe ) 
		{
			if ( (preg_match('`^[0-9]{1,4}$`', $num)) ) 
			{
				if ( (preg_match('`^[a-zA-Z ]{3,22}$`', $nom)) && (preg_match('`^[a-zA-Z ]{3,22}$`', $prenom)) && (preg_match('`^[a-zA-Z ]{3,22}$`', $ville))) 
				{
					if ( (preg_match('`^[0-9]{4,9}$`', $code_postal)) ) 
					{
							$stm = $conn->prepare("INSERT INTO lecteurs VALUES(?,?,?,?,?,?,?)");
							$stm->bind_param("sssssss",$num,$nom,$prenom,$adresse,$ville,$code_postal,$mot_de_passe);
							$stm->execute();
							$done = 1;
					}
					else
					{
						$erreur = '<h3 style="color:red;">Votre code postal doit contient des chiffres</h3>';
					}
				}
				else
				{
					$erreur = '<h3 style="color:red;">Le nom,prenom et la ville doit contient des lettres</h3>';		
				}
			}
			else
			{
				$erreur = '<h3 style="color:red;">Votre num doit contient des chiffres</h3>';
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
	<title>valideLecteur</title>
</head>
<body>
	<h2>Validation d'un lecteur</h2>
	<hr>
	<?php if($done == 1){?>
	<table>
		<tr>
			<td>Num</td>
			<td style="color: green"><?php echo ": $num"; ?></td>
		</tr>
		<tr>
		<tr>
			<td>Nom</td>
			<td style="color: green"><?php echo ": $nom"; ?></td>
		</tr>
		<tr>
			<td>Prenom</td>
			<td style="color: green"><?php echo ": $prenom"; ?></td>
		</tr>
		<tr>
			<td>Adresse</td>
			<td  style="color: green"><?php echo ": $adresse"; ?></td>
		</tr>
		<tr>
			<td>Ville</td>
			<td  style="color: green"><?php echo ": $ville"; ?></td>
		</tr>
		<tr>
			<td>Code Postal</td>
			<td  style="color: green"><?php echo ": $code_postal"; ?></td>
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
	<a href="lecteurForm.php">Retourner a la page lecteurForm</a>
	<?php } ?>
	<?php if($done==1){ ?>
	<p>Vous etes enregitré dans la base de la bibliothèque,<br>vous avez maintenant la possibilté de resérver des livres ou vous <a href="login.php">identifier ici .</a></p>
	<?php } ?>
</body>
</html>