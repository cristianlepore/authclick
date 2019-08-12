<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// VALORI DA POST DI ACQUIRENTE
$nome = $_POST['nome'];
$nome = mysqli_real_escape_string($db,$nome);
$nome = ucwords($nome);

$cognome = $_POST['cognome'];
$cognome = mysqli_real_escape_string($db,$cognome);
$cognome = ucwords($cognome);

$codFiscale = $_POST['codFiscale'];
$codFiscale = strtoupper($codFiscale);

$partitaIVA = $_POST['partitaIVA'];
$keywordsProprietario = $_POST['keywordsProprietario'];
$keywordsProprietario = mysqli_real_escape_string($db,$keywordsProprietario);

// VALORI DA POST DI INDIRIZZO
$nazione = $_POST['indirizzoNazione'];
$città = $_POST['indirizzoCittà'];
$città = mysqli_real_escape_string($db,$città);
$città = ucwords($città);

$CAP = (int)$_POST['indirizzoCAP'];
$via_piazza = $_POST['indirizzoVia_piazza'];
$via_piazza = mysqli_real_escape_string($db,$via_piazza);

$civico = (int)$_POST['indirizzoCivico'];

// VALORI DA POST DI DOMICILIO
$nazione_domicilio = $_POST['domicilioNazione'];
$città_domicilio = $_POST['domicilioCittà'];
$città_domicilio = mysqli_real_escape_string($db,$città_domicilio);
$città_domicilio = ucwords($città_domicilio);

$CAP_domicilio = (int)$_POST['domicilioCAP'];
$via_piazza_domicilio = $_POST['domicilioVia_piazza'];
$via_piazza_domicilio = mysqli_real_escape_string($db,$via_piazza_domicilio);

$civico_domicilio = (int)$_POST['domicilioCivico'];

// VALORI DA POST DI RESIDENZA
$nazione_residenza = $_POST['residenzaNazione'];
$città_residenza = $_POST['residenzaCittà'];
$città_residenza = mysqli_real_escape_string($db,$città_residenza);
$città_residenza = ucwords($città_residenza);

$CAP_residenza = (int)$_POST['residenzaCAP'];
$via_piazza_residenza = $_POST['residenzaVia_piazza'];
$via_piazza_residenza = mysqli_real_escape_string($db,$via_piazza_residenza);

$civico_residenza = (int)$_POST['residenzaCivico'];

// VALORI DA POST DI CONTRATTO
$prezzo = $_POST['prezzo'];
$codIdentificativo = $_POST['codIdentificativo'];
$codIdentificativo = strtoupper($codIdentificativo);

// DATA DI VENDITA
$dataCessione = date('Y-m-d', strtotime($_POST['dataCessione']));

// CESSIONE DIRITTI
$cessioneDiritti = $_POST['cessioneDiritti'];
$dataFineCessione = date('Y-m-d', strtotime($_POST['dataFineCessione']));

// PRENDO IL NOME DEL FILE CARICATO AL SOLO SCOPO DI TROVARNE L'ESTENSIONE.
$target_file = $target_dir . basename($_FILES["contratto"]["name"]);

$fileName = basename($_FILES["contratto"]["name"]);
$fileType = pathinfo($fileName,PATHINFO_EXTENSION);

// LEGGO IL NOME PROPOSTO DALL'UTENTE AL FILE.
$fileName = $_POST['nomeContratto'];
// FORMATTO LA STRINGA IN MODO DA POTER MEMORIZZARE ANCHE CARATTERI DI ESCAPE SUL DATABASE.
$fileName = mysqli_real_escape_string($db,$fileName);
// AGGIUNGO L'ESTENSIONE LETTA PRIMA AL NOME FILE FORNITO DALL'UTENTE.
$fileName = $fileName .".". $fileType;

// DEFINISCO LE COSTANTI
$targetDir = "uploads/";
$forwSlash = "/";
$tipoFile = "Contratto";

// CREO IL PERCORSO PER LA CARTELLA
$targetDir = $targetDir . $codIdentificativo . $forwSlash . $tipoFile . $forwSlash;

