<!DOCTYPE html>
<html lang="en">
<title>App</title>
<meta charset="UTF-8">

<!-- HASH AUTORE DELLA PAGINA WEB -->
<meta name="author" content="68bf9588feee255538e722cce5971af3c9f50e5ed8e06b876032e9fb98c5a9f62036c47cf20f4022eac95154f1a88b65aef367eefa36898fc8e9e850be1af275">
<!-- CONSENTE LA VISUALIZZAZIONE SU SMARTPHONES -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CARICO IL MIO FOGLIO DI STILE -->
<link rel="stylesheet" href="css/style.css">
<!-- CARICO LE IMMAGINE PRENDENDOLE ONLINE -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

#main {
  transition: margin-left .5s;
  padding: 16px;
}

#w3-top{
  transition: margin-left .5s;
}

</style>

<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';
?>

<body class="animate-in" id="animate-in">

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>

<!-- BARRA DI NAVIGAZIONE --> 
<div id="w3-top" class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <button style="font-size:20px;cursor:pointer;" class="w3-button w3-left" onclick="openNav()">&#9776;</button>    
    <div onclick="closeNav()"><a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a></div>
    <a href="form.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">AUTENTICA</a>
    <a href="files.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
    <a href="trasferimenti.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="files.php" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
  <a href="trasferimenti.php" class="w3-bar-item w3-button w3-padding-large" >TRASFERIMENTI</a>
</div>

<!-- INDICATORE DELLA BARRA DEL PROGRESSO -->
<div id="header" class="header">
  <div id="progress-container" class="progress-container">
    <div class="progress-bar" id="myBar"></div>
  </div>  
</div>

<!-- BARRA LATERALE SINISTRA -->
<div id="mySidebar" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="w3-padding-16"></div>
  <div id="dropdown">
    <div style="margin:15px;"><input type="text" placeholder="Cerca..." id="myInput" onkeyup="myFunctionSearch()"></div>
    <a class="collapsible"><i class="fa fa-user"></i> Proprietario</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.php#"><i>Nome</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#nome"><i>cognome</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#cognome"><i>Codice fiscale</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#cognome"><i>Partita IVA</i></a>
    </div>
    <a class="collapsible"><i class="fa fa-address-card-o"></i> Indirizzo</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.php#indirizzo"><i>Nazione</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#indirizzo"><i>Città</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#indirizzo"><i>CAP</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#indirizzo"><i>Via / Piazza</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#indirizzo"><i>Civico</i></a>
    </div>
    <a class="collapsible"><i class="fa fa-address-card-o"></i> Domicilio</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.php#domicilio"><i>Nazione</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#domicilio"><i>Città</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#domicilio"><i>CAP</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#domicilio"><i>Via / Piazza</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#domicilio"><i>Civico</i></a>
    </div>   
    <a class="collapsible"><i class="fa fa-address-card-o"></i> Residenza</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.php#residenza"><i>Nazione</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#residenza"><i>Città</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#residenza"><i>CAP</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#residenza"><i>Via / Piazza</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#residenza"><i>Civico</i></a>
    </div>    
    <a class="collapsible"><i class="fa fa-edit"></i> Contratto</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.php#vendita"><i>Prezzo</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#vendita"><i>Data cessione</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#vendita"><i>Cessione diritti</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#vendita"><i>Carica contratto</i></a>
    </div>
  </div>
</div>

<div id="main" onclick="closeNav2()">
<div class="w3-padding-32"></div>

<?php

// VALORI DA POST DI ACQUIRENTE
$nome = $_POST['nome'];
$nome = mysqli_real_escape_string($db,$nome);

$cognome = $_POST['cognome'];
$cognome = mysqli_real_escape_string($db,$cognome);

$codFiscale = $_POST['codFiscale'];
$partitaIVA = $_POST['partitaIVA'];

// VALORI DA POST DI INDIRIZZO
$nazione = $_POST['indirizzoNazione'];
$città = $_POST['indirizzoCittà'];
$città = mysqli_real_escape_string($db,$città);

