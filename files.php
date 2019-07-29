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

<body class="animate-in" id="animate-in">

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>

<!-- BARRA DI NAVIGAZIONE --> 
<div id="w3-top" class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <button style="font-size:20px;cursor:pointer;" class="w3-button w3-left" onclick="openNav()">&#9776;</button>    
    <div onclick="closeNav()"><a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a></div>
    <a href="form.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">AUTENTICA</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
    <a href="trasferimenti.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
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
    <a class="collapsible"><i class="fa fa-upload"></i> Carica</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="#codIdentificativo"><i>Tipo di file</i></a>
      <a style="font-size:14px;" href="#tipo"><i>Nome file</i></a>
      <a style="font-size:14px;" href="#nomeFile"><i>Carica il file dal pc</i></a>
    </div>
    <a class="collapsible"><i class="fa fa-download"></i> Esporta</a>
    <div class="content" style="margin-left:30px;">
      <a style="font-size:14px;" href="#panel_esporta"><i>Codice identificativo fotografia</i></a>
    </div>
  </div>
</div>

<!-- SLIDEUP E SLIDEDOWN MENU DI CARICA -->
<div id="main" onclick="closeNav2()">
<div class="main">
  <div class="container">
  <h3 class="w3-wide w3-center"><i class="fa fa-upload"></i>
    CARICA DOCUMENTO
  </h3>
  <p class="w3-opacity w3-center"><i>Selezionare il file che si desidera caricare</i></p>
  <p style="color:red;">In rosso i campi obbligatori.</p>
  <hr class="horizontalLine">

  <div class="w3-row w3-padding-16"> 
    <div class="w3-left w3-col m6 w3-medium w3-padding-16"><i class="fa fa-tag"></i>
      Codice identificativo fotografia
    </div>
    <form name="myForm" action="/authclick/new/caricaFile.php" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
    <div class="w3-col m6">
        <div class="w3-center">
          <input type="text" placeholder="es: MRT000100" id="codIdentificativo" name="codIdentificativo" required>
        </div>
    </div>
  </div>

  <div class="w3-row w3-padding-16">
    <div class="w3-left w3-col m6 w3-medium"><i class="fa fa-file"></i>
      Tipo di file
    </div>
    <div class="w3-col m6">
        <div class="w3-center">
          <div class="w3-center ">
            <select name="tipo" style="width:200px;" id="tipo" class="w3-huge w3-button w3-content w3-left" required>
              <option value="Scheda" class="w3-button w3-white w3-section w3-center">Scheda</option>
              <option value="Foto" class="w3-button w3-white w3-section w3-center">Miniatura</option>
            </select>
          </div>
        </div>
    </div>
  </div>

  <div class="w3-row w3-padding-16"> 
    <div class="w3-left w3-col m6 w3-medium w3-padding-16"><i class="fa fa-folder"></i>
      Nome da assegnare al file
    </div>
    <div class="w3-col m6">
        <div class="w3-center">
          <input type="text" placeholder="es: Certificato_authclick" id="nomeFile" name="nomeFile" required>
        </div>
    </div>
  </div>

  <div class="w3-row w3-padding-16">
    <div class="w3-left w3-col m6 w3-medium w3-padding-16"><i class="fa fa-laptop"></i>
      Seleziona il file dal pc
    </div>
    <div class="w3-col m6">
    <div div class="col-25 w3-content w3-left">
      <input type="file" name="file" id="file" class="w3-left w3-small" style="margin: 6px 0px 0px 0px" onchange="uploadFile()" required>
    </div>
    <div class="col-25 w3-right" style="margin-top:20px;">
      <button type="submit" class="caricaFileButton" name="submit" style="margin: -12px 0px 0px 0px" onsubmit="return validateform()"><i class="fa fa-upload"></i> CARICA</button>
    </div>
    <div class="w3-col m6"></div>
    <div class="w3-col m6 w3-center" style="margin-top:6px;">
      <progress id="progressBar" value="0" max="100" style="margin-top:40px;width:200px;"></progress>
      <p id="loaded_n_total"></p>
    </div>
    </div>
    </form>
    </div>
  </div>
