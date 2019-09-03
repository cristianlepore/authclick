<?php

function autoriAcquirenti($nome, $cognome){
    
    include 'dbConfig.php';

    // Check connection
    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' ";

    // close connection
    mysqli_close($db);

    return $autoriAcquirenti;

}

?>