<?php 

	spl_autoload_register(function ($class_name) {
     include "classes/" . $class_name . ".class.php";
    });
    session_start();
    $db = new DBManager();


    //Login User
	 if (isset($_POST['login'])) { 
        //save user to a session if  $db ->getUser doesnt return false
        $LoggingInUser =  $db ->getUser($_POST['username']);
        if ($LoggingInUser !== false) {
           //$_SESSION['user'] = $LoggingInUser; 
           if (password_verify($_POST['password'], $LoggingInUser->getPassword())) {
             $_SESSION['user'] = $LoggingInUser; 
           }else{
            $errLogin = "Sorry ! The username or password you entered is incorrect ";
           }         
        }else{
           $errLogin = "Sorry ! The account entered doesn't exist";
        }

   	 }

     //Logout user
     if (isset($_GET['logout'])) {
            unset($_SESSION['user']);
            header("location: admin_panel.php");
    }  

     


 ?>