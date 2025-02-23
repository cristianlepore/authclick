<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include '../../dbConfig.php';

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){

    $titolo = $_REQUEST["titolo"] . '%';
    $codFotografia = $_REQUEST["codFotografia"] . '%';
    $keywordsFotografia = '%' . $_REQUEST["term"] . '%';

    // Prepare a select statement
    $sql = " SELECT DISTINCT `Keywords` FROM `Fotografia` WHERE Codice_identificativo LIKE '$codFotografia' AND `Fotografia`.`Titolo` LIKE '$titolo' AND `Fotografia`.`Keywords` LIKE '$keywordsFotografia' ";

    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $titolo);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    $keywords = $row['Keywords'];

                    $str_arr = explode (",", $keywords);

                    for($i = 0; $i < count($str_arr); $i++){
                        $str_arr[$i] = strtoupper(trim($str_arr[$i]));

                        if(strpos($str_arr[$i], strtoupper($_REQUEST["term"])) === 0){
                            echo "<p>" . $row["Keywords"] . "</p>";
                            break;
                        }
                    }

                }
            } else{
                ;
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($db);
?>