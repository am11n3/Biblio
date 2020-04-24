<?php 
session_start();
    $d=strtotime("+10 Days");
    $d2=date("Y-m-d ", $d);
    $d1=date("Y-m-d");
    $tab_code=explode("/",$_SESSION['livreCode']);
    $numL=$_SESSION['numL'];
    $L=count($tab_code)-1;
    $code='LIB'.substr($numL, -2).substr($tab_code[$L], -2);
    try {
        $conn = new PDO('mysql:host=localhost;dbname=librairie', 'root', '');
        $sql="INSERT INTO emprunts (empnum, empdate,empdateret,empcodelivre, empnumlect )VALUES ('$code','$d1','$d2','$tab_code[$L]','$numL')";
        $conn->query($sql);
      }catch( SQLException $e){  $e->getMessage();}	
      
  echo"<h1>Confirmation de votre réservation</h1><br>";
  echo"Votre réservation confermée sous numéro : ".$code;
  echo" <br> Date de réservation : ".$d1."<br>";
  echo" Date de retour : <span style=\"color:red\">".$d2."</span><br><br>";
  echo"Vous pouvez revenir à la liste des livres disponible à la réservation  en cliquant <a href=\"gestionLecteur.php\" > ici </a><br>"; 
  echo" LOGOUT <a href=\"logout.php\" > ici </a>"; 

 ?>