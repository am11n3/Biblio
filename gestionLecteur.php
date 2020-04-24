<?php
session_start();
	try {
	$conn = new PDO('mysql:host=localhost;dbname=librairie', 'root', '');
	} 
	catch (PDOException $e) 
	{
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    die();
	}
	$vide = 0;
	$done = 0;
	if(isset($_POST['login']))
	{
		$nom = $_POST['nom_lecteur'];
		$mot_de_passe = $_POST['password'];
		if($nom && $mot_de_passe)
		{
			$req = $conn->prepare("SELECT * FROM lecteurs WHERE lecnom = ? AND lecmotdepasse = ?"); 
			$req->execute(array($nom,$mot_de_passe));
			$userexist = $req->rowCount();
			if ($userexist == 1) 
			{
				$userinfo = $req->fetch();
				$_SESSION['numL']= $userinfo['lecnum'];
				$num = $_SESSION['numL'];
				
				$done=1;
			}
			else
			{
				$erreur = "Le lecteur n'est pas reconnu" .'<br>Cliquez <a href="login.php">ici</a> pour tenter une nouvelle identification';
				$vide = 1;
			}
		}
		else
		{
			$erreur = '<h3 style="color:red;"> Veuillez remplir tous les champs </h3>'.
			'<a href="login.php">Retourner a la page d\'authentification </a>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestion du lecteur</title>
</head>
<body>
	<h2>Gestion du lecteur</h2>
<?php 
		if(isset($erreur))
		{
			echo $erreur;
		}
?>
<?php if($vide==1) require 'lecteurForm.php'; ?>
<?php if($done==1){ include'LecReconnu.php'; } ?>
</body>
</html>