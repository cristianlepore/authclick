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

<body id="animate-in" class="animate-in">

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>

<!-- BARRA DI NAVIGAZIONE --> 
<div id="w3-top" class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <div onclick="closeNav()"><a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a></div>
    <a href="form.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">AUTENTICA</a>
    <a href="files.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
    <a href="trasferimenti.html" data-transition="pop" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="files.html" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
  <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large" >TRASFERIMENTI</a>
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
    <a class="collapsible"><i class="fa fa-user"></i> Autore</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="#"><i>Nome</i></a>
      <a style="font-size:14px;" href="#nome"><i>cognome</i></a>
      <a style="font-size:14px;" href="#cognome"><i>Luogo di nascita</i></a>
      <a style="font-size:14px;" href="#luogoNascita"><i>Data di nascita</i></a>
      <a style="font-size:14px;" href="#annoNascita"><i>Luogo di morte</i></a>
      <a style="font-size:14px;" href="#luogoMorte"><i>Data del decesso</i></a>
      <a style="font-size:14px;" href="#annoDecesso"><i>Keywords</i></a>
    </div>
    <a class="collapsible"><i class="fa fa-photo"></i> Fotografia</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="#opera"><i>Titolo</i></a>
      <a style="font-size:14px;" href="#titolo"><i>Data di scatto</i></a>
      <a style="font-size:14px;" href="#titolo"><i>Data di stampa</i></a>
      <a style="font-size:14px;" href="#dataStampa"><i>Dimensioni</i></a>
      <a style="font-size:14px;" href="#dataStampa"><i>Tecnica di scatto</i></a>
      <a style="font-size:14px;" href="#dataStampa"><i>Tecnica di stampa</i></a>
      <a style="font-size:14px;" href="#dataStampa"><i>Supporto</i></a>
      <a style="font-size:14px;" href="#dataStampa"><i>Tiratura</i></a>
      <a style="font-size:14px;" href="#dataStampa"><i>Esemplare</i></a>
      <a style="font-size:14px;" href="#esemplare"><i>Annotazioni</i></a>
      <a style="font-size:14px;" href="#esemplare"><i>Keywords</i></a>
      <a style="font-size:14px;" href="#myCheck"><i>Timbro</i></a>
      <a style="font-size:14px;" href="#myCheck"><i>Firma</i></a>
    </div>
  </div>
</div>

<div class="main" id="main" onclick="closeNav2()">
<div class="container w3-center ">

<?php

// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';
$insertOK = 0;

// PRENDO I VALORI CHE MI SONO PASSATI DAL FILE FORM.PHP
$nome = $_POST['nome'];
$nome = mysqli_real_escape_string($db,$nome);

$cognome = $_POST['cognome'];
$cognome = mysqli_real_escape_string($db,$cognome);

$luogoNascita = $_POST['luogoNascita'];
$luogoNascita = mysqli_real_escape_string($db,$luogoNascita);

$giornoNascita = (int)$_POST['giornoNascita'];
$meseNascita = $_POST['meseNascita'];
$annoNascita = (int)$_POST['annoNascita'];

$luogoMorte = $_POST['luogoMorte'];
$luogoMorte = mysqli_real_escape_string($db,$luogoMorte);

$giornoMorte = (int)$_POST['giornoDecesso'];
$meseMorte = (int)$_POST['meseDecesso'];
$annoMorte = (int)$_POST['annoDecesso'];

$keywordsAutore = $_POST['keywords'];
$keywordsAutore = mysqli_real_escape_string($db,$keywordsAutore);

// VALORI DA POST DI OPERA
$titolo = $_POST['titolo'];
$titolo = mysqli_real_escape_string($db,$titolo);

$giornoScatto = (int)$_POST['giornoScatto'];
$meseScatto = (int)$_POST['meseScatto'];
$annoScatto = (int)$_POST['annoScatto'];

$giornoStampa = (int)$_POST['giornoStampa'];
$meseStampa = (int)$_POST['meseStampa'];
$annoStampa = (int)$_POST['annoStampa'];

$lunghezza = $_POST['lunghezza'];
$larghezza = $_POST['larghezza'];

$tecnicaScatto = $_POST['tecnicaScatto'];
$tecnicaScatto = mysqli_real_escape_string($db,$tecnicaScatto);

