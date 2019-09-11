<?php

function autoriAcquirenti($nome, $cognome, $codFiscale, $luogoNascita, $tipologia){
    
    include 'dbConfig.php';

    // Check connection
    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if($tipologia == "Tutti"){
        if($codFiscale == '%' && $luogoNascita == '%')
            $autoriAcquirenti = "   SELECT `Utente`.`id`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Utente`.`Codice_fiscale`, `Utente`.`Tipologia` AS `Utente_tipologia`, `Utente`.`Partita_IVA`, `Fotografia`.`Titolo`, `Fotografia`.`Codice_identificativo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Prezzo`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Foto`.`Codice_identificativo` AS `Foto_acquistata`, `Possiede`.`Utente_id` AS `Acquirente`, `Trasferimento`.`id` AS `id_trasferimento`, `Trasferimento`.`id_venditore` AS `Venditore`
                                    FROM `Utente` 
                                    LEFT JOIN `Fotografia` 
                                    ON `Utente`.`id` = `Fotografia`.`Autore_id` 
                                    LEFT JOIN `Trasferimento`
                                    ON `Utente`.`id` = `Trasferimento`.`id_acquirente`
                                    LEFT JOIN `Fotografia` AS `Foto`
                                    ON `Trasferimento`.`Fotografia_id` = `Foto`.`id`
                                    LEFT JOIN `Possiede`
                                    ON `Trasferimento`.`Fotografia_id` = `Possiede`.`Fotografia_id`
                                    WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome'
                                    ORDER BY `Utente`.`id` ASC 
                                ";

        else if($codFiscale != '%' && $luogoNascita == '%')
            $autoriAcquirenti = "   SELECT `Utente`.`id`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Utente`.`Codice_fiscale`, `Utente`.`Tipologia` AS `Utente_tipologia`, `Utente`.`Partita_IVA`, `Fotografia`.`Titolo`, `Fotografia`.`Codice_identificativo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Prezzo`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Foto`.`Codice_identificativo` AS `Foto_acquistata`, `Possiede`.`Utente_id` AS `Acquirente`, `Trasferimento`.`id` AS `id_trasferimento`, `Trasferimento`.`id_venditore` AS `Venditore`
                                    FROM `Utente` 
                                    LEFT JOIN `Fotografia` 
                                    ON `Utente`.`id` = `Fotografia`.`Autore_id` 
                                    LEFT JOIN `Trasferimento`
                                    ON `Utente`.`id` = `Trasferimento`.`id_acquirente`
                                    LEFT JOIN `Fotografia` AS `Foto`
                                    ON `Trasferimento`.`Fotografia_id` = `Foto`.`id`
                                    LEFT JOIN `Possiede`
                                    ON `Trasferimento`.`Fotografia_id` = `Possiede`.`Fotografia_id`
                                    WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Codice_fiscale LIKE '$codFiscale' 
                                    ORDER BY `Utente`.`id` ASC 
                                ";

        else if($codFiscale == '%' && $luogoNascita != '%')
            $autoriAcquirenti = "   SELECT `Utente`.`id`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Utente`.`Codice_fiscale`, `Utente`.`Tipologia` AS `Utente_tipologia`, `Utente`.`Partita_IVA`, `Fotografia`.`Titolo`, `Fotografia`.`Codice_identificativo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Prezzo`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Foto`.`Codice_identificativo` AS `Foto_acquistata`, `Possiede`.`Utente_id` AS `Acquirente`, `Trasferimento`.`id` AS `id_trasferimento`, `Trasferimento`.`id_venditore` AS `Venditore`
                                    FROM `Utente` 
                                    LEFT JOIN `Fotografia` 
                                    ON `Utente`.`id` = `Fotografia`.`Autore_id` 
                                    LEFT JOIN `Trasferimento`
                                    ON `Utente`.`id` = `Trasferimento`.`id_acquirente`
                                    LEFT JOIN `Fotografia` AS `Foto`
                                    ON `Trasferimento`.`Fotografia_id` = `Foto`.`id`
                                    LEFT JOIN `Possiede`
                                    ON `Trasferimento`.`Fotografia_id` = `Possiede`.`Fotografia_id`
                                    WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Luogo_nascita LIKE '$luogoNascita' 
                                    ORDER BY `Utente`.`id` ASC 
                                ";

        else
            $autoriAcquirenti = "   SELECT `Utente`.`id`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Utente`.`Codice_fiscale`, `Utente`.`Tipologia` AS `Utente_tipologia`, `Utente`.`Partita_IVA`, `Fotografia`.`Titolo`, `Fotografia`.`Codice_identificativo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Prezzo`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Foto`.`Codice_identificativo` AS `Foto_acquistata`, `Possiede`.`Utente_id` AS `Acquirente`, `Trasferimento`.`id` AS `id_trasferimento`, `Trasferimento`.`id_venditore` AS `Venditore`
                                    FROM `Utente` 
                                    LEFT JOIN `Fotografia` 
                                    ON `Utente`.`id` = `Fotografia`.`Autore_id` 
                                    LEFT JOIN `Trasferimento`
                                    ON `Utente`.`id` = `Trasferimento`.`id_acquirente`
                                    LEFT JOIN `Fotografia` AS `Foto`
                                    ON `Trasferimento`.`Fotografia_id` = `Foto`.`id`
                                    LEFT JOIN `Possiede`
                                    ON `Trasferimento`.`Fotografia_id` = `Possiede`.`Fotografia_id`
                                    WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Luogo_nascita LIKE '$luogoNascita' AND Codice_fiscale LIKE '$codFiscale' 
                                    ORDER BY `Utente`.`id` ASC 
                                ";

    } else {
        if($codFiscale == '%' && $luogoNascita == '%')
            $autoriAcquirenti = "   SELECT `Utente`.`id`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Utente`.`Codice_fiscale`, `Utente`.`Tipologia` AS `Utente_tipologia`, `Utente`.`Partita_IVA`, `Fotografia`.`Titolo`, `Fotografia`.`Codice_identificativo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Prezzo`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Foto`.`Codice_identificativo` AS `Foto_acquistata`, `Possiede`.`Utente_id` AS `Acquirente`, `Trasferimento`.`id` AS `id_trasferimento`, `Trasferimento`.`id_venditore` AS `Venditore`
                                    FROM `Utente` 
                                    LEFT JOIN `Fotografia` 
                                    ON `Utente`.`id` = `Fotografia`.`Autore_id` 
                                    LEFT JOIN `Trasferimento`
                                    ON `Utente`.`id` = `Trasferimento`.`id_acquirente`
                                    LEFT JOIN `Fotografia` AS `Foto`
                                    ON `Trasferimento`.`Fotografia_id` = `Foto`.`id`
                                    LEFT JOIN `Possiede`
                                    ON `Trasferimento`.`Fotografia_id` = `Possiede`.`Fotografia_id`
                                    WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND `Utente`.`Tipologia` = '$tipologia' 
                                    ORDER BY `Utente`.`id` ASC 
                                ";

        else if($codFiscale != '%' && $luogoNascita == '%')
            $autoriAcquirenti = "   SELECT `Utente`.`id`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Utente`.`Codice_fiscale`, `Utente`.`Tipologia` AS `Utente_tipologia`, `Utente`.`Partita_IVA`, `Fotografia`.`Titolo`, `Fotografia`.`Codice_identificativo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Prezzo`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Foto`.`Codice_identificativo` AS `Foto_acquistata`, `Possiede`.`Utente_id` AS `Acquirente`, `Trasferimento`.`id` AS `id_trasferimento`, `Trasferimento`.`id_venditore` AS `Venditore`
                                    FROM `Utente` 
                                    LEFT JOIN `Fotografia` 
                                    ON `Utente`.`id` = `Fotografia`.`Autore_id` 
                                    LEFT JOIN `Trasferimento`
                                    ON `Utente`.`id` = `Trasferimento`.`id_acquirente`
                                    LEFT JOIN `Fotografia` AS `Foto`
                                    ON `Trasferimento`.`Fotografia_id` = `Foto`.`id`
                                    LEFT JOIN `Possiede`
                                    ON `Trasferimento`.`Fotografia_id` = `Possiede`.`Fotografia_id`
                                    WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Codice_fiscale LIKE '$codFiscale' AND `Utente`.`Tipologia` = '$tipologia' 
                                    ORDER BY `Utente`.`id` ASC 
                                ";

        else if($codFiscale == '%' && $luogoNascita != '%')
            $autoriAcquirenti = "   SELECT `Utente`.`id`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Utente`.`Codice_fiscale`, `Utente`.`Tipologia` AS `Utente_tipologia`, `Utente`.`Partita_IVA`, `Fotografia`.`Titolo`, `Fotografia`.`Codice_identificativo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Prezzo`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Foto`.`Codice_identificativo` AS `Foto_acquistata`, `Possiede`.`Utente_id` AS `Acquirente`, `Trasferimento`.`id` AS `id_trasferimento`, `Trasferimento`.`id_venditore` AS `Venditore`
                                    FROM `Utente` 
                                    LEFT JOIN `Fotografia`
                                    ON `Utente`.`id` = `Fotografia`.`Autore_id`
                                    LEFT JOIN `Trasferimento`
                                    ON `Utente`.`id` = `Trasferimento`.`id_acquirente`
                                    LEFT JOIN `Fotografia` AS `Foto`
                                    ON `Trasferimento`.`Fotografia_id` = `Foto`.`id`
                                    LEFT JOIN `Possiede`
                                    ON `Trasferimento`.`Fotografia_id` = `Possiede`.`Fotografia_id`
                                    WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Luogo_nascita LIKE '$luogoNascita' AND `Utente`.`Tipologia` = '$tipologia'
                                    ORDER BY `Utente`.`id` ASC 
                                ";
        
        else 
            $autoriAcquirenti = "   SELECT `Utente`.`id`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Utente`.`Codice_fiscale`, `Utente`.`Tipologia` AS `Utente_tipologia`, `Utente`.`Partita_IVA`, `Fotografia`.`Titolo`, `Fotografia`.`Codice_identificativo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Prezzo`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Foto`.`Codice_identificativo` AS `Foto_acquistata`, `Possiede`.`Utente_id` AS `Acquirente`, `Trasferimento`.`id` AS `id_trasferimento`, `Trasferimento`.`id_venditore` AS `Venditore`
                                    FROM `Utente` 
                                    LEFT JOIN `Fotografia` 
                                    ON `Utente`.`id` = `Fotografia`.`Autore_id` 
                                    LEFT JOIN `Trasferimento`
                                    ON `Utente`.`id` = `Trasferimento`.`id_acquirente`
                                    LEFT JOIN `Fotografia` AS `Foto`
                                    ON `Trasferimento`.`Fotografia_id` = `Foto`.`id`
                                    LEFT JOIN `Possiede`
                                    ON `Trasferimento`.`Fotografia_id` = `Possiede`.`Fotografia_id`
                                    WHERE Nome LIKE '$nome' AND Cognome LIKE '$cognome' AND Luogo_nascita LIKE '$luogoNascita' AND Codice_fiscale LIKE '$codFiscale' AND `Utente`.`Tipologia` = '$tipologia' 
                                    ORDER BY `Utente`.`id` ASC 
                                ";
    }

    // close connection
    mysqli_close($db);

    return $autoriAcquirenti;

}

function opere($codFotografia) {

    include 'dbConfig.php';

    // Check connection
    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $opere = "SELECT DISTINCT `Codice_identificativo` FROM `Fotografia` WHERE Codice_identificativo LIKE '$codFotografia' ";

    // close connection
    mysqli_close($db);

    return $opere;

}

?>