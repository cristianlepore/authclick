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

<body id="animate-in" class="animate-in">

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>

<!-- BARRA DI NAVIGAZIONE --> 
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="form.php" style="border-bottom: 2px solid white;" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">AUTENTICA</a>
    <a href="files.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
    <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
    <a href="contratto.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">CONTRATTI</a>
    <a href="richieste/index.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">RICHIESTE</a>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="files.html" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
  <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large" >TRASFERIMENTI</a>
  <a href="contratto.php" class="w3-bar-item w3-button w3-padding-large" >CONTRATTI</a>
  <a href="richieste/index.html" class="w3-bar-item w3-button w3-padding-large">RICHIESTE</a>
</div>


<div class="main" id="main" onclick="closeNav2()">
<div class="container w3-center ">

<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

$autoreID = $_POST['userID'];

// VALORI DA POST DI AUTORE
$nome = $_POST['nome'];
$nome = ucwords($nome);
$cognome = $_POST['cognome'];
$cognome = ucwords($cognome);

$luogoNascita = $_POST['luogoNascita'];
$luogoNascita = ucwords($luogoNascita);

$giornoNascita = (int)$_POST['giornoNascita'];
$meseNascita = (int)$_POST['meseNascita'];
$annoNascita = (int)$_POST['annoNascita'];
$luogoMorte = $_POST['luogoMorte'];
$luogoMorte = ucwords($luogoMorte);

$giornoMorte = (int)$_POST['giornoDecesso'];
$meseMorte = (int)$_POST['meseDecesso'];
$annoMorte = (int)$_POST['annoDecesso'];
$keywordsAutore = $_POST['keywords'];

// VALORI DA POST DI OPERA
$titolo = $_POST['titolo'];

$giornoScatto = (int)$_POST['giornoScatto'];
$meseScatto = (int)$_POST['meseScatto'];
$annoScatto = (int)$_POST['annoScatto'];
$giornoStampa = (int)$_POST['giornoStampa'];
$meseStampa = (int)$_POST['meseStampa'];
$annoStampa = (int)$_POST['annoStampa'];
$lunghezza = $_POST['lunghezza'];
$larghezza = $_POST['larghezza'];
$tecnicaScatto = $_POST['tecnicaScatto'];

$tecnicaStampa = $_POST['tecnicaStampa'];

$supporto = $_POST['supporto'];

$openEdition = $_POST['openEdition'];
$numeroCopie = (int)$_POST['numeroCopie'];
$noteNumeroCopie = $_POST['noteNumeroCopie'];

$artistProof = $_POST['artistProof'];
$numeroEsemplare = (int)$_POST['numeroEsemplare'];
$noteNumeroEsemplare = $_POST['noteNumeroEsemplare'];

$timbro = $_POST['timbro'];
$noteTimbro = $_POST['noteTimbro'];

$firma = $_POST['firma'];
$noteFirma = $_POST['noteFirma'];

$annotazioni = $_POST['annotazioni'];

$keywordsOpera = $_POST['keywordsOpera'];

$nome = str_replace("§","'", $nome);
$cognome = str_replace("§","'", $cognome);
$luogoNascita = str_replace("§","'", $luogoNascita);
$luogoMorte = str_replace("§","'", $luogoMorte);
$keywordsAutore = str_replace("§","'", $keywordsAutore);
$titolo = str_replace("§","'", $titolo);
$tecnicaScatto = str_replace("§","'", $tecnicaScatto);
$tecnicaStampa = str_replace("§","'", $tecnicaStampa);
$supporto = str_replace("§","'", $supporto);
$noteNumeroCopie = str_replace("§","'", $noteNumeroCopie);
$noteNumeroEsemplare = str_replace("§","'", $noteNumeroEsemplare);
$noteTimbro = str_replace("§","'", $noteTimbro);
$noteFirma = str_replace("§","'", $noteFirma);
$annotazioni = str_replace("§","'", $annotazioni);
$keywordsOpera = str_replace("§","'", $keywordsOpera);

// CONVERTO IL TOGGLE DEL TIMBRO E DELLA FIRMA IN UN VALORE (0,1)
if($timbro=='on')
  ;
else
  $timbro="off";

if($firma=='on')
  ;
else
  $firma="off";

?>
<body>

