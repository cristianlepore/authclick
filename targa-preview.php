<?php

include 'dbConfig.php';
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {

    // PRENDO L'UTIMO VALORE INSERITO IN FOTOGRAFIA COME PREVIEW DEL CODICE IDENTIFICATIVO DELL'OPERA
    $result = $db->query(" SELECT MAX(`id`) FROM `Fotografia` ");
    $row = mysqli_fetch_row($result);
    $lastValue = (int)$row[0]+1;

    $zero = (int)"0";
    // RITORNO IL VALORE E GLI INSERISCO DOPO IL TRATTINO IL NUMERO DI TRANSAZIONI CHE INIZIALMENTE SARANNO SEMPRE ZERO
    echo $lastValue."-".$zero;

}
 
// close connection
mysqli_close($db);
?>