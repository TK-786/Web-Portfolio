<?php 
    if (isset($_POST["submit"])){

        //including files
        require_once "dbh.php";
        require_once "functions.php";

        $username = $_POST["username"];
        $pwd = $_POST["password"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        

        if (emptyInputSignup($username, $pwd) !==false){
            header("location: ../html/register.html?error=badInput");
            exit();
        }

        if (userExists($conn, $username)){
            header("location: ../html/register.html?error=userNameTaken");
            exit();
        }

        //sql query to register user
        $sql = "INSERT INTO users (firstName, lastName, email, password)
        VALUES (?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../html/register.html?error=statementfailed" );
            exit();
        }

        $passHash = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, 'ssss', $fname, $lname, $username, $passHash);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../html/login.html?error=none ");
    }

?>