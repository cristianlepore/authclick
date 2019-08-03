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
<!-- INSERISCO LO SCRIPT AJAX PER LE DATE -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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

//Set Refresh header using PHP.
header( "refresh:10000;url=//form.php" );

// QUESTA PARTE SERVE PER CANCELLARE I FILE RIMASTI NELLA CARTELLA TEMPORANEA.
$files = glob('uploads/*'); // get all file names
foreach($files as $file){ // iterate files
    if(is_file($file))
        unlink($file); // delete file
}

?>

<body id="animate-in" class="animate-in">

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>

<!-- BARRA DI NAVIGAZIONE --> 
<div id="w3-top" class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <button style="font-size:20px;cursor:pointer;" class="w3-button w3-left" onclick="openNav()">&#9776;</button>
    <div onclick="closeNav()"><a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a></div>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">AUTENTICA</a>
    <a href="files.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
    <a href="trasferimenti.php" data-transition="pop" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
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
      <a style="font-size:14px;" href="#giornoScatto"><i>Data di stampa</i></a>
      <a style="font-size:14px;" href="#giornoStampa"><i>Dimensioni</i></a>
      <a style="font-size:14px;" href="#giornoStampa"><i>Tecnica di scatto</i></a>
      <a style="font-size:14px;" href="#giornoStampa"><i>Tecnica di stampa</i></a>
      <a style="font-size:14px;" href="#tecnicaStampa"><i>Supporto</i></a>
      <a style="font-size:14px;" href="#supporto"><i>Open edition</i></a>
      <a style="font-size:14px;" href="#supporto"><i>Tiratura</i></a>
      <a style="font-size:14px;" href="#artistProof"><i>Esemplare</i></a>
      <a style="font-size:14px;" href="#noteNumeroEsemplare"><i>Timbro</i></a>
      <a style="font-size:14px;" href="#noteNumeroEsemplare"><i>Firma</i></a>
      <a style="font-size:14px;" href="#myCheck2"><i>Annotazioni</i></a>
      <a style="font-size:14px;" href="#keywordsOpera"><i>Keywords</i></a>
    </div>
  </div>
</div>

<!-- INIZIO DEL FORM PER INSERIRE AUTENTICA -->
<div id="main" onclick="closeNav2()">
<div class="main">
<div class="container">
  <h3 class="w3-center"><i class="fa fa-user"></i> AUTORE DELL'OPERA</h3>
  <p style="color:red;">In rosso i campi obbligatori.</p>
  <hr class="horizontalLine">
  
  <form name="myForm" action="/authclick/new/insertAutentica.php" method="post" onsubmit="return validateform()">
  <!-- INSERISCO INFORMAZIONI RELATIVE ALL'AUTORE -->
  <div class="row">
    <div class="col-25">
      <label for="nome"><i class="fa fa-user"></i> Nome</label>
    </div>
    <div class="col-75">
      <input type="text" id="nome" name="nome" placeholder="es: Mario" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-25">
      <label for="cognome"><i class="fa fa-user"></i> Cognome</label>
    </div>
    <div class="col-75">
      <input type="text" id="cognome" name="cognome" placeholder="es: Rossi" required>
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="luogoNascita"><i class="fa fa-institution"></i> Luogo di nascita</label>
    </div>
    <div class="col-75">
      <input type="text" id="luogoNascita" name="luogoNascita" placeholder="es: Milano" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-25">
      <label for="annoNascita"><i class="fa fa-calendar-check-o"></i> Data di nascita</label>
    </div>
    <div class="col-75">
      <div style="margin-top:12px;" class="w3-col m1 w3-left"></div>
      <div class="w3-col m3 w3-center">
        <select style="width:80%;" id="giornoNascita" name="giornoNascita">
          <option value=0> Giorno </option>
        </select>
      </div>
      <div style="margin-top:12px;" class="w3-col m1 w3-center"> <b> &#47; </b> </div>
      <div class="w3-col m3 w3-center">
        <select style="width:80%;" id="meseNascita" name="meseNascita">
          <option value=""> Mese </option>
        </select>
      </div>
      <div style="margin-top:12px;" class="w3-col m1 w3-center"> <b> &#47; </b></div>
      <div class="w3-col m3 w3-center">
        <input type="numeric" style="width:80%;margin-top:8px;" id="annoNascita" name="annoNascita" placeholder=" Anno -- yyyy" required>
      </div>
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="luogoMorte"><i class="fa fa-institution"></i> Luogo di morte</label>
    </div>
    <div class="col-75">
      <input type="text" id="luogoMorte" name="luogoMorte" placeholder="es: Roma">
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="annoMorte"><i class="fa fa-calendar-times-o"></i> Data del decesso</label>
      </div>
      <div class="col-75">
      <div style="margin-top:12px;" class="w3-col m1 w3-left"></div>
      <div class="w3-col m3 w3-center">
        <select style="width:80%;" id="giornoDecesso" name="giornoDecesso">
          <option value=0> Giorno </option>
        </select>
      </div>
      <div style="margin-top:12px;" class="w3-col m1 w3-center"> <b> &#47; </b> </div>
      <div class="w3-col m3 w3-center">
        <select style="width:80%;" id="meseDecesso" name="meseDecesso">
          <option value=""> Mese </option>
        </select>
      </div>
      <div style="margin-top:12px;" class="w3-col m1 w3-center"> <b> &#47; </b></div>
      <div class="w3-col m3 w3-center">
        <input type="numeric" style="width:80%;margin-top:8px;" id="annoDecesso" name="annoDecesso" placeholder=" Anno -- yyyy">
      </div>
    </div>
  </div>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="keywords"><i class="fa fa-bookmark"></i> Keywords</label>
    </div>
    <div class="col-75">
      <input type="text" id="keywords" name="keywords" placeholder="es: Mario, autore, ecc...">
    </div>
  </div>
  <br>
