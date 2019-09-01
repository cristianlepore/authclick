<?php

// Include the database configuration file
include 'dbConfig.php';

// LEGGO IL VALORE CHE GLI VIENE PASSATO DAL FILE PRECEDENTE
$codiceIdentificativo = $_REQUEST["codiceIdentificativo"];


// ********************************************************************
// ************************* AUTENTICA ********************************
// ********************************************************************

// CREO IL JSON DELL'AUTENTICA
// ESTRAGGO I DATI PER L'AUTENTICA DAL DATABASE
$result = $db->query(" SELECT `Fotografia`.`Open_edition`, `Fotografia`.`Artist_proof`, `Fotografia`.`Annotazioni`, `Timbro`, `Fotografia`.`Annotazioni_timbro`, `Fotografia`.`Firma`, `Fotografia`.`Annotazioni_firma`, `Fotografia`.`Titolo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Note_esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Note_tiratura`, `Fotografia`.`Tecnica_stampa`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Supporto`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Fotografia`.`Tecnica_scatto`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`,`Fotografia`.`Codice_identificativo`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente` FROM `Fotografia` INNER JOIN `Utente` ON `Fotografia`.`Autore_id`=`Utente`.`id` WHERE `Fotografia`.`Codice_identificativo`='$codiceIdentificativo' ");

// ESTRAGGO IL NOME DELLA SCHEDA CARICATA. MI SERVIRÀ PER LA VISUALIZZAZIONE
$result2 = $db->query(" SELECT `File`.`id`, `File`.`Path`, `File`.`Nome`
                        FROM `File` 
                            INNER JOIN `Fotografia` ON `Fotografia`.`id` = `File`.`Fotografia_id`
                        WHERE `Fotografia`.`Codice_identificativo`='$codiceIdentificativo' AND `File`.`Tipologia` = 'Scheda' 
                        ORDER BY ID DESC  LIMIT 1;
                    ");

$i = 0;
// METTO I DATI IN JSON
while($row = mysqli_fetch_row($result)){

    $scheda = mysqli_fetch_row($result2);

    // ELIMINO GLI ZERI NON NECESSARI DAL RISULTATO
    for($i = 0; $i < sizeof($row); $i++){
        if($row[$i]=='0' || $row[$i]=='NULL' || $row[$i]=="")
            $row[$i] = '';
    }

    // CREO LA STRINGA JSON
    $myObj->Open_edition = $row[0];
    $myObj->Artist_proof = $row[1];
    $myObj->Annotazioni = $row[2];
    $myObj->Timbro = $row[3];
    $myObj->Annotazioni_timbro = $row[4];
    $myObj->Firma = $row[5];
    $myObj->Annotazioni_firma = $row[6];
    $myObj->Titolo = $row[7];
    $myObj->Lunghezza = $row[8];
    $myObj->Larghezza = $row[9];
    $myObj->Esemplare = $row[10];
    $myObj->Note_esemplare = $row[11];
    $myObj->Tiratura = $row[12];
    $myObj->Note_tiratura = $row[13];
    $myObj->Tecnica_stampa = $row[14];
    $myObj->Giorno_stampa = $row[15];
    $myObj->Mese_stampa = $row[16];
    $myObj->Anno_stampa = $row[17];
    $myObj->Supporto = $row[18];
    $myObj->Giorno_scatto = $row[19];
    $myObj->Mese_scatto = $row[20];
    $myObj->Anno_scatto = $row[21];
    $myObj->Tecnica_scatto = $row[22];

    $myObj->Nome = $row[23];
    $myObj->Cognome = $row[24];
    $myObj->Giorno_nascita = $row[25];
    $myObj->Mese_nascita = $row[26];
    $myObj->Anno_nascita = $row[27];
    $myObj->Luogo_nascita = $row[28];
    $myObj->Giorno_morte = $row[29];
    $myObj->Mese_morte = $row[30];
    $myObj->Anno_morte = $row[31];
    $myObj->Luogo_morte = $row[32];
    $myObj->Codice_identificativo = $row[33];
    $myObj->Nome_stampatore = $row[34];
    $myObj->Cognome_stampatore = $row[35];
    $myObj->Nome_committente = $row[36];

    $myObj->Path_scheda = $scheda[1].$scheda[2];


    // JSON DA INVIARE SU BLOCKCHAIN
    $myJSON = json_encode($myObj);
}

// VALORE DI RITORNO
echo $myJSON;

?>