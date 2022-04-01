<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$mail = validate($_POST['mail']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=Nom d'utilisateur requis&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Mot de passe requis&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Confirmer votre mot de passe&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Veuillez entrer votre nom&$user_data");
	    exit();
	}
	else if(empty($mail)){
        header("Location: signup.php?error=Veuillez entrer une adresse mail&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=Votre mot de passe ne corespond pas&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' OR mail='$mail'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Le nom d'utilisateur ou l'adresse mail est déja utilisé &$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, name, mail) VALUES('$uname', '$pass', '$name', '$mail')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Votre compte a bien été créer");
	         exit();
           }else {
	           	header("Location: signup.php?error=Erreur inconnue ! &$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}