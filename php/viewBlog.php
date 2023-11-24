<?php 
    //makes connection to database
    
    function writeAll(){
        require_once "./dbh.php";
        

        //setting date
        date_default_timezone_set('Europe/London');
        
        //get dates
        $query = "SELECT blogID, userID, title, post, datePosted FROM blogposts";
        $result = $conn->query($query);

        // Fetch the results into an associative array
        $results = $result->fetch_all(MYSQLI_ASSOC);
    
        // sort in newest first order
        usort($results, function($a, $b) {
            $dateA = new DateTime($a['datePosted']);
            $dateB = new DateTime($b['datePosted']);
            return $dateB <=> $dateA;
        });


        //output in grid format with sorted content
        echo '<div class="container">';
        foreach ($results as $result) {
            //getting poster's name
            $userPostID = $result['userID'];

            $sql = "SELECT firstName, lastName FROM users where userID=$userPostID";
            $nameResult = $conn->query($sql);
            $nameResultArr = $nameResult->fetch_all(MYSQLI_ASSOC);
            if (count($nameResultArr) > 0) {
                $firstName = $nameResultArr[0]['firstName'];
                $lastName = $nameResultArr[0]['lastName'];
            }
            else {
                $firstName = "";
                $lastName = "";
            }
            
            
            //outputting post onto screen
            echo '<div class="blogData">';

            echo '<div class="date">';
            $date = $result["datePosted"];
            $newDate = date('d-m-Y H:i a', strtotime($date));
            echo "<p>" . "$newDate" . "</p>";
            echo "<hr>";
            echo '</div>';

            echo "<div class='name'>";
            if($firstName !== ""){
                echo "<p>" . $firstName . " ". $lastName. "</p>";
            }
            echo "</div>";

            echo '<div class="blogTitle">';
            echo  "<h2>" . $result["title"] . "</h2>";
            echo "<hr>";
            echo '</div>';

            echo '<div class="blogPost">';
            echo  "<p>" . $result['post'] . "</p>";
            echo '</div>';

            
            echo '<div class="comments">';
            echo "<h2>Comments </h2>";
            echo '<hr>';
                //SQL query for comments
                $blgID = $result["blogID"];
                $commentsQuery = "SELECT post_comments, commentsID FROM comments WHERE blogID=$blgID";
                $commentsQueryResult = $conn->query($commentsQuery);
                $cmmntCount = mysqli_num_rows($commentsQueryResult);
                $commentArr = $commentsQueryResult->fetch_all(MYSQLI_ASSOC);
                $index = 0;
                
                while($cmmntCount > 0){
                    
                    $userComment = $commentArr[$index]["post_comments"];
                    $commentID = $commentArr[$index]["commentsID"];
                    
                    echo "$userComment" . "<br>";

                    if($_SESSION["username"] === "admin@webtechminiproject.com"){
                        echo '<form action="./commentAdd.php" method="post">';
                        echo "<input type='hidden' name='cmntID' value='$commentID'>";
                        echo '<input type="submit" name="delete" value="Delete" class="deleteBtn">';
                        echo '</form>';
                    }
                    
                    $cmmntCount --;
                    $index ++;
                }           

            echo '</div>';
            
            if(isset($_SESSION["username"])){
                echo '<div class="addComment">';
                    echo "<form action= './commentAdd.php' method='post'>";
                        echo '<input type="text" name="commentInput" placeholder="Add Comments" class="commentText">';
                        echo "<input type='hidden' name='blogID' value='$blgID'>";
                        echo "<input type='submit' name='submit' value='Add Comment'>";
                    echo '</form>';            
                echo '</div>';            
            }
            echo '</div>';  
                      
        }
        echo '</div>';
    }
    

    function writeMonths($month){
        require_once "./dbh.php";

        //setting date
        date_default_timezone_set('Europe/London');
        
        //get dates
        $query = "SELECT blogID, userID, title, post, datePosted FROM blogposts WHERE datePosted";
        if ($month === "All"){
            $query = "SELECT blogID, userID, title, post, datePosted FROM blogposts WHERE datePosted";
        }  
        else {
            $query = "SELECT blogID, userID, title, post, datePosted FROM blogposts WHERE MONTH(datePosted)=$month";
        }
        
        $result = $conn->query($query);

        // Fetch the results into an associative array
        $results = $result->fetch_all(MYSQLI_ASSOC);
    
        // sort in newest first order
        usort($results, function($a, $b) {
            $dateA = new DateTime($a['datePosted']);
            $dateB = new DateTime($b['datePosted']);
            return $dateB <=> $dateA;
        });


        //output in grid format with sorted content
        echo '<div class="container">';
        foreach ($results as $result) {
            //getting poster's name
            $userPostID = $result['userID'];

            $sql = "SELECT firstName, lastName FROM users where userID=$userPostID";
            $nameResult = $conn->query($sql);
            $nameResultArr = $nameResult->fetch_all(MYSQLI_ASSOC);
            if (count($nameResultArr) > 0) {
                $firstName = $nameResultArr[0]['firstName'];
                $lastName = $nameResultArr[0]['lastName'];
            }
            else {
                $firstName = "";
                $lastName = "";
            }
            
            
            //outputting post onto screen
            echo '<div class="blogData">';

            echo '<div class="date">';
            $date = $result["datePosted"];
            $newDate = date('d-m-Y H:i a', strtotime($date));
            echo "<p>" . "$newDate" . "</p>";
            echo "<hr>";
            echo '</div>';

            echo "<div class='name'>";
            if($firstName !== ""){
                echo "<p>" . $firstName . " ". $lastName. "</p>";
            }
            echo "</div>";

            echo '<div class="blogTitle">';
            echo  "<h2>" . $result["title"] . "</h2>";
            echo "<hr>";
            echo '</div>';

            echo '<div class="blogPost">';
            echo  "<p>" . $result['post'] . "</p>";
            echo '</div>';

            echo '<div class="comments">';
                echo "<h2>Comments </h2>";
                //SQL query for comments
                $blgID = $result["blogID"];
                $commentsQuery = "SELECT post_comments, commentsID FROM comments WHERE blogID=$blgID";
                $commentsQueryResult = $conn->query($commentsQuery);
                $cmmntCount = mysqli_num_rows($commentsQueryResult);
                $commentArr = $commentsQueryResult->fetch_all(MYSQLI_ASSOC);
                $index = 0;
                
                while($cmmntCount > 0){

                    echo "<div class='eachComment'>";
                    $userComment = $commentArr[$index]["post_comments"];
                    $commentID = $commentArr[$index]["commentsID"];
                    
                    echo "$userComment". "<br>";

                    if($_SESSION["username"] === "admin@webtechminiproject.com"){
                        echo '<form action="./commentAdd.php" method="post">';
                        echo "<input type='hidden' name='cmntID' value='$commentID'>";
                        // echo "<input type='hidden' name='blgID' value='$blgID'>";
                        // echo "<input type='hidden' name='cmnt' value='$userComment'>";
                        echo '<input type="submit" name="delete" value="Delete">';
                        echo '</form>';
                    }
                    
                    $cmmntCount --;
                    $index ++;
                    echo '</div>';
                }           

            echo '</div>';

            
            if(isset($_SESSION["username"])){
                echo '<div class="addComment">';
                    echo "<form action= './commentAdd.php' method='post'>";
                        echo '<input type="text" name="commentInput" placeholder="Add Comments">';
                        echo "<input type='hidden' name='blogID' value='$blgID'>";
                        echo "<input type='submit' name='submit' value='Add Comment'>";
                    echo '</form>';            
                echo '</div>';         
            }
            
            echo '</div>';            
        }
        
        echo '</div>';
    }   
?>