$tecnicaStampa = $_POST['tecnicaStampa'];
$tecnicaStampa = mysqli_real_escape_string($db,$tecnicaStampa);

$supporto = $_POST['supporto'];
$supporto = mysqli_real_escape_string($db,$supporto);

$openEdition = $_POST['openEdition'];
$numeroCopie = (int)$_POST['numeroCopie'];

$noteNumeroCopie = $_POST['noteNumeroCopie'];
$noteNumeroCopie = mysqli_real_escape_string($db,$noteNumeroCopie);

$artistProof = $_POST['artistProof'];
$numeroEsemplare = (int)$_POST['numeroEsemplare'];

$noteNumeroEsemplare = $_POST['noteNumeroEsemplare'];
$noteNumeroEsemplare = mysqli_real_escape_string($db,$noteNumeroEsemplare);

$targa = $_POST['targa'];
$timbro = $_POST['timbro'];

$noteTimbro = $_POST['noteTimbro'];
$noteTimbro = mysqli_real_escape_string($db,$noteTimbro);

$firma = $_POST['firma'];

$noteFirma = $_POST['noteFirma'];
$noteFirma = mysqli_real_escape_string($db,$noteFirma);

$annotazioni = $_POST['annotazioni'];
$annotazioni = mysqli_real_escape_string($db,$annotazioni);

$codiceIdentificativo = $_POST['code'];

$keywordsOpera = $_POST['keywordsOpera'];
$keywordsOpera = mysqli_real_escape_string($db,$keywordsOpera);

$nuovoAutore = $_POST['nuovo_autore'];

// CONVERTO IL TOGGLE DEL TIMBRO E DELLA FIRMA E DI OPEN EDITION IN UN VALORE (0,1)
if($timbro=='on')
  ;
else
  $timbro="off";

if($firma=='on')
  ;
else
  $firma="off";

if($openEdition=='on')
  ;
else  
  $openEdition="off";

// FACCIO UN CONTROLLO PER SICUREZZA CHE SE IL CAMPO TIMBRO O FIRMO SONO "OFF", IL RISPETTIVO CAMPO TESTUALE DEVE ESSERE VUOTO. QUESTA COSA NON VIENE FATTA IN AUTOMATICO DA JAVASCRIPT.
if($timbro=='off')
  $noteTimbro="";

if($firma=='off')
  $noteFirma="";

// INCREMENTE DI 1 IL NUMERO DEL MESE PER FARLO CORRISPONDERE AL VALORE REALE
if($meseNascita!="NULL"){
  $meseNascita=$meseNascita+1;
}
// SERVE FARE IL CAST AD INT PER MEMORIZZARLO NEL DATABASE
$meseNascita = (int)$meseNascita;

if($meseMorte!="NULL"){
  $meseMorte=$meseMorte+1;
}
// SERVE FARE IL CAST AD INT PER MEMORIZZARLO NEL DATABASE
$meseMorte = (int)$meseMorte;

if($meseScatto!="NULL"){
  $meseScatto=$meseScatto+1;
}
// SERVE FARE IL CAST AD INT PER MEMORIZZARLO NEL DATABASE
$meseScatto = (int)$meseScatto;

if($meseStampa!="NULL"){
  $meseStampa=$meseStampa+1;
}
// SERVE FARE IL CAST AD INT PER MEMORIZZARLO NEL DATABASE
$meseStampa = (int)$meseStampa;


// REGEX PER PRENDERE SOLTANTO CARATTERI ALFABETICI.
$rgxOnlyString = "/^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/";

// CONTROLLO SU VALORI DI NOME E COGNOME CHE SIANO SOLO CARATTERI ALFABETICI.
if(preg_match($rgxOnlyString, $nome)){
  $nomeOK = 1;
}else if($nome == ""){
  $nomeOK = 0;
}else{
  $nomeOK = -1;
}
if(preg_match($rgxOnlyString, $cognome)){
  $cognomeOK = 1;
}else if($cognome == ""){
  $cognomeOK = 0;
}else{
  $cognomeOK = -1;
}

// VERIFICO CHE IL LUOGO DI NASCITA NON SIA LASCIATO VUOTO E CONTENGA SOLAMENTE CARATTERI ALFABETICI (CITTÀ)
if(preg_match($rgxOnlyString, $luogoNascita)){
  $luogoNascitaOK = 1;
}else if($nome == ""){
  $luogoNascitaOK = 0;
}else{
  $luogoNascitaOK = -1;
}

