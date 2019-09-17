<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include '../../dbConfig.php';

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){

    $titolo = $_REQUEST["term"] . '%';
    $codFotografia = $_REQUEST["codFotografia"] . '%';
    $keywordsFotografia = '%' . $_REQUEST["keywordsFotografia"] . '%';

    // Prepare a select statement
    $sql = " SELECT DISTINCT `Titolo` FROM `Fotografia` WHERE Codice_identificativo LIKE '$codFotografia' AND `Fotografia`.`Titolo` LIKE '$titolo' AND `Fotografia`.`Keywords` LIKE '$keywordsFotografia' ";

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
                    // SE IL NOME COMPARE DUE VOLTE, LO PROPONGO UNA VOLTA SOLTANTO
                    echo "<p>" . $row["Titolo"] . "</p>";
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