</div>
</div>



<!-- INSERISCO INFORMAZIONI RELATIVE ALL'OPERA -->

<div class="main" id="opera">
<div class="container">
<h3 class="w3-center"><i class="fa fa-photo"></i> INFORMAZIONI SULL'OPERA</h3>
<p style="color:red;">In rosso i campi obbligatori.</p>
<hr class="horizontalLine">
<br>
  <div class="row">
    <div class="col-25">
      <label for="titolo"><i class="fa fa-flag-o"></i> Titolo</label>
    </div>
    <div class="col-75">
      <input type="text" id="titolo" name="titolo" placeholder="es: Tramonto" required>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="dataScatto"><i class="fa fa-calendar-check-o"></i> Data di scatto</label>
    </div>
    <div class="col-75">
    <div style="margin-top:12px;" class="w3-col m1 w3-left"></div>
      <div class="w3-col m3 w3-center">
        <select style="width:80%;" id="giornoScatto" name="giornoScatto">
          <option value=0> Giorno </option>
        </select>
      </div>
      <div style="margin-top:12px;" class="w3-col m1 w3-center"> <b> &#47; </b> </div>
      <div class="w3-col m3 w3-center">
        <select style="width:80%;" id="meseScatto" name="meseScatto">
          <option value=""> Mese </option>
        </select>
      </div>
      <div style="margin-top:12px;" class="w3-col m1 w3-center"> <b> &#47; </b></div>
      <div class="w3-col m3 w3-center">
        <input type="numeric" style="width:80%;margin-top:8px;" id="annoScatto" name="annoScatto" placeholder=" Anno -- yyyy" required >
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="dataStampa"><i class="fa fa-calendar-check-o"></i> Data di stampa</label>
    </div>
    <div class="col-75">
      <div style="margin-top:12px;" class="w3-col m1 w3-left"></div>
      <div class="w3-col m3 w3-center">
        <select style="width:80%;" id="giornoStampa" name="giornoStampa">
          <option value=0> Giorno </option>
        </select>
      </div>
      <div style="margin-top:12px;" class="w3-col m1 w3-center"> <b> &#47; </b> </div>
      <div class="w3-col m3 w3-center">
        <select style="width:80%;" id="meseStampa" name="meseStampa">
          <option value=""> Mese </option>
        </select>
      </div>
      <div style="margin-top:12px;" class="w3-col m1 w3-center"> <b> &#47; </b></div>
      <div class="w3-col m3 w3-center">
        <input type="numeric" style="width:80%;margin-top:8px;" id="annoStampa" name="annoStampa" placeholder=" Anno -- yyyy" required>
      </div>
    </div>
  </div>
  <br>
  <hr class="horizontalLine">

  
  <div class="row">
    <div class="col-25">
      <label for="dimensioni"><i class="fa fa-photo"></i> Dimensioni</label>
    </div>
    <div class="col-75">
      <div class="w3-col m6 w3-center">
        <input type="numeric" style="width:50%;margin-top:8px; width:150px;" id="lunghezza" name="lunghezza" placeholder=" Lunghezza" required>
      </div>
      <div class="w3-center w3-col m6">
        <input type="numeric" style="width:50%;margin-top:8px;width:150px;" id="larghezza" name="larghezza" placeholder=" Larghezza" required>
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="tecnicaScatto"><i class="fa fa-camera"></i> Tecnica di scatto</label>
    </div>
    <div class="col-75">
    <select name="tecnicaScatto">
      <option value="digitale">Digitale</option>
      <option value="analogica">Analogica</option>
      <option value="altro">Altro</option>
    </select>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="tecnicaStampa"><i class="fa fa-camera"></i> Tecnica di stampa</label>
    </div>
    <div class="col-75">
      <input type="text" id="tecnicaStampa" name="tecnicaStampa" placeholder="es: stampa digitale ai pigmenti di colore" required>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="supporto"><i class="fa fa-object-group"></i> Supporto</label>
    </div>
    <div class="col-75">
      <input type="text" id="supporto" name="supporto" placeholder="es: carta opaca" required >
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="timbro"><i class="fa fa-eye"></i> Open edition</label>
    </div>
    <div class="col-75" style="margin-top:12px;">
      <label class="switch">
        <input type="checkbox" id="openEdition" name="openEdition">
        <div class="slider round"></div>
      </label>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="tiratura"><i class="fa fa-copy"></i> Tiratura</label>
    </div>
    <div class="col-75">
      <div class="w3-left w3-col m4" style="margin: 15px 0 0;">
        Numero copie:
      </div>
      <div class="w3-col m4 w3-left">
        <input type="numeric" style="margin-top:8px; width:100%;" id="numeroCopie" name="numeroCopie" value="0" placeholder=" es: 10">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-25"></div>
    <div class="w3-left col-25" style="margin: 15px 0 0;">
      <label for="noteNumeroCopie">Note aggiuntive:</label>
    </div>
    <div class="w3-col m6">
      <input type="text" style="margin-top:6px;width:100%;" id="noteNumeroCopie" name="noteNumeroCopie" placeholder="es: Due formati 30 x 40 e 20 x 30 + 8 AP ">
    </div>
  </div>
  <div class="row">
    <div class="col-25"></div>
    <div class="w3-left col-25" style="margin: 15px 0 0;">
      <label for="artistProof">Artist's proof:</label>
    </div>
    <div class="w3-col m2" style="margin-top:15px;">
        <select style="width:70%;" id="artistProof" name="artistProof">
          <option value="0"> Numero </option>
          <?php for ($artistProof=1; $artistProof <= 100; $artistProof++): ?>
            <option value="<?=$artistProof;?>"><?=$artistProof;?></option>
          <?php endfor; ?>
        </select>
      </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="esemplare"><i class="fa fa-photo"></i> Esemplare</label>
    </div>
    <div class="col-75">
      <div class="w3-left w3-col m4" style="margin: 15px 0 0;">
        Numero esemplare:
      </div>
      <div class="w3-col m4 w3-left">
        <input type="numeric" style="margin-top:8px;width:100%;" id="numeroEsemplare" name="numeroEsemplare" value="0" placeholder=" es: 2">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-25"></div>
    <div class="w3-left col-25" style="margin: 15px 0 0;">
      <label for="noteNumeroEsemplare">Note aggiuntive:</label>
    </div>
    <div class="w3-col m6">
      <input type="text" style="margin-top:6px;width:100%;" id="noteNumeroEsemplare" name="noteNumeroEsemplare" placeholder="es: primo esemplare del formato 30 x 40" >
    </div>
  </div>
  <br>
  <hr class="horizontalLine">

  <div class="row">
    <div class="col-25">
      <label for="targa"><i class="fa fa-tag"></i> Targa</label>
    </div>
    <div class="col-75" style="margin-top:16px;">
      <input type="numeric" id="targa" style="width:100%;" name="targa" placeholder=" es: 0001" required>
    </div>
  </div>
  <hr class="horizontalLine">

  <div class="row">
    <div class="col-25">
      <label for="timbro"><i class="fa fa-trademark"></i> Timbro</label>
    </div>
    <div class="col-75" style="margin-top:12px;">
      <label class="switch">
        <input type="checkbox" id="myCheck" name="timbro" onclick="myFunctionToggle()">
        <div class="slider round">
          <div class="w3-row" id="text" style="margin-top:3px;width:200px;font-size:16px;margin-left:150px;color:black;display:none">
            <i class="fa fa-check"></i> L'opera è stata timbrata
          </div>
        </div>
      </label>
      <input id="textTimbro" name="noteTimbro" class="col-50" type="text" style="margin-top:18px;display:none;" placeholder=" es: Timbrata con timbro dell'artista">
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="firma"><i class="fa fa-pencil"></i> Firma</label>
    </div>
    <div class="col-75" style="margin-top:12px;">
      <label class="switch">
        <input type="checkbox" id="myCheck2" name="firma" onclick="myFunctionToggle2()">
        <div class="slider round">
          <div class="w3-row" id="text2" style="margin-top:6px;width:200px;font-size:16px;margin-left:80px;color:black;display:none"><i class="fa fa-check"></i> L'opera è stata firmata</div>
        </div>
      </label>
      <input id="textFirma" name="noteFirma" class="col-50" type="text" style="margin-top:18px;display:none;" placeholder=" es: Firmata con firma dell'artista">
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="annotazioni"><i class="fa fa-edit"></i> Annotazioni</label>
    </div>
    <div class="col-75">
      <textarea id="annotazioni" name="annotazioni" placeholder="Scrivi qui le annotazioni per la fotografia." style="height:200px"></textarea>
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  
  <div class="row">
    <div class="col-25">
    <label for="code"><i class="fa fa-tag"></i> Codice identificativo</label>
  </div>
  <div class="col-75">
    <input type="text" id="code" name="code" placeholder="es: MRT000100" required>
  </div>
  </div>
  <br>
  <div class="row">
    <div class="col-25">
        <label for="keywordsOpera"><i class="fa fa-bookmark"></i> Keywords</label>
      </div>
      <div class="col-75">
        <input type="text" id="keywordsOpera" name="keywordsOpera" placeholder="es: prima opera, tramonto, digitale, ecc...">
      </div>
    </div>
    <br>