?>

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>
<?php

// SE I VALORI DI NOME E COGNOME INSERITI SONO CORRETTI ALLORA PROSEGUO, ALTRIMENTI ESCO
if($nomeOK == 1 && $cognomeOK == 1 && $luogoNascitaOK == 1){

  // VERIFICO CHE L'AUTORE NON SIA GIÀ PRESENTE NEL DATABASE
  $result = $db->query("SELECT `Nome`, `Cognome`,`Giorno_nascita`,`Mese_nascita`,`Anno_nascita`, `Luogo_nascita` FROM `Utente` WHERE `Nome`='$nome' AND `Cognome`='$cognome' AND `Giorno_nascita`=$giornoNascita AND `Mese_nascita`='$meseNascita' AND`Anno_nascita`='$annoNascita' AND `Luogo_nascita`='$luogoNascita' ");
  $result2 = $db->query("SELECT `Nome`, `Cognome` FROM `Utente` WHERE `Nome`='$nome' AND `Cognome`='$cognome' AND `Tipologia`='Altro' ");
  if(($row = mysqli_num_rows($result) > 0 || $row2 = mysqli_num_rows($result2)) && $nuovoAutore==''){
    // L'AUTORE È GIÀ PRESENTE NEL DATABASE
    ?>

        <div><i class="fa fa-warning"></i> Un utente <i><?php echo $nome." ".$cognome ?></i> con gli stessi dati è già presente nel nostro database.<br><br><br>
        Preferisci aggiungerlo come nuovo autore o associare la fotografia ad un autore già esistente?
        </div>
        <hr style="margin-left:100px;margin-right:100px;" class="horizontalLine">

        <div class="w3-row-padding w3-center">
        <form action="/authclick/new/insertAutentica.php" method="post" >
          <div class="w3-col m6 w3-left w3-padding-16">
 
            <!-- INFORMAZIONI RELATIVE ALL'AUTORE -->
            <input type="hidden" name="nome" value = '<?php echo "$nome";?>' >
            <input type="hidden" name="cognome" value = '<?php echo "$cognome";?>' >
            <input type="hidden" name="luogoNascita" value = '<?php echo "$luogoNascita";?>' >
            <input type="hidden" name="giornoNascita" value = '<?php echo "$giornoNascita";?>' >
            <input type="hidden" name="meseNascita" value = '<?php echo "$meseNascita";?>' >
            <input type="hidden" name="annoNascita" value = '<?php echo "$annoNascita";?>' >
            <input type="hidden" name="luogoMorte" value = '<?php echo "$luogoMorte";?>' >
            <input type="hidden" name="giornoDecesso" value = '<?php echo "$giornoMorte";?>' >
            <input type="hidden" name="meseDecesso" value = '<?php echo "$meseMorte";?>' >
            <input type="hidden" name="annoDecesso" value = '<?php echo "$annoMorte";?>' >
            <input type="hidden" name="keywords" value = '<?php echo "$keywordsAutore";?>' >

            <!-- INFORMAZIONI RELATIVE ALL'OPERA -->
            <input type="hidden" name="titolo" value = '<?php echo "$titolo";?>' >
            <input type="hidden" name="giornoScatto" value = '<?php echo "$giornoScatto";?>' >
            <input type="hidden" name="meseScatto" value = '<?php echo "$meseScatto";?>' >
            <input type="hidden" name="annoScatto" value = '<?php echo "$annoScatto";?>' >
            <input type="hidden" name="giornoStampa" value = '<?php echo "$giornoStampa";?>' >
            <input type="hidden" name="meseStampa" value = '<?php echo "$meseStampa";?>' >
            <input type="hidden" name="annoStampa" value = '<?php echo "$annoStampa";?>' >
            <input type="hidden" name="lunghezza" value = '<?php echo "$lunghezza";?>' >
            <input type="hidden" name="larghezza" value = '<?php echo "$larghezza";?>' >
            <input type="hidden" name="tecnicaScatto" value = '<?php echo "$tecnicaScatto";?>' >
            <input type="hidden" name="tecnicaStampa" value = '<?php echo "$tecnicaStampa";?>' >
            <input type="hidden" name="supporto" value = '<?php echo "$supporto";?>' >
            <input type="hidden" name="openEdition" value = '<?php echo "$openEdition";?>' >
            <input type="hidden" name="numeroCopie" value = '<?php echo "$numeroCopie";?>' >
            <input type="hidden" name="noteNumeroCopie" value = '<?php echo "$noteNumeroCopie";?>' >
            <input type="hidden" name="artistProof" value = '<?php echo "$artistProof";?>' >
            <input type="hidden" name="numeroEsemplare" value = '<?php echo "$numeroEsemplare";?>' >
            <input type="hidden" name="noteNumeroEsemplare" value = '<?php echo "$noteNumeroEsemplare";?>' >
            <input type="hidden" name="targa" value = '<?php echo "$targa";?>' >
            <input type="hidden" name="timbro" value = '<?php echo "$timbro";?>' >
            <input type="hidden" name="noteTimbro" value = '<?php echo "$noteTimbro";?>' >
            <input type="hidden" name="firma" value = '<?php echo "$firma";?>' >
            <input type="hidden" name="noteFirma" value = '<?php echo "$noteFirma";?>' >
            <input type="hidden" name="annotazioni" value = '<?php echo "$annotazioni";?>' >
            <input type="hidden" name="code" value = '<?php echo "$codiceIdentificativo";?>' >
            <input type="hidden" name="keywordsOpera" value = '<?php echo "$keywordsOpera";?>' >
            <input type="hidden" name="nuovo_autore" value = "1" >

            <!-- BOTTONE -->
            <button type="submit" style="background-color:green;color:white;width:250px;" onclick="setvalue()" class="w3-button w3-small w3-center">
                <i class="fa fa-plus"></i> AGGIUNGI COME NUOVO AUTORE
            </button>

          </form>
          </div>
          <form action="/authclick/new/insertAutentica.php" method="post" >
          <div class="w3-col m6 w3-left w3-padding-16" style="margin:-22px 0px 8px 0px">
            <!-- INFORMAZIONI RELATIVE ALL'AUTORE -->
            <input type="hidden" name="nome" value = '<?php echo "$nome";?>' >
            <input type="hidden" name="cognome" value = '<?php echo "$cognome";?>' >
            <input type="hidden" name="luogoNascita" value = '<?php echo "$luogoNascita";?>' >
            <input type="hidden" name="giornoNascita" value = '<?php echo "$giornoNascita";?>' >
            <input type="hidden" name="meseNascita" value = '<?php echo "$meseNascita";?>' >
            <input type="hidden" name="annoNascita" value = '<?php echo "$annoNascita";?>' >
            <input type="hidden" name="luogoMorte" value = '<?php echo "$luogoMorte";?>' >
            <input type="hidden" name="giornoDecesso" value = '<?php echo "$giornoMorte";?>' >
            <input type="hidden" name="meseDecesso" value = '<?php echo "$meseMorte";?>' >
            <input type="hidden" name="annoDecesso" value = '<?php echo "$annoMorte";?>' >
            <input type="hidden" name="keywords" value = '<?php echo "$keywordsAutore";?>' >

            <!-- INFORMAZIONI RELATIVE ALL'OPERA -->
            <input type="hidden" name="titolo" value = '<?php echo "$titolo";?>' >
            <input type="hidden" name="giornoScatto" value = '<?php echo "$giornoScatto";?>' >
            <input type="hidden" name="meseScatto" value = '<?php echo "$meseScatto";?>' >
            <input type="hidden" name="annoScatto" value = '<?php echo "$annoScatto";?>' >
            <input type="hidden" name="giornoStampa" value = '<?php echo "$giornoStampa";?>' >
            <input type="hidden" name="meseStampa" value = '<?php echo "$meseStampa";?>' >
            <input type="hidden" name="annoStampa" value = '<?php echo "$annoStampa";?>' >
            <input type="hidden" name="lunghezza" value = '<?php echo "$lunghezza";?>' >
            <input type="hidden" name="larghezza" value = '<?php echo "$larghezza";?>' >
            <input type="hidden" name="tecnicaScatto" value = '<?php echo "$tecnicaScatto";?>' >
            <input type="hidden" name="tecnicaStampa" value = '<?php echo "$tecnicaStampa";?>' >
            <input type="hidden" name="supporto" value = '<?php echo "$supporto";?>' >
            <input type="hidden" name="openEdition" value = '<?php echo "$openEdition";?>' >
            <input type="hidden" name="numeroCopie" value = '<?php echo "$numeroCopie";?>' >
            <input type="hidden" name="noteNumeroCopie" value = '<?php echo "$noteNumeroCopie";?>' >
            <input type="hidden" name="artistProof" value = '<?php echo "$artistProof";?>' >
            <input type="hidden" name="numeroEsemplare" value = '<?php echo "$numeroEsemplare";?>' >
            <input type="hidden" name="noteNumeroEsemplare" value = '<?php echo "$noteNumeroEsemplare";?>' >
            <input type="hidden" name="targa" value = '<?php echo "$targa";?>' >
            <input type="hidden" name="timbro" value = '<?php echo "$timbro";?>' >
            <input type="hidden" name="noteTimbro" value = '<?php echo "$noteTimbro";?>' >
            <input type="hidden" name="firma" value = '<?php echo "$firma";?>' >
            <input type="hidden" name="noteFirma" value = '<?php echo "$noteFirma";?>' >
            <input type="hidden" name="annotazioni" value = '<?php echo "$annotazioni";?>' >
            <input type="hidden" name="code" value = '<?php echo "$codiceIdentificativo";?>' >
            <input type="hidden" name="keywordsOpera" value = '<?php echo "$keywordsOpera";?>' >
            <input type="hidden" name="nuovo_autore" value = "0"><br>
            
            <!-- BOTTONE -->
            <button type="submit" style="background-color:black;color:white;width:250px;" onclick="setvalue()" class="w3-button w3-small w3-center">
              <i class="fa fa-check"></i> ASSOCIA FOTO AD ESISTENTE
            </button>
        
          </form>
          </div>
        </div>
    </div>
    <?php
    exit();
}else if($nuovoAutore=='' || $nuovoAutore == 1) {

  // SE I DATI DI MORTE NON SONO STATI INSERITI
    if($luogoMorte == "" && $annoMorte == ''){
        $insert = $db->query("INSERT INTO `Utente`(`Nome`, `Cognome`, `Giorno_nascita`,`Mese_nascita`,`Anno_nascita`, `Luogo_nascita`, `Tipologia`, `Keywords`) VALUES ('$nome','$cognome',$giornoNascita,'$meseNascita',$annoNascita,'$luogoNascita', 'Autore', '$keywordsAutore')");
        if($insert){
          $statusMsg = "Inserimento dei dati relativi all'autore avvenuto con successo.";
        }
    }else if($luogoMorte != "" && $annoMorte != ''){
      if($annoNascita < $annoMorte){
        $insert = $db->query("INSERT INTO `Utente`(`Nome`, `Cognome`, `Giorno_nascita`,`Mese_nascita`,`Anno_nascita`, `Luogo_nascita`, `Giorno_morte`,`Mese_morte`,`Anno_morte`, `Luogo_morte`, `Tipologia`, `Keywords`) VALUES ('$nome','$cognome',$giornoNascita,'$meseNascita',$annoNascita,'$luogoNascita',$giornoMorte,'$meseMorte',$annoMorte,'$luogoMorte','Autore', '$keywordsAutore')");
        if($insert){
          $statusMsg = "Inserimento dei dati relativi all'autore avvenuto con successo.";
        }
      }
    }
?>
    <div class="w3-center w3-padding-16 w3-padding-bottom" style="margin-top:35px;">
    <i class="fa fa-check"></i>
    <?php echo $statusMsg;
    $insertAutoreOK = 1;

      // PRENDO L'ID DELL'ULTIMO UTENTE INSERITO APPENA SOPRA
      $result = $db->query("SELECT MAX(`id`) FROM `Utente`");
      $row = mysqli_fetch_row($result);
      $lastAuthorId = (int)$row[0];

      // INSERISCO I DATI DELL'OPERA
      $insert = $db->query("INSERT INTO `Fotografia`(`Open_edition`, `Artist_proof`, `Annotazioni`, `Targa`, `Timbro`, `Annotazioni_timbro`, `Firma`, `Annotazioni_firma`, `Titolo`, `Lunghezza`, `Larghezza`, `Esemplare`, `Note_esemplare`, `Codice_identificativo`, `Tiratura`, `Note_tiratura`, `Tecnica_stampa`, `Giorno_stampa`, `Mese_stampa`, `Anno_stampa`, `Supporto`, `Giorno_scatto`, `Mese_scatto`, `Anno_scatto`, `Tecnica_scatto`, `Autore_id`, `Keywords`)VALUES ('$openEdition', '$artistProof','$annotazioni', '$targa', '$timbro', '$noteTimbro', '$firma', '$noteFirma', '$titolo', $lunghezza, $larghezza, $numeroEsemplare, '$noteNumeroEsemplare', '$codiceIdentificativo', $numeroCopie, '$noteNumeroCopie', '$tecnicaStampa', $giornoStampa, '$meseStampa', $annoStampa, '$supporto', $giornoScatto, '$meseScatto', '$annoScatto', '$tecnicaScatto', $lastAuthorId, '$keywordsOpera')");
      if($insert){
        $statusMsg = "Inserimento dei dati relativi all'opera avvenuto con successo.";
        ?>
        <div class="w3-center w3-padding-16 w3-padding-bottom">
        <i class="fa fa-check"></i>
        <?php echo $statusMsg;
      }

      // PRENDO L'ID DELL'OPERA INSERITO APPENA SOPRA
      $result = $db->query("SELECT MAX(`id`) FROM `Fotografia`");
      $row = mysqli_fetch_row($result);
      $lastOperaId = (int)$row[0];

      // INSERISCO I DATI NELLA TABELLA POSSIEDE
      $insert = $db->query("INSERT INTO `Possiede`(`Utente_id`, `Fotografia_id`) VALUES ('$lastAuthorId', '$lastOperaId')");

      ?>
      <hr style="margin-left:100px;margin-right:100px;" class="horizontalLine">

      <!-- MESSAGGIO DI REINDIRIZZAMENTO VERSO LA HOME PAGE -->

      </div>
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

}else if($nuovoAutore==0){
  ?>
  <h4 class="w3-center">Seleziona uno di questi utenti.</h4>
  <hr style="margin-left:100px;margin-right:100px;" class="horizontalLine">
    <form action="/authclick/new/insertOpera.php" method="post" >
        
        <!-- INFORMAZIONI RELATIVE ALL'OPERA DA PASSARE AL PROSSIMO FILE -->
        <input type="hidden" name="titolo" value = '<?php echo "$titolo";?>' >
        <input type="hidden" name="giornoScatto" value = '<?php echo "$giornoScatto";?>' >
        <input type="hidden" name="meseScatto" value = '<?php echo "$meseScatto";?>' >
        <input type="hidden" name="annoScatto" value = '<?php echo "$annoScatto";?>' >
        <input type="hidden" name="giornoStampa" value = '<?php echo "$giornoStampa";?>' >
        <input type="hidden" name="meseStampa" value = '<?php echo "$meseStampa";?>' >
        <input type="hidden" name="annoStampa" value = '<?php echo "$annoStampa";?>' >
        <input type="hidden" name="lunghezza" value = '<?php echo "$lunghezza";?>' >
        <input type="hidden" name="larghezza" value = '<?php echo "$larghezza";?>' >
        <input type="hidden" name="tecnicaScatto" value = '<?php echo "$tecnicaScatto";?>' >
        <input type="hidden" name="tecnicaStampa" value = '<?php echo "$tecnicaStampa";?>' >
        <input type="hidden" name="supporto" value = '<?php echo "$supporto";?>' >
        <input type="hidden" name="openEdition" value = '<?php echo "$openEdition";?>' >
        <input type="hidden" name="numeroCopie" value = '<?php echo "$numeroCopie";?>' >
        <input type="hidden" name="noteNumeroCopie" value = '<?php echo "$noteNumeroCopie";?>' >
        <input type="hidden" name="artistProof" value = '<?php echo "$artistProof";?>' >
        <input type="hidden" name="numeroEsemplare" value = '<?php echo "$numeroEsemplare";?>' >
        <input type="hidden" name="noteNumeroEsemplare" value = '<?php echo "$noteNumeroEsemplare";?>' >
        <input type="hidden" name="targa" value = '<?php echo "$targa";?>' >
        <input type="hidden" name="timbro" value = '<?php echo "$timbro";?>' >
        <input type="hidden" name="noteTimbro" value = '<?php echo "$noteTimbro";?>' >
        <input type="hidden" name="firma" value = '<?php echo "$firma";?>' >
        <input type="hidden" name="noteFirma" value = '<?php echo "$noteFirma";?>' >
        <input type="hidden" name="annotazioni" value = '<?php echo "$annotazioni";?>' >
        <input type="hidden" name="code" value = '<?php echo "$codiceIdentificativo";?>' >
        <input type="hidden" name="keywordsOpera" value = '<?php echo "$keywordsOpera";?>' >
    <table style="width:100%; margin-top:-20px; margin-left:20px;">
    <?php

    // SE NON È UN NUOVO AUTORE ASSOCIA LA FOTO AD UNO ESISTENTE
    $result = $db->query("SELECT `id` FROM `Utente` WHERE `Nome`='$nome' AND `Cognome`='$cognome' AND `Giorno_nascita`='$giornoNascita' AND `Mese_nascita`='$meseNascita' AND `Anno_nascita`='$annoNascita' AND `Luogo_nascita`='$luogoNascita' ");
    while($users = mysqli_fetch_array($result)){
      $opere = $db->query("SELECT `Titolo`, `Codice_identificativo` FROM `Fotografia` WHERE `Autore_id`=$users[0] LIMIT 1");
      while($photo = mysqli_fetch_array($opere)){
        ?><tr><td>
        <!-- PASSAGGIO DEI DATI -->
        <input type="radio" checked name="userID" value='<?php echo "$users[0]";?>' >
        <?php
        echo "<b>Autore: </b>".$nome." ".$cognome."</td><td><b>Titolo: </b>".$photo['Titolo']."</td><td><b>Codice Identificativo: </b>".$photo['Codice_identificativo']."</td>";?><br>
        </td></tr><?php
      }
    }
    // SE NON È UN NUOVO AUTORE ASSOCIA LA FOTO AD UNO ESISTENTE
    $result = $db->query("SELECT `id` FROM `Utente` WHERE `Nome`='$nome' AND `Cognome`='$cognome' AND `Tipologia`='Altro'");
    while($users = mysqli_fetch_array($result)){
      $codFiscale = $db->query("SELECT `Codice_fiscale` FROM `Utente` WHERE `Nome`='$nome' AND `Cognome`='$cognome' AND `Tipologia`='Altro'");
      while($codiceFiscale = mysqli_fetch_array($codFiscale)){
        ?><tr><td>
        <input type="radio" checked name="userID" value='<?php echo "$users[0]";?>' >
        <?php
        echo "<b>Utente: </b>".$nome." ".$cognome."</td><td><b>Codice Fiscale: </b>".$codiceFiscale['Codice_fiscale']."</td>";?><br>
        </td></tr><?php
      }
    }
    
    ?></table>
      <hr style="margin-left:100px;margin-right:100px;" class="horizontalLine">
      <div class="w3-row w3-padding-16 w3-center">
        <button type="submit" style="background-color:green;color:white;" class="w3-button w3-center w3-small" name="opera[]">PROSEGUI <i class="fa fa-step-forward"></i></button>
      </div>
      </form>

  <?php
  
  }

}

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


// FUNZIONE PER APRIRE LA BARRA LATERALE DI SINISTRA
function openNav() {
  if (window.innerWidth > 600) {   
    event.stopPropagation();
    document.getElementById("mySidebar").style.width = "225px";
    document.getElementById("main").style.marginLeft = "225px";
    document.getElementById("container").style.marginLeft = "225px";
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
    document.getElementById("container").style.marginLeft = "0px";
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

// PER VISUALIZZARE IL MESSAGGIO QUANDO VIENE SPUNTATO IL TOGGLE.
function myFunctionToggle2() {
  var checkBox2 = document.getElementById("myCheck2");
  var text2 = document.getElementById("text2");
  if (checkBox2.checked == true){
    text2.style.display = "block";
  } else {
     text2.style.display = "none";
  }
}

window.addEventListener("beforeunload", function () {
  document.body.classList.add("animate-out");
});

// When the user scrolls the page, execute myFunction 
function myFunction_progressBar() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
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
</div>
</div>
</body>
</html>