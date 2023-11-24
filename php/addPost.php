<?php

    if(isset($_POST["submit"])){
        session_start();
        require_once "./dbh.php";

        $title = $_POST["Title"];
        $post = $_POST["post"];
        $user = $_SESSION["username"];

        //date formatting
        date_default_timezone_set('Europe/London');
        $date = date("Y-m-d H:i:s");

        //sql query
        $sql = "SELECT userID FROM users WHERE email=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $id = $row['userID'];
        $_SESSION["userID"] = $id;


        $sql = "INSERT INTO blogposts(userID, title, post, datePosted)
        VALUES ('$id', '$title', '$post', '$date')";

        try{
            mysqli_query($conn, $sql);
        }
        catch(mysqli_sql_exception){
            
        }
        
        //mysqli_close($conn);
        header('location: ./blog.php');
        exit();
    }
    // elseif (isset($_POST["preview"])){
    //     session_start();
    //     require_once "./dbh.php";

    //     $title = $_POST["Title"];
    //     $post = $_POST["post"];
    //     $user = $_SESSION["username"];
    // }

?>