// KEYWORDS PER IL CONTRATTO
$keywordsContratto = $_POST['keywordsContratto'];
$keywordsContratto = mysqli_real_escape_string($db,$keywordsContratto);


// SETTO IL FLAG DI CESSIONE DIRITTI CORRETTAMENTE
if($cessioneDiritti=="on"){
  ;
}else {
  $cessioneDiritti = "off";
}

// SE IL CAMPO PREZZO È STATO LASCIATO VUOTO, LO SOSTITUISCO CON UNO ZERO
if($prezzo==''){
  $prezzo=0;
}


// DEFINISCO TUTTE LE FUNZIONI CHE MI SERVIRANNO
// ***************************************************************
// ***************************************************************

// FUNZIONE PER INSERIRE IL NUOVO PROPRIETARIO
function insertOwner($nome, $cognome, $codFiscale, $partitaIVA, $keywordsProprietario){
  include 'dbConfig.php';

  // INSERISCO IL PROPRIETARIO
  $insert = $db->query("INSERT INTO `Utente`(`Nome`, `Cognome`, `Codice_fiscale`, `Partita_IVA`, `Tipologia`, `Keywords`) VALUES ('$nome','$cognome','$codFiscale','$partitaIVA', 'Altro', '$keywordsProprietario')");

  if($insert){
    // SE L'INSERIMENTO È ANDATO BENE, PREPARO IL MESSAGGIO DA STAMPARE A VIDEO
    $statusMsg = "<i class='fa fa-check'></i>"."Inserimento dei dati relativi al proprietario avvenuto con successo.";
    $out['response'] = "OK";
  } else{
    $statusMsg = "<i class='fa fa-warning'></i>"."ATTENZIONE! Problema nell'inserimento dei dati relativi al proprietario.";
    $out['response'] = "FAIL";
  }

  $out['statusMsg'] = $statusMsg;
  return $out;

}

// FUNZIONE PER INSERIRE GLI INDIRIZZI NUOVI
function insertIndirizzi($nazione, $città, $CAP, $via_piazza, $civico, $ownerId, $nazione_residenza, $città_residenza, $CAP_residenza, $via_piazza_residenza, $civico_residenza, $nazione_domicilio, $città_domicilio, $CAP_domicilio, $via_piazza_domicilio, $civico_domicilio){
  include 'dbConfig.php';

  // AGGIUNGO I DATI SUGLI INDIRIZZI, DOMICILIO E RESIDENZA DELL'ACQUIRENTE
  if($nazione != "")
      $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Indirizzo', '$nazione', '$città', $CAP, '$via_piazza', $civico, $ownerId)");
  if($nazione_residenza != "")
      $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Residenza', '$nazione_residenza', '$città_residenza', $CAP_residenza, '$via_piazza_residenza', $civico_residenza, $ownerId)");
  if($nazione_domicilio != "")
      $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Domicilio', '$nazione_domicilio', '$città_domicilio', $CAP_domicilio, '$via_piazza_domicilio', $civico_domicilio, $ownerId)");

}