</div>
</div>
</div>
<div class="w3-padding-32"></div>
</div>

<div class="col-25"></div><div class="col-25"></div><div class="col-25"></div>
<div class="col-25 submitButton">
  <button type="submit" class="submitButton"><i class="fa fa-send"></i> <i class="prova">INVIA</i></button>
</div>
</form>

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
window.onscroll = function() {scrollFunction(); myFunction_progressBar();};

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


// VALIDO IL CONTENUTO INSERITO NEL FORM DALL'UTENTE.
function validateform(){  
  // INFORMAZIONI RELATIVE ALL'AUTORE
  var name=document.myForm.nome.value;  
  var cognome=document.myForm.cognome.value;  
  var luogoNascita=document.myForm.luogoNascita.value;
  var giornoNascita=document.myForm.giornoNascita.value;
  var meseNascita=document.myForm.meseNascita.value;
  var annoNascita=document.myForm.annoNascita.value;  
  var luogoMorte=document.myForm.luogoMorte.value; 
  var giornoMorte=document.myForm.giornoDecesso.value;  
  var meseMorte=document.myForm.meseDecesso.value;   
  var annoMorte=document.myForm.annoDecesso.value;

  // INFORMAZIONI RELATIVE ALL'OPERA
  var giornoScatto=document.myForm.giornoScatto.value;
  var meseScatto=document.myForm.meseScatto.value;
  var annoScatto=parseInt(document.myForm.annoScatto.value);    
  var giornoStampa=document.myForm.giornoStampa.value;
  var meseStampa=document.myForm.meseStampa.value;
  var annoStampa=parseInt(document.myForm.annoStampa.value);
  var lunghezza=document.myForm.lunghezza.value;
  var larghezza=document.myForm.larghezza.value;
  var numeroCopie=parseInt(document.myForm.numeroCopie.value);
  var numeroEsemplare=parseInt(document.myForm.numeroEsemplare.value);
  var targa=document.myForm.targa.value;
  var codeIdentificativo=document.myForm.code.value;

// VERIFICO CHE NEL FORM CI SIANO SOLO CARATTERI AMMISSIBILI.
  if(!/^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(name)){
    alert("Il campo NOME contiene caratteri non ammessi.");  
    return false; 
  }else if (!/^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(cognome)){
    alert("Il campo COGNOME contiene caratteri non ammessi.");  
    return false; 
  }else if (!/^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(luogoNascita)){
    alert("Il campo LUOGO DI NASCITA contiene caratteri non ammessi.");  
    return false; 
  }

  // VERIFICO IL CONTENUTO DEI CAMPI OPZIONALI RELATIVI ALL'AUTORE.
  if(luogoMorte!='' ){
    if(!/^$|^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(luogoMorte)){
      alert("Il campo LUOGO DI MORTE contiene caratteri non ammessi.");
      return false; 
    }

    if(annoMorte==''){
      alert("Completare anche il campo DATA DEL DECESSO.");
      return false;
    }

  }

  // VERIFICO LA CORRETTEZZA DELLA DATA DI NASCITA
  if(!/^\d{4}$/.test(annoNascita)){
    alert("ATTENZIONE, l'anno di nascita non è corretto.");
    return false;
  }

  // VERIFICO LA CORRETTEZZA DELLA DATA DEL DECESSO
  if(annoMorte!='') {
    if(!/^\d{4}$/.test(annoMorte)){
      alert("ATTENZIONE, l'anno del decesso non è corretto.");
      return false;
    }
  }

  if(annoMorte!=''){
    // VERIFICO CHE LA DATA DI MORTE SIA SUCCESSIVA A QUELLA DI NASCITA.
    if(annoNascita == annoMorte){
      alert("ATTENZIONE, l'anno di nascita e quello di morte non possono coincidere.");
      return false;
    }else if(annoNascita > annoMorte){
      alert("ATTENZIONE, la data del decesso non può essere antecedente alla data di nascita.");
      return false;
    }

    if(luogoMorte==''){
      alert("Completare anche il campo LUOGO DI MORTE.");
      return false;
    }

  }

  if(annoScatto > annoStampa){
    alert("ATTENZIONE, la data di stampa dell'opera deve essere successiva alla data di scatto.");
    return false;
  }

  // VERIFICO LA CORRETTEZZA DELLA DATA DI SCATTO
  if(!/^\d{4}$/.test(annoScatto)){
    alert("ATTENZIONE, l'anno di scatto non è corretto.");
    return false;
  }

  // VERIFICO LA CORRETTEZZA DELLA DATA DI STAMPA
  if(!/^\d{4}$/.test(annoStampa)){
    alert("ATTENZIONE, l'anno di stampa non è corretto.");
    return false;
  }

  // VERIFICO CHE I CAMPI LUNGHEZZA E LARGHEZZA SIANO NUMERICI ED AL MASSIMO CON 2 CIFRE DECIMALI.
  if(!/^\d{1,7}\.?\d{0,2}$/.test(lunghezza)){
    alert("Il campo LUNGHEZZA non contiene un valore valido. I decimali devono essere separati da un punto. Es: 50.25");
    return false; 
  }
    
  if(!/^\d{1,7}\.?\d{0,2}$/.test(larghezza)){
    alert("Il campo LARGHEZZA non contiene un valore valido. I decimali devono essere separati da un punto. Es: 50.25");
    return false; 
  }

  // CONTROLLO SUL NUMERO COPIE
  if(numeroCopie!=0){
    if(!/^\d+$/.test(numeroCopie)){
      alert("Il campo NUMERO COPIE (in Tiratura) può contenere solo un numero intero.");
      return false;
    }
  }

  // CONTROLLO SUL NUMERO DELL'ESEMPLARE DELLA FOTOGRAFIA
  if(numeroEsemplare!=0){
    if(!/^\d+$/.test(numeroEsemplare)){
      alert("Il campo NUMERO ESEMPLARE in Esemplare può contenere solo un numero intero.");
      return false;
    }
  }

  // VERIFICO CHE IL NUMERO COPIE SIA SEMPRE PIÙ GRANDE O AL PIÙ UGUALE AL NUMERO DELL'ESEMPLARE DELLA FOTOGRAFIA
  if(numeroCopie < numeroEsemplare){
    alert("Il numero di copie (in Tiratura) non può essere minore del numero dell'esemplare.");
    return false;
  }

  // VERIFICO CHE LA DATA DI SCATTA DELLA FOTOGRAFIA NON SIA ANTECEDENTE ALLA DATA DI NASCITA DELL'AUTORE E SUCCESSIVA ALLA DATA DI MORTE
  if(annoMorte!=''){
    if((annoScatto < annoNascita) || (annoScatto > annoMorte)){
      alert("L'anno di scatto della fotografia deve essere successivo alla data di nascita dell'autore e antecedente alla data del decesso.");
      return false;
    }
  }else{
    if(annoScatto < annoNascita){
      alert("L'anno di scatto della fotografia deve essere successivo alla data di nascita dell'autore.");
      return false;
    }
  }

  // VERIFICO IL CONTENUTO DELLA TARGA. DEVE ESSERE PER FORZA UN NUMERO CON 4 CIFRE.
  if(!/^[0-9]{4}$/.test(targa)){
    alert("Il campo TARGA deve contenere un numero di 4 cifre.");
    return false;
  }

  // Verifico il codice identificativo.
  if(!/^[a-zA-Z]{3}\d{4,8}$/.test(codeIdentificativo)){
    alert("Il campo CODICE IDENTIFICATIVO contiene una stringa non ammessa.");
    return false;
  }

} 

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

