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
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="files.php" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large" >TRASFERIMENTI</a>
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

$gionoCessione = $_POST['giornoCessione'];
$meseCessione = $_POST['meseCessione'];
$annoCessione = $_POST['annoCessione'];

// VERIFICO CHE QUEL CODICE IDENTIFICATIVO ESISTA NEL DATABASE ALTRIMENTI MANDO UN WARNING ALL'UTENTE
$result = $db->query("SELECT `id` FROM `Fotografia` WHERE `Codice_identificativo`='$codIdentificativo'");
if($row = mysqli_num_rows($result) == 0){
    // SE NON ESISTE QUEL CODICE IDENTIFICATIVO
    $statusMsg = "<i class='fa fa-warning'></i>"."ATTENZIONE. Il codice identificativo inserito non esiste nel sistema."."<p>"."Riprovare con un diverso codice identificativo."."</p>";
} else{
    // SE IL CODICE IDENTIFICATIVO ESISTE NEL DATABASE
    // CONTROLLO CHE QUELL'UTENTE NON ESISTA GIÀ NEL DATABASE E LO AGGIUNGO
    $result = $db->query("SELECT `id`, `Tipologia` FROM `Utente` WHERE `Codice_fiscale`='$codFiscale' ");
    
    // SE L'UTENTE NON ESISTE NEL DATABASE, LO POSSO AGGIUNGERE
    if($row = mysqli_fetch_row($result) == 0){
    $insert = $db->query("INSERT INTO `Utente`(`Nome`, `Cognome`, `Codice_fiscale`, `Partita_IVA`, `Tipologia`) VALUES ('$nome','$cognome','$codFiscale','$partitaIVA', 'Altro')");
        if($insert){
            $statusMsg = "<i class='fa fa-check'></i>"."Inserimento dei dati relativi all'acquirente avvenuto con successo.";
        }
    
    // AGGIUNGO ANCHE I SUOI INDIRIZZI NELLA TABELLA INDIRIZZI
    // PRENDO L'ID DELL'UTENTE INSERITO APPENA SOPRA
    $result = $db->query("SELECT MAX(`id`) FROM `Utente`");
    $row = mysqli_fetch_row($result);
    $autoreId = (int)$row[0];

    // AGGIUNGO I DATI SUGLI INDIRIZZI, DOMICILIO E RESIDENZA DELL'ACQUIRENTE
    if($nazione != "")
        $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Indirizzo', '$nazione', '$città', $CAP, '$via_piazza', $civico, $autoreId)");
    if($nazione_residenza != "")
        $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Residenza', '$nazione_residenza', '$città_residenza', $CAP_residenza, '$via_piazza_residenza', $civico_residenza, $autoreId)");
    if($nazione_domicilio != "")
        $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Domicilio', '$nazione_domicilio', '$città_domicilio', $CAP_domicilio, '$via_piazza_domicilio', $civico_domicilio, $autoreId)");

    } else {
        // AGGIORNO SOLO GLI UTENTI
        $autoreId = $row[0];
        $tipologia = $row[1];

        // SE L'UTENTE È GIÀ NEL DATABASE, VERIFICO SE È COME AUTORE O COME ALTRO
        if($tipologia=='Autore'){
            // SE È COME AUTORE, LO AGGIORNO E BASTA
            $updateUser = $db->query("UPDATE `Utente` SET `Codice_fiscale`='$codFiscale', `Partita_IVA`='$partitaIVA', `Tipologia`='Autore / Altro' WHERE `id`=$autoreId ");

            updateIndirizzi($nazione, $città, $CAP, );

            // SE L'ACQUIRENTE È GIÀ A SISTEMA, GLI AGGIORNO SOLO GLI INDIRIZZI.
            if($nazione != "")
                $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Indirizzo', '$nazione', '$città', $CAP, '$via_piazza', $civico, $autoreId)");
                $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$autoreId && `Tipologia`='Indirizzo'");
            if($nazione_residenza != "")
                $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Residenza', '$nazione_residenza', '$città_residenza', $CAP_residenza, '$via_piazza_residenza', $civico_residenza, $autoreId)");
                $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$autoreId && `Tipologia`='Residenza'");
            if($nazione_domicilio != "")
                $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Domicilio', '$nazione_domicilio', '$città_domicilio', $CAP_domicilio, '$via_piazza_domicilio', $civico_domicilio, $autoreId)");
                $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$autoreId && `Tipologia`='Domicilio'");

        }else if($tipologia=='Altro'){
            // SE ERA GIÀ A SISTEMA COME UN ACQUIRENTE, AGGIORNO SOLO I SUOI DATI CON QUESTI NUOVI.
            $updateUser = $db->query("UPDATE `Utente` SET `Codice_fiscale`='$codFiscale', `Partita_IVA`='$partitaIVA', `Tipologia`='Altro' WHERE `id`=$autoreId ");

            // SE L'ACQUIRENTE È GIÀ A SISTEMA, GLI AGGIORNO SOLO GLI INDIRIZZI.
            if($nazione != "")
                $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Indirizzo', '$nazione', '$città', $CAP, '$via_piazza', $civico, $autoreId)");
                $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$autoreId && `Tipologia`='Indirizzo'");
            if($nazione_residenza != "")
                $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Residenza', '$nazione_residenza', '$città_residenza', $CAP_residenza, '$via_piazza_residenza', $civico_residenza, $autoreId)");
                $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$autoreId && `Tipologia`='Residenza'");
            if($nazione_domicilio != "")
                $insert = $db->query("INSERT INTO `Indirizzo`(`Tipologia`, `Nazione`, `Città`, `CAP`, `Via/piazza`, `Civico`, `Utente_id`) VALUES ('Domicilio', '$nazione_domicilio', '$città_domicilio', $CAP_domicilio, '$via_piazza_domicilio', $civico_domicilio, $autoreId)");
                $update = $db->query("UPDATE `Indirizzo` SET `Nazione`='$nazione', `Città`='$città', `CAP`=$CAP, `Via/piazza`='$via_piazza', `Civico`=$civico WHERE `Utente_id`=$autoreId && `Tipologia`='Domicilio'");
        
        }
        
        // STAMPO I MESSAGGI DI AGGIORNAMENTO DELL'UTENTE E DEGLI INDIRIZZI
        if($updateUser){
            $statusMsg = "<i class='fa fa-check'></i>"."Aggiornamento dei dati relativi all'utente avvenuto con successo.";
        }

    }

    //


}














