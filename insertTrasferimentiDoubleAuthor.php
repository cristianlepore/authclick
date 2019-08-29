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
<!-- CARICO IL CORRISPETTIVO FILE PHP -->

<style>

#main {
  transition: margin-left .5s;
  padding: 16px;
}

#w3-top{
  transition: margin-left .5s;
}

</style>

<body class="animate-in" id="animate-in">

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>

<!-- BARRA DI NAVIGAZIONE --> 
<div id="w3-top" class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <button style="font-size:20px;cursor:pointer;" class="w3-button w3-left" onclick="openNav()">&#9776;</button>    
    <div onclick="closeNav()"><a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a></div>
    <a href="form.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">AUTENTICA</a>
    <a href="files.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
    <a href="trasferimenti.html" style="border-bottom: 2px solid white;" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
    <a href="contratto.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">CONTRATTI</a>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="files.html" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
  <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large" >TRASFERIMENTI</a>
  <a href="contratto.php" class="w3-bar-item w3-button w3-padding-large" >CONTRATTI</a>
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
      <a style="font-size:14px;" href="trasferimenti.html#"><i>Nome</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#nome"><i>cognome</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#cognome"><i>Codice fiscale</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#cognome"><i>Partita IVA</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#cognome"><i>Keywords</i></a>
    </div>
    <a class="collapsible"><i class="fa fa-address-card-o"></i> Indirizzo</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.html#indirizzo"><i>Nazione</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#indirizzo"><i>Città</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#indirizzo"><i>CAP</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#indirizzo"><i>Via / Piazza</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#indirizzo"><i>Civico</i></a>
    </div>
    <a class="collapsible"><i class="fa fa-address-card-o"></i> Domicilio</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.html#domicilio"><i>Nazione</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#domicilio"><i>Città</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#domicilio"><i>CAP</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#domicilio"><i>Via / Piazza</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#domicilio"><i>Civico</i></a>
    </div>   
    <a class="collapsible"><i class="fa fa-address-card-o"></i> Residenza</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.html#residenza"><i>Nazione</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#residenza"><i>Città</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#residenza"><i>CAP</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#residenza"><i>Via / Piazza</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#residenza"><i>Civico</i></a>
    </div>    
    <a class="collapsible"><i class="fa fa-edit"></i> Contratto</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="trasferimenti.html#vendita"><i>Prezzo</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#vendita"><i>Data cessione</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#vendita"><i>Cessione diritti</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#contrattoForm"><i>Carica contratto</i></a>
      <a style="font-size:14px;" href="trasferimenti.html#contrattoForm"><i>Keywords</i></a>
    </div>
  </div>
</div>

<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// VALORI DA POST DI ACQUIRENTE
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$codFiscale = $_POST['codFiscale'];
$partitaIVA = $_POST['partitaIVA'];
$keywordsProprietario = $_POST['keywordsProprietario'];

// VALORI DA POST DI INDIRIZZO
$nazione = $_POST['indirizzoNazione'];
$città = $_POST['indirizzoCittà'];
$CAP = $_POST['indirizzoCAP'];
$via_piazza = $_POST['indirizzoVia_piazza'];
$civico = (int)$_POST['indirizzoCivico'];

// VALORI DA POST DI DOMICILIO
$nazione_domicilio = $_POST['domicilioNazione'];
$città_domicilio = $_POST['domicilioCittà'];
$CAP_domicilio = $_POST['domicilioCAP'];
$via_piazza_domicilio = $_POST['domicilioVia_piazza'];
$civico_domicilio = (int)$_POST['domicilioCivico'];

// VALORI DA POST DI RESIDENZA
$nazione_residenza = $_POST['residenzaNazione'];
$città_residenza = $_POST['residenzaCittà'];
$CAP_residenza = $_POST['residenzaCAP'];
$via_piazza_residenza = $_POST['residenzaVia_piazza'];
$civico_residenza = (int)$_POST['residenzaCivico'];

// VALORI DA POST DI CONTRATTO
$prezzo = $_POST['prezzo'];
$codIdentificativo = $_POST['codIdentificativo'];

// DATA DI VENDITA
$dataCessione = date('Y-m-d', strtotime($_POST['dataCessione']));

// CESSIONE DIRITTI
$cessioneDiritti = $_POST['cessioneDiritti'];
$dataFineCessione = date('Y-m-d', strtotime($_POST['dataFineCessione']));

// KEYWORDS PER IL CONTRATTO
$keywordsContratto = $_POST['keywordsContratto'];

// LEGGO IL NOME PROPOSTO DALL'UTENTE AL FILE.
$fileName = $_POST['nomeContratto'];

// DEFINISCO LE COSTANTI
$targetDir = "uploads/";
$forwSlash = "/";
$tipoFile = "Contratto";

// CREO IL PERCORSO PER LA CARTELLA
$targetDir = $targetDir . $codIdentificativo . $forwSlash . $tipoFile . $forwSlash;
$idPhoto = $_POST['idPhoto'];

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