// PER VISUALIZZARE IL MESSAGGIO QUANDO VIENE SPUNTATO IL TOGGLE TIMBRO.
function myFunctionToggle() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
  var textTimbro = document.getElementById("textTimbro");
  if (checkBox.checked == true){
    textTimbro.style.display = "block";
  } else {
    textTimbro.style.display = "none";
  }
}

// PER VISUALIZZARE IL MESSAGGIO QUANDO VIENE SPUNTATO IL TOGGLE FIRMA.
function myFunctionToggle2() {
  var checkBox2 = document.getElementById("myCheck2");
  var text2 = document.getElementById("text2");
  if (checkBox2.checked == true){
    text2.style.display = "block";
  } else {
     text2.style.display = "none";
  }
  var textFirma = document.getElementById("textFirma");
  if (checkBox2.checked == true){
    textFirma.style.display = "block";
  } else {
    textFirma.style.display = "none";
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

// FUNZIONE PER LA DATA DI NASCITA
$(document).ready(function() {
const monthNames = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno",
  "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"
];

  // FUNZIONE PER LA DATA DI NASCITA
  var qntYears = 1000;
  var selectYear = $("#annoNascita");
  var selectMonth = $("#meseNascita");
  var selectDay = $("#giornoNascita");

  for (var m = 0; m < 12; m++){
    let monthNum = new Date(2019, m).getMonth()
    let month = monthNames[monthNum];
    var monthElem = document.createElement("option");
    monthElem.value = monthNum; 
    monthElem.textContent = month;
    selectMonth.append(monthElem);
  }

  var d = new Date();
  var month = "";
  var year = "";
  var day = "";

  selectYear.val(year); 
  selectYear.on("change", AdjustDays);  
  selectMonth.val(month);    
  selectMonth.on("change", AdjustDays);

  AdjustDays();
  selectDay.val(day)

  function AdjustDays(){
    var year = selectYear.val();
    var month = parseInt(selectMonth.val()) + 1;
    selectDay.empty();
    
    //get the last day, so the number of days in that month
    var days = new Date(year, month, 0).getDate(); 
    
    //lets create the days of that month
    for (var d = 1; d <= days; d++){
      var dayElem = document.createElement("option");
      dayElem.value = d; 
      dayElem.textContent = d;
      selectDay.append(dayElem);
    }
  } 

});


// FUNZIONE PER LA DATA DI MORTE
$(document).ready(function() {
const monthNames = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno",
  "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"
];

 // FUNZIONE PER LA DATA DI MORTE
 var selectYear = $("#annoDecesso");
  var selectMonth = $("#meseDecesso");
  var selectDay = $("#giornoDecesso");

  for (var m = 0; m < 12; m++){
    let monthNum = new Date(2019, m).getMonth()
    let month = monthNames[monthNum];
    var monthElem = document.createElement("option");
    monthElem.value = monthNum; 
    monthElem.textContent = month;
    selectMonth.append(monthElem);
  }

  var d = new Date();
  var month = "";
  var year = "";
  var day = "";

  selectYear.val(year); 
  selectYear.on("change", AdjustDays);  
  selectMonth.val(month);    
  selectMonth.on("change", AdjustDays);

  AdjustDays();
  selectDay.val(day)

  function AdjustDays(){
    var year = selectYear.val();
    var month = parseInt(selectMonth.val()) + 1;
    selectDay.empty();
    
    //get the last day, so the number of days in that month
    var days = new Date(year, month, 0).getDate(); 
    
    //lets create the days of that month
    for (var d = 1; d <= days; d++){
      var dayElem = document.createElement("option");
      dayElem.value = d; 
      dayElem.textContent = d;
      selectDay.append(dayElem);
    }
  } 

});