function insertTransferimento($codIdentificativo, $newOwnerId, $prezzo, $dataCessione, $cessioneDiritti, $keywordsContratto){
  include 'dbConfig.php';

  // SELEZIONO L'ID DELLA FOTOGRAFIA IN BASE AL CODICE IDENTIFICATIVO
  $result = $db->query("SELECT `id` FROM `Fotografia` WHERE `Codice_identificativo`='$codIdentificativo'");
  $row = mysqli_fetch_row($result);
  $fotografia_id = $row[0];

  // SELEZIONO L'ATTUALE PROPRIETARIO DELL'OPERA
  $result = $db->query("SELECT `Utente_id` FROM `Possiede` WHERE `Fotografia_id`='$fotografia_id'");
  $row = mysqli_fetch_row($result);
  $venditore_id = $row[0];
  $acquirente_id = $newOwnerId;
  
  // INSERISCO I TRASFERIMENTI NELL'APPOSITA TABELLA
  $insert = $db->query("INSERT INTO `Trasferimento`(`Tipologia`, `Prezzo`,`Data_cessione`,`id_venditore`,`id_acquirente`,`Fotografia_id`, `Cessione_diritti`, `Keywords`) VALUES ('Vendita', $prezzo, '$dataCessione', $venditore_id, $acquirente_id, $fotografia_id, '$cessioneDiritti', '$keywordsContratto')");
  if($insert){

    // MESSAGGIO DI INSERIMENTO CORRETTO DEL TRASFERIMENTO
    $statusMsgTrasferimento = "<i class='fa fa-check'></i>"."Inserimento dei dati relativi al trasferimento avvenuto con successo.";
    
    // AGGIORNO LA TABELLA POSSIEDE
    $insert = $db->query("UPDATE `Possiede` SET `Utente_id`='$acquirente_id' WHERE `Fotografia_id`='$fotografia_id'");
    if($insert)
      $response = "OK";
    else
      $response = "FAIL";

  } else{

    // MESSAGGIO DI INSERIMENTO CON ERRORE
    $statusMsgTrasferimento = "<i class='fa fa-warning'></i>"."ATTENZIONE! Problema con l'inserimento dei dati relativi al trasferimento.";

    $response = "FAIL";

  }

  return array($response, $statusMsgTrasferimento);

}

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

function insertCessioneDiritti($codIdentificativo, $newOwnerId, $prezzo, $dataCessione, $cessioneDiritti, $dataFineCessione, $keywordsContratto){
  include 'dbConfig.php';

  // SELEZIONO L'ID DELLA FOTOGRAFIA IN BASE AL CODICE IDENTIFICATIVO
  $result = $db->query("SELECT `id` FROM `Fotografia` WHERE `Codice_identificativo`='$codIdentificativo'");
  $row = mysqli_fetch_row($result);
  $fotografia_id = $row[0];

  // SELEZIONO L'ATTUALE PROPRIETARIO DELL'OPERA
  $result = $db->query("SELECT `Utente_id` FROM `Possiede` WHERE `Fotografia_id`='$fotografia_id'");
  $row = mysqli_fetch_row($result);
  $venditore_id = $row[0];
  $acquirente_id = $newOwnerId;

  // INSERISCO I TRASFERIMENTI NELL'APPOSITA TABELLA
  $insert = $db->query("INSERT INTO `Trasferimento`(`Tipologia`, `Prezzo`,`Data_cessione`,`Fine_cessione`,`id_venditore`,`id_acquirente`,`Fotografia_id`, `Cessione_diritti`, `Keywords`) VALUES ('Cessione', $prezzo, '$dataCessione', '$dataFineCessione', $venditore_id, $acquirente_id, $fotografia_id, '$cessioneDiritti', '$keywordsContratto')");
  if($insert){

    // MESSAGGIO DI INSERIMENTO CORRETTO DEL TRASFERIMENTO
    $statusMsgTrasferimento = "<i class='fa fa-check'></i>"."Inserimento dei dati relativi al trasferimento avvenuto con successo.";

    // MESSAGGIO DI OUTPUT
    $response = "OK";

  } else{

    // MESSAGGIO DI INSERIMENTO CON ERRORE
    $statusMsgTrasferimento = "<i class='fa fa-warning'></i>"."ATTENZIONE! Problema con l'inserimento dei dati relativi al trasferimento.";

    // MESSAGGIO DI OUTPUT
    $response = "FAIL";

  }

  return array($response, $statusMsgTrasferimento);

}

function checkContratto($fileType){

  // TIPI DI FILE AMMESSI
  $allowTypes = array('doc','docx','pdf', 'docm', 'dot', 'dotm', 'dotx', 'odt', 'jpg', 'jpeg', 'bmp', 'png', 'gif');
  
  if(in_array($fileType, $allowTypes)){
    $response="OK";
  }else{
    $response="FAIL";
  }

  return $response;

}

// ***************************************************************
// ***************************************************************

