<?php

function autoriAcquirenti($nome, $cognome, $codFiscale, $luogoNascita, $tipologia){
    
    include 'dbConfig.php';

    // Check connection
    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if($tipologia == "Tutti"){
        if($codFiscale == '%' && $luogoNascita == '%')
            $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia`, `Partita_IVA` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' ";
        else if($codFiscale != '%' && $luogoNascita == '%')
            $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia`, `Partita_IVA` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Codice_fiscale LIKE '$codFiscale' ";
        else if($codFiscale == '%' && $luogoNascita != '%')
            $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia`, `Partita_IVA` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Luogo_nascita LIKE '$luogoNascita' ";
        else 
            $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia`, `Partita_IVA` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Luogo_nascita LIKE '$luogoNascita' AND Codice_fiscale LIKE '$codFiscale' ";
    } else {
        if($codFiscale == '%' && $luogoNascita == '%')
            $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia`, `Partita_IVA` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Tipologia = '$tipologia' ";
        else if($codFiscale != '%' && $luogoNascita == '%')
            $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia`, `Partita_IVA` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Codice_fiscale LIKE '$codFiscale' AND Tipologia = '$tipologia' ";
        else if($codFiscale == '%' && $luogoNascita != '%')
            $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia`, `Partita_IVA` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Luogo_nascita LIKE '$luogoNascita' AND Tipologia = '$tipologia' ";
        else 
            $autoriAcquirenti = " SELECT `Nome`, `Cognome`, `Giorno_nascita`, `Mese_nascita`, `Anno_nascita`, `Luogo_nascita`, `Giorno_morte`, `Mese_morte`, `Anno_morte`, `Luogo_morte`, `Codice_fiscale`, `Tipologia`, `Partita_IVA` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Luogo_nascita LIKE '$luogoNascita' AND Codice_fiscale LIKE '$codFiscale' AND Tipologia = '$tipologia' ";
    }

    // close connection
    mysqli_close($db);

    return $autoriAcquirenti;

}

?>