// FUNZIONE PER LA DATA DI SCATTO DELL'OPERA
$(document).ready(function() {
const monthNames = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno",
  "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"
];

  // FUNZIONE PER LA DATA DI SCATTO DELL'OPERA
  var qntYears = 1000;
  var selectYear = $("#annoScatto");
  var selectMonth = $("#meseScatto");
  var selectDay = $("#giornoScatto");

  for (var m = 0; m < 12; m++){
    let monthNum = new Date(2019, m).getMonth()
    let month = monthNames[monthNum];
    var monthElem = document.createElement("option");
    monthElem.value = monthNum; 
    monthElem.textContent = month;
    selectMonth.append(monthElem);
  }

  var d = new Date();
  var month = "";
  var year = "";
  var day = "";

  selectYear.val(year); 
  selectYear.on("change", AdjustDays);  
  selectMonth.val(month);    
  selectMonth.on("change", AdjustDays);

  AdjustDays();
  selectDay.val(day)

  function AdjustDays(){
    var year = selectYear.val();
    var month = parseInt(selectMonth.val()) + 1;
    selectDay.empty();
    
    //get the last day, so the number of days in that month
    var days = new Date(year, month, 0).getDate(); 
    
    //lets create the days of that month
    for (var d = 1; d <= days; d++){
      var dayElem = document.createElement("option");
      dayElem.value = d; 
      dayElem.textContent = d;
      selectDay.append(dayElem);
    }
  } 

});