$CAP = (int)$_POST['indirizzoCAP'];
$via_piazza = $_POST['indirizzoVia_piazza'];
$via_piazza = mysqli_real_escape_string($db,$via_piazza);

$civico = (int)$_POST['indirizzoCivico'];

// VALORI DA POST DI DOMICILIO
$nazione_domicilio = $_POST['domicilioNazione'];
$città_domicilio = $_POST['domicilioCittà'];
$città_domicilio = mysqli_real_escape_string($db,$città_domicilio);

$CAP_domicilio = (int)$_POST['domicilioCAP'];
$via_piazza_domicilio = $_POST['domicilioVia_piazza'];
$via_piazza_domicilio = mysqli_real_escape_string($db,$via_piazza_domicilio);

$civico_domicilio = (int)$_POST['domicilioCivico'];

// VALORI DA POST DI RESIDENZA
$nazione_residenza = $_POST['residenzaNazione'];
$città_residenza = $_POST['residenzaCittà'];
$città_residenza = mysqli_real_escape_string($db,$città_residenza);

$CAP_residenza = (int)$_POST['residenzaCAP'];
$via_piazza_residenza = $_POST['residenzaVia_piazza'];
$via_piazza_residenza = mysqli_real_escape_string($db,$via_piazza_residenza);

$civico_residenza = (int)$_POST['residenzaCivico'];