<?php

      // PRENDO L'UTIMO VALORE INSERITO IN FOTOGRAFIA COME PREVIEW DEL CODICE IDENTIFICATIVO E DELLA TARGA DELL'OPERA
      // GLI AGGIUNGO 1 PER FARLO COMBACIARE CON I NUOVI VALORI
      // VALORI PER LA TARGA
      $result = $db->query(" SELECT MAX(`id`) FROM `Fotografia` ");
      $row = mysqli_fetch_row($result);
      $targa = (int)$row[0]+1;
      
      // VALORI PER IL CODICE IDENTIFICATIVO
      $firstCharacterNome = $nome[0];
      $firstCharacterNome = strtoupper($firstCharacterNome);
      $firstCharacterCognome = $cognome[0];
      $firstCharacterCognome = strtoupper($firstCharacterCognome);
      $firstCharacterTitolo = $titolo[0];
      $firstCharacterTitolo = strtoupper($firstCharacterTitolo);
      
      $codiceIdentificativo = $firstCharacterNome.$firstCharacterCognome.$firstCharacterTitolo.$targa;

      // INSERISCO I DATI DELL'OPERA
      $insert = $db->query("INSERT INTO `Fotografia`(`Open_edition`, `Artist_proof`, `Annotazioni`, `Targa`, `Timbro`, `Annotazioni_timbro`, `Firma`, `Annotazioni_firma`, `Titolo`, `Lunghezza`, `Larghezza`, `Esemplare`, `Note_esemplare`, `Codice_identificativo`, `Tiratura`, `Note_tiratura`, `Tecnica_stampa`, `Giorno_stampa`, `Mese_stampa`, `Anno_stampa`, `Nome_stampatore`,  `Cognome_stampatore`,  `Nome_committente`, `Supporto`, `Giorno_scatto`, `Mese_scatto`, `Anno_scatto`, `Tecnica_scatto`, `Autore_id`, `Keywords`)VALUES ('$openEdition', '$artistProof','$annotazioni', '$targa', '$timbro', '$noteTimbro', '$firma', '$noteFirma', '$titolo', $lunghezza, $larghezza, $numeroEsemplare, '$noteNumeroEsemplare', '$codiceIdentificativo', $numeroCopie, '$noteNumeroCopie', '$tecnicaStampa', $giornoStampa, '$meseStampa', $annoStampa, '$nomeStampatore', '$cognomeStampatore', '$nomeCommittente', '$supporto', $giornoScatto, '$meseScatto', '$annoScatto', '$tecnicaScatto', $lastAuthorId, '$keywordsOpera')");

      $result = $db->query("SELECT `Tipologia` FROM `Utente` WHERE `id`=$autoreID");
      if($row = mysqli_fetch_row($result)[0] != "Autore"){
        // AGGIORNO LA TABELLA UTENTE. SE ERA UN ACQUIRENTE ORA DIVENTERÀ UN AUTORE.
        $update = $db->query("UPDATE `Utente` SET `Giorno_nascita`=$giornoNascita,`Mese_nascita`=$meseNascita,`Anno_nascita`=$annoNascita, `Luogo_nascita`='$luogoNascita', `Giorno_morte`=$giornoMorte,`Mese_morte`=$meseMorte,`Anno_morte`=$annoMorte, `Luogo_morte`='$luogoMorte',`Tipologia`='Autore/altro', `Keywords`='$keywordsAutore' WHERE `id`=$autoreID ");
      } else {
        // AGGIORNO LA TABELLA UTENTE. SE ERA UN AUTORE, DEVE RIMANERE SOLO UN AUTORE.
        $update = $db->query("UPDATE `Utente` SET `Giorno_nascita`=$giornoNascita,`Mese_nascita`=$meseNascita,`Anno_nascita`=$annoNascita, `Luogo_nascita`='$luogoNascita', `Giorno_morte`=$giornoMorte,`Mese_morte`=$meseMorte,`Anno_morte`=$annoMorte, `Luogo_morte`='$luogoMorte',`Tipologia`='Autore', `Keywords`='$keywordsAutore' WHERE `id`=$autoreID ");

      }

      // PRENDO L'ID DELL'OPERA INSERITO APPENA SOPRA
      $result = $db->query("SELECT MAX(`id`) FROM `Fotografia`");
      $row = mysqli_fetch_row($result);
      $lastOperaId = (int)$row[0];

      // INSERISCO I DATI NELLA TABELLA POSSIEDE
      $insert = $db->query("INSERT INTO `Possiede`(`Utente_id`, `Fotografia_id`) VALUES ('$autoreID', '$lastOperaId')");
      if($insert){
        $statusMsg = "Inserimento dei dati relativi all'opera avvenuto con successo.";
        ?>
        <div class="w3-center w3-padding-16 w3-padding-bottom">
        <i class="fa fa-check"></i>
        <?php echo $statusMsg;
      }

      ?>
      <hr style="margin-left:100px;margin-right:100px;" class="horizontalLine">

      <!-- MESSAGGIO DI REINDIRIZZAMENTO VERSO LA HOME PAGE -->

      <p class="w3-opacity w3-center">
      <i>
      ...pochi istanti ancora e potrai proseguire nella compilazione del form.
      </i></p><br>

      <?php
          // USO UNO SCRIPT PER REDIRIGERE ALLA HOME PAGE. PHP NON PUÒ FUNZIONARE DENTRO ALLA CONDIZIONE IF
          echo ("<SCRIPT LANGUAGE='JavaScript'>
                setTimeout(function(){
                  window.location.href = '/authclick/new/files.html';
                }, 5000);
                </SCRIPT>");
      ?>
      
<!-- PARTE RELATIVA AGLI SCRIPT -->
<script>

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

</script>

</body>
</html>