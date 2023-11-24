<?php 
    if (isset($_POST["submit"])){
        //session_start();
        require_once "dbh.php";
        require_once "./functions.php";

        $username = $_POST["username"]; 
        $password = $_POST["password"];
                
        $usrExist = userExists($conn, $username);
        
        if ($usrExist === false){
            header("location: ../html/login.html?userNotFound");
            exit(); 
        }

        $passCheck = $usrExist["password"];

        $checkedPass = password_verify($password, $passCheck);
        if ($checkedPass === false){
            header("location: ../html/login.html?failedPassword");
            exit();
        }
        else{
            session_start();
            $_SESSION["username"] = $usrExist["email"];
            $_SESSION["userID"] = $usrExist["userID"];
            header("location: ../php/index.php?connection=successful");
            exit();
        }
    }

    else{
        header("location: ../html/login.html");
        exit();
    }
?>