else if($row = mysqli_num_rows($result) == 1){ 
    // SE AL SISTEMA ESISTE 1 FOTOGRAFIA CON QUEL CODICE IDENTIFICATIVO, USO QUELLA NELLA TABELLA TRASFERIMENTI E POSSIEDE
    $row = mysqli_fetch_row($result);
    $fotografia_id = $row[0];

    $result = $db->query("SELECT `Utente_id` FROM `Possiede` WHERE `Fotografia_id`='$fotografia_id'");
    $row = mysqli_fetch_row($result);
    $venditore_id = $row[0];
    $acquirente_id = $autoreId;
    
    if($codIdentificativo!=''){
      $insert = $db->query("INSERT INTO `Trasferimento`(`Clausole_contratto`, `Tipologia`, `Prezzo`,`Data_cessione`,`id_venditore`,`id_acquirente`,`Fotografia_id`) VALUES ('$clausoleContratto', 'Vendita', '$prezzo', '$data', $venditore_id, $acquirente_id, $fotografia_id)");
      $insert = $db->query("UPDATE `Possiede` SET `Utente_id`='$acquirente_id' WHERE `Fotografia_id`='$fotografia_id'");
    }else if($codePrestito!=''){
        $insert = $db->query("INSERT INTO `Trasferimento`(`Clausole_contratto`, `Tipologia`, `Prezzo`,`Data_cessione`,`Fine_cessione`,`id_venditore`,`id_acquirente`,`Fotografia_id`) VALUES ('$clausoleContrattoTrasferimento', 'Prestito', '$prezzoPrestito', '$dateInizioPrestito','$dateFinePrestito', $venditore_id, $acquirente_id, $fotografia_id)");
    }

    $statusMsg = "Trasferimento eseguito con successo.";
    
    // PRENDO I DATI RILEVANTI DA INSERIRE SULLA BLOCKCHAIN E LI METTO IN UN JSON
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
    prepareStringForBlockchain($myJSON);

    // FUNZIONE PER PREPARARE LA STRINGA DI DATI ALL'INSERIMENTO NELLA BLOCKCHAIN
    function prepareStringForBlockchain($myData){

      // DEFINISCO IL NUMERO DI ITERAZIONI PER PBKDF2
      $iterations = 8000000;

      // Generate a random IV using openssl_random_pseudo_bytes()
      // random_bytes() or another suitable source of randomness
      $salt = openssl_random_pseudo_bytes(32);

      // HASH DEI DATI JSON
      $myHashValue1 = hash('sha3-512', $myData);

      // KDF
      $myHashValue2 = hash_pbkdf2("sha512", $myData, $salt, $iterations, 0);

    }

    ?>
    <div class="w3-center w3-padding-16 w3-padding-bottom">
        <i class="fa fa-check"></i>
        <?php echo $statusMsg;
        ?>
    </div>
    <hr class="horizontalLine">

    <div class="w3-center w3-col m6" style="margin-top:25px;">
        <h3>Scegli una delle seguenti opzioni.</h3>
    </div>
    <div class="w3-col m6 w3-center">
        <button type="submit" onclick="getvalue()" style="width:70%;" class="w3-button w3-center w3-small w3-black w3-center">
            <i class="fa fa-chain"></i> ULTIMO VALORE INSERITO SU BLOCKCHAIN
        </button>
        <br><br><br>
        <div class="w3-center">
            <input id="xvalue" type="hidden" value='<?php echo "$myHashValue";?>'/>
            <button type="submit" style="background-color:green;color:white;width:70%;" onclick="setvalue()" class="w3-button w3-small w3-center">
                <i class="fa fa-send"></i> INVIA SU BLOCKCHAIN
            </button>
        </div>
    </div>
    <div class="w3-padding-64"></div>
    <hr class="horizontalLine">
    <div id="xbalance" class="w3-center w3-padding-32"></div>
    <div class="w3-padding-32 w3-center">
      <button class="w3-black w3-button w3-small" onclick="window.location.href='/new/form.php'">
        Torna alla HOME page
      </button>
    </div>
<?php
}
?>

</div>
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