// **********************************************************************
// ***************** INIZIO DEL PROGRAMMA *******************************
// **********************************************************************

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

function insertIndirizzi($nazione, $città, $CAP, $via_piazza, $civico, $ownerId, $nazione_residenza, $città_residenza, $CAP_residenza, $via_piazza_residenza, $civico_residenza, $nazione_domicilio, $città_domicilio, $CAP_domicilio, $via_piazza_domicilio, $civico_domicilio){
  include 'dbConfig.php';

  // AGGIUNGO I DATI SUGLI INDIRIZZI, DOMICILIO E RESIDENZA DELL'ACQUIRENTE
  if($nazione != "")
      $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Indirizzo', '$nazione', '$città', '$CAP', '$via_piazza', $civico, $ownerId)");
  if($nazione_residenza != "")
      $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Residenza', '$nazione_residenza', '$città_residenza', '$CAP_residenza', '$via_piazza_residenza', $civico_residenza, $ownerId)");
  if($nazione_domicilio != "")
      $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Domicilio', '$nazione_domicilio', '$città_domicilio', '$CAP_domicilio', '$via_piazza_domicilio', $civico_domicilio, $ownerId)");

}

// FUNZIONE PER INSERIRE I TRASFERIMENTI
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

// FUNZIONE PER INSERIRE LA CESSIONE DEI DIRITTI
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

// ***************************************************************
// ***************************************************************
// ***************************************************************


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
  move_uploaded_file($fileName, $move);

  // CREO LA CARTELLA PER SALVARVICI I DOCUMENTI (SE GIÀ NON ESISTEVA)
  mkdir($targetDir);

  // CREO LA CARTELLA ANNIDATA (SE GIÀ ESISTEVA)
  mkdir($targetDir, 0777, true);

  // CONTROLLO SE IL NOME DEL FILE ESISTE GIÀ NEL DATABASE PER LA STESSA FOTOGRAFIA E PER LA STESSA TIPOLOGIA (NON AMMISSIBILE).
  $result = $db->query("SELECT `id` FROM `File` WHERE `Utente_id`= $ownerId AND `Nome` = '$fileName' AND `Tipologia` = '$tipoFile' ");
  if ($result->num_rows > 0) {
    $statusMsgCaricamentoContratto = "<b>ATTENZIONE !</b><p style='color:red;'>"."<b>NOME del file già esistente.<br></b></p>Cambiare nome e ricaricarlo.<hr class='horizontalLine'>";
  }else{

    // SPOSTO IL FILE CARICATO NELLA PAGINA PRECEDENTE ALL'INTERNO DELLA SUA CARTELLA DI DESTINAZIONE
    if(rename("uploads/".$fileName, $targetFilePath)){

    // PRENDO ID DELL'ULTIMO TRASFERIMENTO EFFETTUATO CHE MI SERVIRÀ PER INSERIRLO NELLA TABELLA FILE
    $result = $db->query("SELECT MAX(`id`) FROM `Trasferimento` ");
    $row = mysqli_fetch_array($result);
    $lastTrasferimento = $row[0];

    // CONTRATTO CARICATO NEL SERVER WEB CORRETTAMENTE
    // AGGIUNGO IL NUOVO FILE AL DATABASE
    $insert = $db->query("INSERT INTO `File`(`Tipologia`, `Nome`, `Fotografia_id`, `Path`, `Utente_id`, `Trasferimento_id`) VALUES ('$tipoFile','$fileName',$idPhoto,'$targetDir',$ownerId, $lastTrasferimento)");

      $statusMsgCaricamentoContratto = "<i class='fa fa-check'></i> Contratto caricato con successo.<hr class='horizontalLine'>";
    } else {
      // ERRORE NEL CARICAMENTO DEL CONTRATTO AL DATABASE
      $statusMsgCaricamentoContratto = "<i class='fa fa-warning'></i><b style='color:red;'> ERRORE durante il caricamento del contratto.</b><hr class='horizontalLine'>";
    }
  }
}

// **********************************************************************
// ***************** FINE DEL PROGRAMMA *********************************
// **********************************************************************

?>

<div id="main" onclick="closeNav2()">
  <div class="main">
    <div class="container">
      <div class="w3-center">
        <?php
          // STAMPO I MESSAGGI DI CONFERMA O DI ERRORE NELL'INSERIMENTO DEI DATI. I MESSAGGI SONO PRESI DAL FILE insertTrasferimenti.php.
          echo $statusMsg;
          echo "<br><br>".$statusMsgCaricamentoContratto;
        ?>
        <div class="w3-padding-32 w3-center">
          <button class="w3-button w3-huge w3-black" onclick="window.location.href='/authclick/new/trasferimenti.html'">
            <i class="fa fa-backward"></i> INDIETRO
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- INIZIA LA PARTE RELATIVA AGLI SCRIPT -->
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