<?php
    require_once "./dbh.php";

    if(isset($_POST["submit"])){
        $blog = $_POST["blogID"];
        $cmnt = $_POST["commentInput"];
        $addCommmentSQL = "INSERT INTO comments(blogID, post_comments)
        VALUES('$blog', '$cmnt')";

        mysqli_query($conn, $addCommmentSQL);
        header("location: ./blog.php");
    }

    elseif(isset($_POST["delete"])){
        // $blogID = $_POST["blgID"];
        // $comm = $_POST["cmnt"];
        //$deleteCommentSQL = "DELETE FROM comments WHERE blogID=? AND post_comments=?";

        $commID = $_POST["cmntID"];
        $deleteCommentSQL = "DELETE FROM comments WHERE commentsID=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $deleteCommentSQL)){
            header("location: ./php/index.php?error=stmtfail");
            exit();
        }

        //mysqli_stmt_bind_param($stmt, "ss", $blogID, $comm);
        mysqli_stmt_bind_param($stmt, "s", $commID);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        //mysqli_query($conn, $deleteCommentSQL);
        header("location: ./blog.php");
    }
    else {
        header("./blog.php");
    }
?>