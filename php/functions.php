<?php 
    function emptyInputSignup($username, $pwd){
        $result;
        if (empty($username) || empty($pwd)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function userExists($conn, $username){
        
        $sql = "SELECT * FROM users WHERE email = ?;";

        //stmt is a prepared stmt to prevent sql injection
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../html/register.html?error=stmtfail");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($resultData)){
            return $row;
            // return true;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
        
    }
?>