<?php

// ************************************************************
// ************************************************************
// ******************** FUNZIONI ******************************
// ************************************************************
// ************************************************************

// FUNZIONE PER PREPARARE LA STRINGA DI DATI PER L'INSERIMENTO SULLA BLOCKCHAIN
function prepareStringForBlockchain($myData){
  
  // DEFINISCO IL NUMERO DI ITERAZIONI PER PBKDF2
  $iterations = 1000000;

  // Generate a random IV using openssl_random_pseudo_bytes()
  // random_bytes() or another suitable source of randomness
  $salt = openssl_random_pseudo_bytes(32);
  // HASH DEI DATI JSON
  $myHashValue1 = hash('sha3-512', $myData);
  // KDF DEI DATI JSON
  $myHashValue2 = hash_pbkdf2("sha512", $myData, $salt, $iterations, 0);

  return array($myHashValue1, $myHashValue2);

}

// FUNZIONE PER PREPARARE LA STRINGA DI DATI PER L'INSERIMENTO SULLA BLOCKCHAIN
function prepareFileForBlockchain($myFile, $myFileContent){
  
  // DEFINISCO IL NUMERO DI ITERAZIONI PER PBKDF2
  $iterations = 1000000;

  // Generate a random IV using openssl_random_pseudo_bytes()
  // random_bytes() or another suitable source of randomness
  $salt = openssl_random_pseudo_bytes(32);
  // HASH DEL FILE
  $myHashValue1 = hash_file('sha3-512', $myFile);
  // KDF DEL FILE
  $myHashValue2 = hash_pbkdf2("sha512", $myFileContent, $salt, $iterations, 0);

  return array($myHashValue1, $myHashValue2);

}


// ************************************************************
// ************************************************************
// ******************** INIZIO PROGRAMMA **********************
// ************************************************************
// ************************************************************


// Include the database configuration file
include 'dbConfig.php';

// INIZIALIZZO UN ARRAY
$autenticaReadyForBlockchain = array();
$schedaReadyForBlockchian = array();
$contrattoReadyForBlockchain = array();

// LEGGO IL VALORE CHE GLI VIENE PASSATO DAL FILE PRECEDENTE
$codiceIdentificativo = $_REQUEST["codiceIdentificativo"];
$idTrasferimento = $_REQUEST["idTrasferimento"];
$pathContratto = $_REQUEST["path"];
$nomeFile = $_REQUEST["nomeFile"];


// ********************************************************************
// ************************* AUTENTICA ********************************
// ********************************************************************

// CREO IL JSON DELL'AUTENTICA DA CARICARE SU BLOCKCHAIN
// ESTRAGGO I DATI PER L'AUTENTICA DAL DATABASE
$result = $db->query(" SELECT `Fotografia`.`Open_edition`, `Fotografia`.`Artist_proof`, `Fotografia`.`Annotazioni`, `Timbro`, `Fotografia`.`Annotazioni_timbro`, `Fotografia`.`Firma`, `Fotografia`.`Annotazioni_firma`, `Fotografia`.`Titolo`, `Fotografia`.`Lunghezza`, `Fotografia`.`Larghezza`, `Fotografia`.`Esemplare`, `Fotografia`.`Note_esemplare`, `Fotografia`.`Tiratura`, `Fotografia`.`Note_tiratura`, `Fotografia`.`Tecnica_stampa`, `Fotografia`.`Giorno_stampa`, `Fotografia`.`Mese_stampa`, `Fotografia`.`Anno_stampa`, `Fotografia`.`Supporto`, `Fotografia`.`Giorno_scatto`, `Fotografia`.`Mese_scatto`, `Fotografia`.`Anno_scatto`, `Fotografia`.`Tecnica_scatto`, `Utente`.`Nome`, `Utente`.`Cognome`, `Utente`.`Giorno_nascita`, `Utente`.`Mese_nascita`, `Utente`.`Anno_nascita`, `Utente`.`Luogo_nascita`, `Utente`.`Giorno_morte`, `Utente`.`Mese_morte`, `Utente`.`Anno_morte`, `Utente`.`Luogo_morte`, `Fotografia`.`Nome_stampatore`, `Fotografia`.`Cognome_stampatore`, `Fotografia`.`Nome_committente` FROM `Fotografia` INNER JOIN `Utente` ON `Fotografia`.`Autore_id`=`Utente`.`id` WHERE `Fotografia`.`Codice_identificativo`='$codiceIdentificativo' ");

$i = 0;
// METTO I DATI IN JSON
while($row = mysqli_fetch_row($result)){

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
  $myObj->Nome_stampatore = $row[33];
  $myObj->Cognome_stampatore = $row[34];
  $myObj->Nome_committente = $row[35];

  // JSON DA INVIARE SU BLOCKCHAIN
  $myJSON = json_encode($myObj);
}

// CREO LE DUE STRINGHE HASH PRONTE PER ESSERE SPEDITE SULLA RETE BLOCKCHAIN PER L'AUTENTICA
$autenticaReadyForBlockchain = prepareStringForBlockchain($myJSON);


// ********************************************************************
// ************************* SCHEDA ***********************************
// ********************************************************************

// QUERY PER ESTRARRE L'ULTIMA SCHEDA MEMORIZZATA (ANCHE NEL CASO IN CUI QUESTA SIA STATA CANCELLATA)
$result = $result = $db->query("  SELECT MAX(`F`.`id`), `F`.`Nome`, `F`.`Path` 
                                  FROM `File` `F`
                                    INNER JOIN `Fotografia` ON `Fotografia`.`id` = `F`.`Fotografia_id`
                                  WHERE `Fotografia`.`Codice_identificativo` = '$codiceIdentificativo'
                               ");

$row = mysqli_fetch_row($result);
$pathScheda = $row[2].$row[1];

// LEGGO IL CONTENUTO DEL FILE SCHEDA
$fileScheda = file_get_contents ( "../".$pathScheda, true );

// CREO LE DUE STRINGHE HASH PRONTE PER ESSERE SPEDITE SULLA RETE BLOCKCHAIN PER IL FILE SCHEDA
$schedaReadyForBlockchian = prepareFileForBlockchain("../".$pathScheda, $fileScheda);


// ********************************************************************
// ************************* CONTRATTO ********************************
// ********************************************************************

// LEGGO IL CONTENUTO DEL FILE CONTRATTO
$fileContratto = file_get_contents ( "../".$pathContratto, true );

// CREO LE DUE STRINGHE HASH PRONTE PER ESSERE SPEDITE SULLA RETE BLOCKCHAIN PER IL FILE SCHEDA
$contrattoReadyForBlockchain = prepareFileForBlockchain("../".$pathContratto, $fileContratto);

// CREO UN JSON CHE SARÀ IL MIO OUTPUT FINALE
// JSON = { "Autentica":["hash_sha3-512","pbkdf2_sha512"], "Scheda":["hash_sha3-512","pbkdf2_sha512"], "Contratto":["hash_sha3-512","pbkdf2_sha512"] }
$myObject->Autentica = $autenticaReadyForBlockchain;
$myObject->Scheda = $schedaReadyForBlockchian;
$myObject->Contratto = $contrattoReadyForBlockchain;

// JSON DA INVIARE SU BLOCKCHAIN
$myJSON_output = json_encode($myObject);

// VALORE DI RITORNO
echo $myJSON_output;

?>