// INIZIO DEL PROGRAMMA
// VERIFICO CHE QUEL CODICE IDENTIFICATIVO ESISTA GIA NEL DATABASE ALTRIMENTI MANDO UN WARNING ALL'UTENTE
$result = $db->query("SELECT `id` FROM `Fotografia` WHERE `Codice_identificativo`='$codIdentificativo' ");

// TROVO L'ID DELLA FOTO CHE HA QUEL CODICE IDENTIFICATIVO. MI SERVIRÀ PER CARICARE I CONTRATTI
$row = mysqli_fetch_row($result);
$idPhoto = $row[0];

// VERIFICO SE IL NOME DATO AL CONTRATTO NON ESISTE GIÀ PER QUELLA FOTOGRAFIA E PER QUELL'UTENTE.
$resultContratto = $db->query( "SELECT `File`.`id` FROM `File` INNER JOIN `Fotografia` ON `Fotografia`.`id` = `File`.`Fotografia_id` INNER JOIN `Utente` ON `File`.`Utente_id` = `Utente`.`id` WHERE `Fotografia`.`Codice_identificativo`='$codIdentificativo' AND `Utente`.`Codice_fiscale`='$codFiscale' AND `File`.`Nome`='$fileName' ");

// USO LA QUERY PRECEDENTE PER VERIFICARE QUANTO APPENA FATTO
if($row = mysqli_num_rows($result) == 0){
  // SE NON ESISTE QUEL CODICE IDENTIFICATIVO
  $statusMsg = "<i class='fa fa-warning'></i><b style='color:red;'>"." ATTENZIONE! La fotografia non esiste nel sistema."."</b><p>"."Riprovare inserendo un diverso codice identificativo."."</p>";
} else if($row = mysqli_num_rows($resultContratto) > 0){
  // SE ESISTE GIÀ UN CONTRATTO CON QUELLO STESSO NOME, MANDO UN MESSAGGIO DI ERRORE.
  $statusMsg = "<i class='fa fa-warning'></i><b style='color:red;'> ATTENZIONE!</b> Esiste già un contratto con questo stesso nome. <div class='w3-padding-16'></div> <hr class='horizontalLine'> ";

} else { 
  // ALTRIMENTI SE IL CODICE IDENTIFICATIVO ESISTE NEL DATABASE

  // VERIFICO CHE IL FILE INSERITO SIA UNO DI QUELLI NEI FORMATI AMMESSI
  $contrattoAmmissibile = checkContratto($fileType);
  
  // VERFICO SE L'UTENTE ESISTE NEL DATABASE
  $result = $db->query("SELECT `id`, `Tipologia` FROM `Utente` WHERE `Nome`='$nome' && `Cognome`='$cognome' ");

  // SE L'UTENTE NON ESISTE NEL DATABASE, LO POSSO AGGIUNGERE SENZA ALTRI PROBLEMI
  if( $result->num_rows == 0 && $contrattoAmmissibile=="OK" ){

    // INSERISCO L'UTENTE PROPRIETARIO DELL'OPERA
    $resultArray = insertOwner($nome, $cognome, $codFiscale, $partitaIVA, $keywordsProprietario);

    // PRENDO L'ID DELL'UTENTE INSERITO APPENA SOPRA
    $result = $db->query("SELECT MAX(`id`) FROM `Utente`");
    $row = mysqli_fetch_row($result);
    $ownerId = (int)$row[0];

    // SE È UNA VENDITA E NON UNA SEMPLICE CESSIONE DI DIRITTI
    if($cessioneDiritti=="off"){
      // SE SI TRATTA DI UNA VENDITA E NON DI UNA SEMPLICA CESSIONE DIRITTI

      // SE L'UTENTE È STATO INSERITO CORRETTAMENTE, AGGIUNGO ANCHE I SUOI INDIRIZZI ED I DATI DEL TRASFERIMENTO
      if($resultArray['response'] == "OK"){
        // AGGIUNGO ANCHE I SUOI INDIRIZZI NELLA TABELLA INDIRIZZI
        insertIndirizzi($nazione, $città, $CAP, $via_piazza, $civico, $ownerId, $nazione_residenza, $città_residenza, $CAP_residenza, $via_piazza_residenza, $civico_residenza, $nazione_domicilio, $città_domicilio, $CAP_domicilio, $via_piazza_domicilio, $civico_domicilio);
        
        // SE È UNA VENDITA, AGGIORNO IL TRASFERIMENTO NELLA TABELLA TRASFERIMENTI ED AGGIORNO LA TABELLA POSSIEDE
        $resultArrayTrasferimenti = insertTransferimento($codIdentificativo, $ownerId, $prezzo, $dataCessione, $cessioneDiritti, $keywordsContratto);
      }

      // PREPARO I MESSAGGI DA STAMPARE DI AVENUTO TRASFERIMENTO O DI FALLIMENTO
      if($resultArrayTrasferimenti[0] == "OK"){
        $statusMsg = "<i class='fa fa-check'></i> Trasferimento registrato con successo";
      } else {
        $statusMsg = "<i class='fa fa-warning'></i><b style='color:red;'> ERRORE. Il trasferimento non è avvenuto correttamente. Riprovare.</b>";
      }
    
    } else if($cessioneDiritti== "on") {
      // SE SI TRATTA DI UNA CESSIONE DI DIRITTI

      // SE L'UTENTE È STATO INSERITO CORRETTAMENTE, AGGIUNGO ANCHE I SUOI INDIRIZZI ED I DATI DEL TRASFERIMENTO
      if($resultArray['response'] == "OK"){
        // AGGIUNGO ANCHE I SUOI INDIRIZZI NELLA TABELLA INDIRIZZI
        insertIndirizzi($nazione, $città, $CAP, $via_piazza, $civico, $ownerId, $nazione_residenza, $città_residenza, $CAP_residenza, $via_piazza_residenza, $civico_residenza, $nazione_domicilio, $città_domicilio, $CAP_domicilio, $via_piazza_domicilio, $civico_domicilio);
        
        // SE È UNA CESSIONE DI DIRITTI, AGGIORNO IL TRASFERIMENTO NELLA TABELLA TRASFERIMENTI
        $resultArrayCessioneDiritti = insertCessioneDiritti($codIdentificativo, $ownerId, $prezzo, $dataCessione, $cessioneDiritti, $dataFineCessione, $keywordsContratto);
      }

      // PREPARO I MESSAGGI DA STAMPARE DI AVENUTO TRASFERIMENTO O DI FALLIMENTO
      if($resultArrayCessioneDiritti[0] == "OK"){
        $statusMsg = "<i class='fa fa-check'></i> La cessione diritti è stata registrata con successo";
      } else {
        $statusMsg = "<i class='fa fa-warning'></i><b style='color:red;'> ERRORE. Cessione diritti non avvenuta correttamente.</b>";
      }

    }
    
    // SOLO ORA SE TUTTO È ANDATO A BUON FINE, MEMORIZZO IL FILE DEL CONTRATTO
    if($resultArrayTrasferimenti[0] == "OK" || $resultArrayCessioneDiritti[0] == "OK"){

      // CREO LA CARTELLA IN CUI ANDRÒ A MEMORIZZARE I CONTRATTI
      $targetDir = $targetDir . $ownerId . $forwSlash;
      $targetFilePath = $targetDir . $fileName;

      // PREPARO PER LO SPOSTAMENTO DEL FILE
      move_uploaded_file($_FILES['contratto']['name'], $move);

      // CREO LA CARTELLA PER SALVARVICI I DOCUMENTI (SE GIÀ NON ESISTEVA)
      mkdir($targetDir);

      // CREO LA CARTELLA ANNIDATA (SE GIÀ ESISTEVA)
      mkdir($targetDir, 0777, true);

      if(move_uploaded_file($_FILES["contratto"]["tmp_name"], $targetFilePath)){
        // CONTRATTO CARICATO NEL SERVER WEB CORRETTAMENTE
        // AGGIUNGO IL NUOVO FILE AL DATABASE
        $insert = $db->query("INSERT INTO `File`(`Tipologia`, `Nome`, `Fotografia_id`, `Path`, `Utente_id`) VALUES ('$tipoFile','$fileName',$idPhoto,'$targetDir',$ownerId)");

        $statusMsgCaricamentoContratto = "<i class='fa fa-check'></i> Contratto caricato con successo.";
      } else {
        // ERRORE NEL CARICAMENTO DEL CONTRATTO AL DATABASE
        $statusMsgCaricamentoContratto = "<i class='fa fa-warning'></i><b style='color:red;'> ERRORE durante il caricamento del contratto.</b>";
      }
      
    }

  } else if($result->num_rows > 0 && $contrattoAmmissibile=="OK") {
    // SE SONO QUI È PERCHÈ HANNO LO STESSO NOME E COGNOME DI UN'ALTRO UTENTE REGISTRATO NEL SISTEMA.

    // CIOÈ SE ESISTE GIÀ UN UTENTE CON QUEL CODICE FISCALE (O CODICE IDENTIFICATIVO) NEL DATABASE, STAMPO UN MESSAGGIO A VIDEO
    $result = $db->query("SELECT `id` FROM `Utente` WHERE `Codice_fiscale`='$codFiscale' ");
    if($result->num_rows > 0){

      // SPOSTO TEMPORANEAMENTE IL FILE NELLA CARTELLA UPLOADS PER POI POTERLO RIPRENDERE NELLA PAGINA WEB SUCCESSIVA
      move_uploaded_file($_FILES["contratto"]["tmp_name"], "uploads/".$fileName);

      // ESISTE UN SOLO UTENTE CON LO STESSO CODICE FISCALE
      $doubleOwnerMsg = "<i class='fa fa-warning'></i> ATTENZIONE! Esiste già un utente con questo codice identificativo.<div class='w3-padding-16'> Vuoi proseguire aggiornando le sue informazioni? </div>  <hr class='horizontalLine'> ";

    } else {
      // SE ESISTE GIÀ UN AUTORE CON QUEL NOME E COGNOME AL SISTEMA, MA NON HA UN CODICE IDENTIFICATIVO, DEVO LASCIARE LA SCELTA ALLA PERSONA CHE USA IL PROGRAMMA.
      
      // PRENDO TUTTA LA SERIE DI AUTORI CON QUELLO STESSO NOME E COGNOME ED IL CODICE IDENTIFICATIVO DELLA LORO PRIMA OPERA
      $result = $db->query(" SELECT DISTINCT `F`.`Codice_identificativo`, `Utente`.* FROM (SELECT `Fotografia`.* FROM `Fotografia` GROUP BY `Fotografia`.`Autore_id` ) as `F` RIGHT JOIN `Utente` ON `Utente`.`id` = `F`.`Autore_id` WHERE `Utente`.`Tipologia` = 'Autore' AND `Utente`.`Nome` = '$nome' AND `Utente`.`Cognome` = '$cognome'; ");
    
      // SPOSTO TEMPORANEAMENTE IL FILE NELLA CARTELLA UPLOADS PER POI POTERLO RIPRENDERE NELLA PAGINA WEB SUCCESSIVA
      move_uploaded_file($_FILES["contratto"]["tmp_name"], "uploads/".$fileName);

      // ESISTE UN SOLO UTENTE CON LO STESSO CODICE FISCALE
      $doubleAuthor = "<i class='fa fa-warning'></i> ATTENZIONE! Esiste già un autore con questo nome e cognome.<div class='w3-padding-16'></div>";

    }

  }else if($contrattoAmmissibile == "FAIL") {
    $statusMsg = "<i class='fa fa-warning'></i><b style='color:red;'> ATTENZIONE!</b><b> Puoi caricare soltanto contratti nei formati previsti. </b><div class='w3-padding-16'>I formati previsti sono: <i> doc, docx, pdf, docm, dot, dotm, dotx, odt, jpg, jpeg, bmp, png, gif.</i></div>";
  }

}

?>