// VALORI DA POST DI CONTRATTO
$prezzo = $_POST['prezzo'];
$codIdentificativo = $_POST['codIdentificativo'];

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
function insertOwner($nome, $cognome, $codFiscale, $partitaIVA){
  include 'dbConfig.php';
  // INSERISCO IL PROPRIETARIO
  $insert = $db->query("INSERT INTO `Utente`(`Nome`, `Cognome`, `Codice_fiscale`, `Partita_IVA`, `Tipologia`) VALUES ('$nome','$cognome','$codFiscale','$partitaIVA', 'Altro')");

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

// FUNZIONE PER INSERIRE ED AGGIORNARE GLI INDIRIZZI
function updateIndirizzi($nazione, $città, $CAP, $via_piazza, $civico, $ownerId, $nazione_residenza, $città_residenza, $CAP_residenza, $via_piazza_residenza, $civico_residenza, $nazione_domicilio, $città_domicilio, $CAP_domicilio, $via_piazza_domicilio, $civico_domicilio){
  include 'dbConfig.php';

  // SE L'ACQUIRENTE È GIÀ A SISTEMA, GLI AGGIORNO SOLO GLI INDIRIZZI.
  if($nazione != ""){
    $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Indirizzo', '$nazione', '$città', $CAP, '$via_piazza', $civico, $ownerId)");
    $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$ownerId && `Tipologia`='Indirizzo'");
  }
  if($nazione_residenza != ""){
    $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Residenza', '$nazione_residenza', '$città_residenza', $CAP_residenza, '$via_piazza_residenza', $civico_residenza, $ownerId)");
    $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$ownerId && `Tipologia`='Residenza'");
  }
  if($nazione_domicilio != ""){
    $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Domicilio', '$nazione_domicilio', '$città_domicilio', $CAP_domicilio, '$via_piazza_domicilio', $civico_domicilio, $ownerId)");
    $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$ownerId && `Tipologia`='Domicilio'");
  }

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

function insertTransferimento($codIdentificativo, $newOwnerId, $prezzo, $dataCessione, $cessioneDiritti){
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
  $insert = $db->query("INSERT INTO `Trasferimento`(`Tipologia`, `Prezzo`,`Data_cessione`,`id_venditore`,`id_acquirente`,`Fotografia_id`, `Cessione_diritti`) VALUES ('Vendita', $prezzo, '$dataCessione', $venditore_id, $acquirente_id, $fotografia_id, '$cessioneDiritti')");
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

function insertCessioneDiritti($codIdentificativo, $newOwnerId, $prezzo, $dataCessione, $cessioneDiritti, $dataFineCessione){
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
  $insert = $db->query("INSERT INTO `Trasferimento`(`Tipologia`, `Prezzo`,`Data_cessione`,`Fine_cessione`,`id_venditore`,`id_acquirente`,`Fotografia_id`, `Cessione_diritti`) VALUES ('Cessione', $prezzo, '$dataCessione', '$dataFineCessione', $venditore_id, $acquirente_id, $fotografia_id, '$cessioneDiritti')");
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

function checkContratto(){

  if(isset($_POST["submit"]) && !empty($_FILES["contratto"]["name"])){
    // DECIDO I FORMATI CHE POSSO IMPORTARE
    $allowTypes = array('doc','docx','pdf', 'docm', 'dot', 'dotm', 'dotx', 'odt', 'jpg', 'jpeg', 'bmp', 'png', 'gif');
    if(in_array($fileType, $allowTypes)){
      $response="OK";
    }else{
      $response="FAIL";
    }
  }

  return $response;

}

// ***************************************************************
// ***************************************************************

// INIZIO DEL PROGRAMMA
// VERIFICO CHE QUEL CODICE IDENTIFICATIVO ESISTA GIA NEL DATABASE ALTRIMENTI MANDO UN WARNING ALL'UTENTE
$result = $db->query("SELECT `id` FROM `Fotografia` WHERE `Codice_identificativo`='$codIdentificativo'");

// TROVO L'ID DELLA FOTO CHE HA QUEL CODICE IDENTIFICATIVO. MI SERVIRÀ PER CARICARE I CONTRATTI
$row = mysqli_fetch_row($result);
$idPhoto = $row[0];

// USO LA QUERY PRECEDENTE PER VERIFICARE QUANTO APPENA FATTO
if($row = mysqli_num_rows($result) == 0){
    // SE NON ESISTE QUEL CODICE IDENTIFICATIVO
    $statusMsg = "<i class='fa fa-warning'></i>"."ATTENZIONE. Il codice identificativo inserito non esiste nel sistema."."<p>"."Riprovare con un diverso codice identificativo."."</p>";
} else{
  // ALTRIMENTI SE IL CODICE IDENTIFICATIVO ESISTE NEL DATABASE

  // VERIFICO CHE IL FILE INSERITO SIA UNO DI QUELLI NEI FORMATI AMMESSI
  $contrattoAmmissibile = checkContratto();

  // VERFICO SE L'UTENTE ESISTE NEL DATABASE
  $result = $db->query("SELECT `id`, `Tipologia` FROM `Utente` WHERE (`Nome`='$nome' && `Cognome`='$cognome') || `Codice_fiscale`='$codFiscale' ");
  
  // SE L'UTENTE NON ESISTE NEL DATABASE, LO POSSO AGGIUNGERE SENZA ALTRI PROBLEMI
  if($row = mysqli_fetch_row($result) == 0 && $contrattoAmmissibile=="OK"){

    // INSERISCO L'UTENTE PROPRIETARIO DELL'OPERA
    $resultArray = insertOwner($nome, $cognome, $codFiscale, $partitaIVA);

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
        $resultArrayTrasferimenti = insertTransferimento($codIdentificativo, $ownerId, $prezzo, $dataCessione, $cessioneDiritti);
      }
    
    } else if($cessioneDiritti== "on") {

      // SE SI TRATTA DI UNA CESSIONE DI DIRITTI

      // SE L'UTENTE È STATO INSERITO CORRETTAMENTE, AGGIUNGO ANCHE I SUOI INDIRIZZI ED I DATI DEL TRASFERIMENTO
      if($resultArray['response'] == "OK"){
        // AGGIUNGO ANCHE I SUOI INDIRIZZI NELLA TABELLA INDIRIZZI
        insertIndirizzi($nazione, $città, $CAP, $via_piazza, $civico, $ownerId, $nazione_residenza, $città_residenza, $CAP_residenza, $via_piazza_residenza, $civico_residenza, $nazione_domicilio, $città_domicilio, $CAP_domicilio, $via_piazza_domicilio, $civico_domicilio);
        
        // SE È UNA CESSIONE DI DIRITTI, AGGIORNO IL TRASFERIMENTO NELLA TABELLA TRASFERIMENTI
        $resultArrayCessioneDiritti = insertCessioneDiritti($codIdentificativo, $ownerId, $prezzo, $dataCessione, $cessioneDiritti, $dataFineCessione);
      }

    }

    // PREPARO I MESSAGGI DA STAMPARE DI AVENUTO TRASFERIMENTO O DI FALLIMENTO
    if($resultArrayTrasferimenti[0] == "OK"){
      $statusMsg = "<i class='fa fa-check'></i>"."Trasferimento avvenuto con successo";
    } else {
      $statusMsg = "<i class='fa fa-warning'></i>"."ERRORE. Il trasferimento non è avvenuto correttamente. Riprovare.";
    }

    // PREPARO I MESSAGGI DA STAMPARE DI AVENUTO TRASFERIMENTO O DI FALLIMENTO
    if($resultArrayCessioneDiritti[0] == "OK"){
      $statusMsg = "<i class='fa fa-check'></i>"."Cessione diritti avvenuta con successo";
    } else {
      $statusMsg = "<i class='fa fa-warning'></i>"."ERRORE. La cessione diritti non è avvenuta correttamente. Riprovare.";
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

      // CONTROLLO SE IL NOME DEL FILE ESISTE GIÀ NEL DATABASE PER LA STESSA FOTOGRAFIA E PER LA STESSA TIPOLOGIA (NON AMMISSIBILE).
      $result = $db->query("SELECT `id` FROM `File` WHERE `Utente_id`= $ownerId AND `Nome` = '$fileName' AND `Tipologia` = '$tipoFile' ");
      if ($result->num_rows > 0) {
          $statusMsg = "<i class='fa fa-warning'></i>" . "Esiste già un file del tipo " .$tipoFile. " con il nome <b>" .$fileName. "</b> per lo stesso proprietario. <div class='w3-padding-16 w3-center'>Cambiare nome e ricaricarlo.</div>";
      }else{

        if(move_uploaded_file($_FILES["contratto"]["tmp_name"], $targetFilePath)){
          // CONTRATTO CARICATO NEL SERVER WEB CORRETTAMENTE
          // AGGIUNGO IL NUOVO FILE AL DATABASE
          $insert = $db->query("INSERT INTO `File`(`Tipologia`, `Nome`, `Fotografia_id`, `Path`, `Utente_id`) VALUES ('$tipoFile','$fileName',$idPhoto,'$targetDir',$ownerId)");

          $statusMsgCaricamentoContratto = "<i class='fa fa-check'></i>" . "Contratto caricato correttamente.";
        } else {
          // ERRORE NEL CARICAMENTO DEL CONTRATTO AL DATABASE
          $statusMsgCaricamentoContratto = "<i class='fa fa-warning'></i>" . "ERRORE nel caricamento del contratto.";
        }
      }
    }

  } else if($row = mysqli_fetch_row($result) > 0 && $contrattoAmmissibile=="OK") {

    // Devo stampare a video tutti gli utenti con quel nome e cognome e farli scegliere a chi inserisce i dati

    /*
    // AGGIORNO SOLO GLI UTENTI
    $proprietarioId = $row[0];
    $tipologia = $row[1];

    // AGGIORNO I DATI DEL PROPRIETARIO
    // SE L'UTENTE È GIÀ NEL DATABASE, VERIFICO SE È COME AUTORE O COME ALTRO
    if($tipologia=='Autore'){
      // SE È COME AUTORE, LO AGGIORNO E BASTA
      $updateUser = $db->query("UPDATE `Utente` SET `Codice_fiscale`='$codFiscale', `Partita_IVA`='$partitaIVA', `Tipologia`='Autore / Altro' WHERE `id`=$proprietarioId ");

      // FUNZIONE PER AGGIUNGERE O AGGIORNARE GLI INDIRIZZI DEI PROPRIETARI.
      updateIndirizzi($nazione, $città, $CAP, $via_piazza, $civico, $proprietarioId, $nazione_residenza, $città_residenza, $CAP_residenza, $via_piazza_residenza, $civico_residenza, $nazione_domicilio, $città_domicilio, $CAP_domicilio, $via_piazza_domicilio, $civico_domicilio);

    }else if($tipologia=='Altro'){
      // SE ERA GIÀ A SISTEMA COME UN ACQUIRENTE, AGGIORNO SOLO I SUOI DATI CON QUESTI NUOVI.
      $updateUser = $db->query("UPDATE `Utente` SET `Codice_fiscale`='$codFiscale', `Partita_IVA`='$partitaIVA', `Tipologia`='Altro' WHERE `id`=$proprietarioId ");

      // FUNZIONE PER AGGIUNGERE O AGGIORNARE GLI INDIRIZZI DEI PROPRIETARI.
      updateIndirizzi($nazione, $città, $CAP, $via_piazza, $civico, $proprietarioId, $nazione_residenza, $città_residenza, $CAP_residenza, $via_piazza_residenza, $civico_residenza, $nazione_domicilio, $città_domicilio, $CAP_domicilio, $via_piazza_domicilio, $civico_domicilio);

    }
    
    // STAMPO I MESSAGGI DI AGGIORNAMENTO DELL'UTENTE E DEGLI INDIRIZZI
    if($updateUser){
        $statusMsg = "<i class='fa fa-check'></i>"."Aggiornamento dei dati relativi all'utente avvenuto con successo.";
    }
    */

  } else {
    $statusMsg = 'Puoi caricare soltanto contratti nei formati previsti. <div class="w3-padding-16">I formati previsti sono: <i> doc, docx, pdf, docm, dot, dotm, dotx, odt, jpg, jpeg, bmp, png, gif.</i></div>';
  }

}

// SE L'INSERIMENTO DEL PROPRIETARIO È AVVENUTO CORRETTAMENTE, PREPARO I DATI PER L'INSERIMENTO SULLA BLOCKCHAIN
if( $resultArray['response']=="OK" && ( $resultArrayTrasferimenti['response']=="OK" || resultArrayCessioneDiritti['response']=="OK") ){

   // PRENDO I DATI RILEVANTI DA INSERIRE SULLA BLOCKCHAIN E LI METTO IN FORMATO JSON
   $result = $db->query("SELECT `id`,`Clausole_contratto`,`Tipologia`,`Prezzo`,`Data_cessione`,`Fine_cessione`,`id_venditore`,`id_acquirente`,`Fotografia_id` FROM `Trasferimento` WHERE `id_venditore`='$venditore_id' AND `id_acquirente`='$acquirente_id' AND `Fotografia_id`=$fotografia_id ");
   while($row = mysqli_fetch_array($result)){
       $myObj->id_trasferimento = $row[0];
       $myObj->clausoleContratto = $row[1];
       $myObj->tipologia = $row[2];
       $myObj->prezzo = $row[3];
       $myObj->dataCessione = $row[4];
       $myObj->fineCessione = $row[5];
       $myObj->venditore_Id = $row[6];
       $myObj->acquirente_Id = $row[7];
       $myObj->fotografia_Id = $row[8];

       $myJSON = json_encode($myObj);
   }

   // RICHIAMO LA FUNZIONE PER PROCESSARE I DATI E PREPARALI ALL'INVIO SU BLOCKCHAIN
   $outHash = prepareStringForBlockchain($myJSON);

}else {
  $statusMsgBlockchain = "<i class='fa fa-warning'></i>"."ATTENZIONE! Non è stato possibile preparare i dati per l'inserimento su blockchain.";
}

?>

<script>

window.onload = function () {
// check to see if user has metamask addon installed on his browser. check to make sure web3 is defined
if (typeof web3 === 'undefined') {
document.getElementById('metamask').innerHTML = 'You need <a href="https://metamask.io/">MetaMask</a> browser plugin to run this example'
}
}
//function to retrieve the last inserted value on the blockchain
function getvalue() {
    try {
        // contract Abi defines all the variables,constants and functions of the smart contract. replace with your own abi
        var abi = [
	{
		"constant": false,
		"inputs": [
			{
				"name": "x",
				"type": "string"
			}
		],
		"name": "set",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "get",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
]
        //contract address. please change the address to your own
        var contractaddress = '0xc59f4b9960bac556ef599ca7a407d652c9036d2f';
        //instantiate and connect to contract address via Abi
        var myAbi = web3.eth.contract(abi);
        var myfunction = myAbi.at(contractaddress);
        //call the get function of our SimpleStorage contract
        myfunction.get.call(function (err, xname) {
            if (err) { console.log(err) }
            if (xname) {
                //display value on the webpage
                document.getElementById("xbalance").innerHTML = "Utimo valore inserito in blockchain è: " + xname;
            }
        });
    }
    catch (err) {
        document.getElementById("xbalance").innerHTML = err;
    }
}
// function to add a new integer value to the blockchain
function setvalue() {
    try {
        // contract Abi defines all the variables,constants and functions of the smart contract. replace with your own abi
        var abi = [
	{
		"constant": false,
		"inputs": [
			{
				"name": "x",
				"type": "string"
			}
		],
		"name": "set",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "get",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
]
        //contract address. please change the address to your own
        var contractaddress = '0xc59f4b9960bac556ef599ca7a407d652c9036d2f';
        //instantiate and connect to contract address via Abi
        var myAbi = web3.eth.contract(abi);
        var myfunction = myAbi.at(contractaddress);
        //call the set function of our SimpleStorage contract
        ethereum.enable();
        myfunction.set.sendTransaction(document.getElementById("xvalue").value, { from: web3.eth.accounts[0], gas: 4000000 }, function (error, result) {
            if (!error) {
                console.log(result);
            } else {
                console.log(error);
            }
        })
    } catch (err) {
        document.getElementById("xvalue").innerHTML = err;
    }
}

// USATA PER IL TOGGLE DEL MENU QUANDO LA DIMENSIONE DELLO SCHERMO VIENE RIDOTTA
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

window.addEventListener("beforeunload", function () {
  document.body.classList.add("animate-out");
});

// FUNZIONE PER APRIRE LA BARRA LATERALE DI SINISTRA
function openNav() {
  if (window.innerWidth > 600) {   
    event.stopPropagation();
    document.getElementById("mySidebar").style.width = "225px";
    document.getElementById("main").style.marginLeft = "225px";
    document.getElementById("w3-top").style.marginLeft = "225px";   
    document.getElementById("myBtn").style.marginLeft = "260px";   
    document.getElementById("header").style.marginLeft = "225px";
  }else{
    document.getElementById("mySidebar").style.width = "225px";
  }
}

// FUNZIONE PER CHIUDERE LA BARRA LATERALE DI SINISTRA
function closeNav() {
  if (window.innerWidth > 600) {   
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("w3-top").style.marginLeft = "0px";  
    document.getElementById("myBtn").style.marginLeft = "4%";
    document.getElementById("header").style.marginLeft = "0";
  }else{
    document.getElementById("mySidebar").style.width = "0";
  }
}

function closeNav2() {
  if (window.innerWidth > 600) {
  }else{
    document.getElementById("mySidebar").style.width = "0";
  }
}

// MENU DI RICERCA PAROLE
function myFunctionSearch() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("dropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}


// MENU COLLAPSIBLE BARRA LATERALE SINISTRA
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

</script>
</body>
</html>