</div>

<!-- SLIDEUP E SLIDEDOWN MENU DI ESPORTA -->
<div id="panel_esporta">
<div class="main">
  <div class="container">
  <div class="w3-content" style="max-width:800px">
    <h3 class="w3-wide w3-center"><i class="fa fa-download"></i>
      VISUALIZZA ED ESPORTA DOCUMENTI
    </h3>
    <p class="w3-opacity w3-center"><i>Selezionare il file che si desidera scaricare</i></p>
    <p style="color:red;">In rosso i campi obbligatori.</p>
    <hr class="horizontalLine">

    <div class="w3-row w3-padding-16">
    <div class="w3-left w3-col m6 w3-medium w3-padding-16"><i class="fa fa-tag"></i> Codice identificativo fotografia
    </div>
    <form name="myFormEsporta" action="/authclick/new/esportaFile.php" method="post" onsubmit="return validateformEsporta()">
      <div class="w3-col m6">
        <div class="w3-center">
          <input type="text" placeholder="es: MRT000100" id="codIdentificativoEsporta" name="codIdentificativoEsporta" required>
        </div>
      </div>
    </div>
        <div class="col-75"></div>
        <div class="col-25">
          <button type="submit" style="width:100%;"class="caricaFileButton" style="margin: -12px 0px 0px 0px" onclick='check(); return false'><i class="fa fa-search"></i> CERCA</button>
        </div>
        <div class="w3-padding-32"></div>
      </form>
    </div>
  </div>
</div>

</div>
</div>
<div class="w3-padding-32"></div>

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

// VERIFICO LA CORRETTEZZA DEI DATI INSERITI
function validateform(){  
  var codIdentificativo=document.myForm.codIdentificativo.value;  

  // Verifico il codice identificativo.
  if(codIdentificativo!=''){
    if(!/^[a-zA-Z]{3}\d{4,6}$/.test(codIdentificativo)){
      alert("Il campo CODICE IDENTIFICATIVO contiene una stringa non ammessa.");
      return false;
    }
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

window.addEventListener("beforeunload", function () {
  document.body.classList.add("animate-out");
});

function closeNav2() {
  if (window.innerWidth > 600) {
  }else{
    document.getElementById("mySidebar").style.width = "0";
  }
}

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

// VALIDO IL CONTENUTO INSERITO NEL FORM DALL'UTENTE.
function validateform(){  
  // INFORMAZIONI RELATIVE ALL'AUTORE
  var nomeFile=document.myForm.nomeFile.value;
  var codIdentificativo=document.myForm.codIdentificativo.value;

  // VERIFICO CHE IL NOME DEL FILE INSERITO DALL'UTENTE NON CONTENGA DEI CARATTERI NON AMMESSI AL SUO INTERNO
  if(nomeFile.includes("'") || nomeFile.includes("/") ||  nomeFile.includes("#") ||  nomeFile.includes("%") || nomeFile.includes("§") ){
    alert("Il campo NOME del file inserito dall'utente contiene caratteri non ammessi. Il nome del file non deve contenere i seguenti caratteri: ' / § # % ");
    return false; 
  }

    // Verifico il codice identificativo.
    if(!/^[a-zA-Z]{3}\d{4,8}$/.test(codIdentificativo)){
    alert("Il campo CODICE IDENTIFICATIVO contiene una stringa non ammessa.");
    return false;
  }

}

function validateformEsporta(){  
  // INFORMAZIONI RELATIVE ALL'AUTORE
  var codIdentificativoEsporta=document.myFormEsporta.codIdentificativoEsporta.value;

  // Verifico il codice identificativo per la sezione esporta.
  if(!/^[a-zA-Z]{3}\d{4,8}$/.test(codIdentificativoEsporta)){
    alert("Il campo CODICE IDENTIFICATIVO contiene una stringa non ammessa.");
    return false;
  }

}

</script>

</body>
</html>