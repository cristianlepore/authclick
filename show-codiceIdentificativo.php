<?php

include 'dbConfig.php';
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {

    // PRENDO L'UTIMO VALORE INSERITO IN FOTOGRAFIA COME PREVIEW DEL CODICE IDENTIFICATIVO DELL'OPERA
    $result = $db->query(" SELECT `Codice_identificativo` FROM `Fotografia` WHERE `id` IN ( SELECT MAX(`id`) FROM `Fotografia`) ");
    $row = mysqli_fetch_row($result);
    $codiceIdentificativo = $row[0];

    echo $codiceIdentificativo;

}
 
// close connection
mysqli_close($db);
?>