// FUNZIONE PER LA DATA DI STAMPA DELL'OPERA
$(document).ready(function() {
const monthNames = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno",
  "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"
];

  // FUNZIONE PER LA DATA DI STAMPA DELL'OPERA
  var qntYears = 1000;
  var selectYear = $("#annoStampa");
  var selectMonth = $("#meseStampa");
  var selectDay = $("#giornoStampa");

  for (var m = 0; m < 12; m++){
    let monthNum = new Date(2019, m).getMonth()
    let month = monthNames[monthNum];
    var monthElem = document.createElement("option");
    monthElem.value = monthNum; 
    monthElem.textContent = month;
    selectMonth.append(monthElem);
  }

  var d = new Date();
  var month = "";
  var year = "";
  var day = "";

  selectYear.val(year); 
  selectYear.on("change", AdjustDays);  
  selectMonth.val(month);    
  selectMonth.on("change", AdjustDays);

  AdjustDays();
  selectDay.val(day)

  function AdjustDays(){
    var year = selectYear.val();
    var month = parseInt(selectMonth.val()) + 1;
    selectDay.empty();
    
    //get the last day, so the number of days in that month
    var days = new Date(year, month, 0).getDate(); 
    
    //lets create the days of that month
    for (var d = 1; d <= days; d++){
      var dayElem = document.createElement("option");
      dayElem.value = d; 
      dayElem.textContent = d;
      selectDay.append(dayElem);
    }
  } 

});

</script>

</body>
</html>
