<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'dbConfig.php';

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){

    $idEstero = $_REQUEST["term"];

    // Prepare a select statement
    $result = $db->query("SELECT `id` FROM `Utente` WHERE `Codice_fiscale`='$idEstero' ");
    if($result->num_rows > 0) {
        $result = $db->query("SELECT MAX(`id`) FROM `Utente` ");
        $row = mysqli_fetch_row($result);
        echo $row[0]+1;
    } 
    else echo "0";
}
 
// close connection
mysqli_close($db);


?>