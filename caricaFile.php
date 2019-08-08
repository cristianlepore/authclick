<!DOCTYPE html>
<html lang="en">
<title>App</title>
<meta charset="UTF-8">
<!-- CONSENTE LA VISUALIZZAZIONE SU SMARTPHONES -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- HASH AUTORE DELLA PAGINA WEB -->
<meta name="author" content="68bf9588feee255538e722cce5971af3c9f50e5ed8e06b876032e9fb98c5a9f62036c47cf20f4022eac95154f1a88b65aef367eefa36898fc8e9e850be1af275">
<!-- CARICO IL MIO FOGLIO DI STILE -->
<link rel="stylesheet" href="css/style.css">
<!-- CARICO LE IMMAGINE PRENDENDOLE ONLINE -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>

<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

?>
<br><br>
<?php

// QUESTA PARTE DEVE ESSERE MESSA DOPO CHE PRELEVO LA POST DA IDPHOTO -- RIGA SOPRA
$codIdentificativo = $_POST['codIdentificativo'];
$codIdentificativo = strtoupper($codIdentificativo);

$unicoFile = 0;

// INSERISCO ID DELLA FOTOGRAFIA
$result = $db->query("SELECT `id` FROM `Fotografia` WHERE `Codice_identificativo`= '$codIdentificativo'");
$row = mysqli_fetch_row($result);
$idPhoto = $row[0];

// DEFINIZIONE DI COSTANTI
$targetDir = "uploads/";
$forwSlash = "/";

// PRENDO IL NOME DEL FILE CARICATO AL SOLO SCOPO DI TROVARNE L'ESTENSIONE.
$fileName = basename($_FILES["file"]["name"]);
$fileType = pathinfo($fileName,PATHINFO_EXTENSION);

// LEGGO IL NOME PROPOSTO DALL'UTENTE AL FILE.
$fileName = $_POST['nomeFile'];
// FORMATTO LA STRINGA IN MODO DA POTER MEMORIZZARE ANCHE CARATTERI DI ESCAPE SUL DATABASE.
$fileName = mysqli_real_escape_string($db,$fileName);
// AGGIUNGO L'ESTENSIONE LETTA PRIMA AL NOME FILE FORNITO DALL'UTENTE.
$fileName = $fileName .".". $fileType;

$targetDir = $targetDir . $codIdentificativo . $forwSlash;
$targetFilePath = $targetDir . $fileName;
$tipoFile = $_POST['tipo'];

// VERIFICO CHE LA FOTOGRAFIA SIA NEL DATABASE
$result = $db->query("SELECT `id` FROM `Fotografia` WHERE `id` = $idPhoto ");
if ($result->num_rows == 0) {
    $statusMsg="ATTENZIONE! Non esiste alcuna foto con questo codice identificativo nel sistema.";
}else{
    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        // DECIDO I FORMATI CHE POSSO IMPORTARE
        $allowTypes = array('doc','docx','pdf', 'docm', 'dot', 'dotm', 'dotx', 'odt', 'jpg', 'jpeg', 'bmp', 'png', 'gif');
        if(in_array($fileType, $allowTypes)){

            // CONTROLLO SE IL NOME DEL FILE ESISTE GIÀ NEL DATABASE PER LA STESSA FOTOGRAFIA E PER LA STESSA TIPOLOGIA (NON AMMISSIBILE).
            $result = $db->query("SELECT `id` FROM `File` WHERE `Fotografia_id`= $idPhoto AND `Nome` = '$fileName' AND `Tipologia` = '$tipoFile' ");
            if ($result->num_rows > 0) {
                $statusMsg = "<b>ATTENZIONE !</b><p style='color:red;'>"."<b>NOME del file già esistente.<br></b></p>Cambiare nome e ricaricarlo.";
            }else{
              // PREPARO PER LO SPOSTAMENTO DEL FILE
              move_uploaded_file($_FILES['file']['name'], $move);

              // CREO LA CARTELLA PER SALVARVICI I DOCUMENTI
              mkdir($targetDir);

              // SETTO IL FLAG
              $unicoFile = 1;

              // CREO LA CARTELLA ANNIDATA
              $targetDir = $targetDir.$tipoFile.$forwSlash;
              mkdir($targetDir, 0777, true);
              
              // LO SPOSTO NELLA CARTELLA DI DESTINAZIONE CON IL NUOVO NOME ASSEGNATOGLI DALL'UTENTE
              if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir.$fileName)){
                // AGGIORNO IL DATABASE
                // SPOSTO IL FLAG DELL'ULTIMO FILE CARICATO IN PRECEDENZA SU OFF PER INDICARE CHE NON SARÀ PIÙ L'ULTIMO FILE.
                $insert = $db->query("UPDATE `File` SET `Last`=0 WHERE `Tipologia`='$tipoFile' AND `Fotografia_id`=$idPhoto ORDER BY `id` DESC LIMIT 1 ");
                if($insert){
                  // AGGIUNGO IL NUOVO FILE AL DATABASE E GLI SETTO IL FLAG SU ON PER INDICARE CHE È L'ULTIMO.
                  $insert = $db->query("INSERT INTO `File`(`Tipologia`, `Nome`, `Fotografia_id`, `Path`, `Last`) VALUES ('$tipoFile','$fileName',$idPhoto,'$targetDir', 1 )");
                  if($insert){
                    $statusMsg = "<i class='fa fa-check'></i> Il file <b>".$fileName. "</b> è stato caricato con successo.";
                  }else{
                    $statusMsg = "<i class='fa fa-warning'></i>"."ERRORE. Caricamento del file al database non riuscito.";
                  }
                }
              }else{
                $statusMsg = "<i class='fa fa-warning'></i>"."ERRORE nel caricamento del file.";
              }
            }
          }else{
            $statusMsg = 'Puoi caricare soltanto i file nei formati previsti. <div class="w3-padding-16">I formati previsti sono: <i> doc, docx, pdf, docm, dot, dotm, dotx, odt, jpg, jpeg, bmp, png, gif.</i></div>';
        }
    }else{
        $statusMsg = "<i class='fa fa-warning'></i>"."Per proseguire è necessario selezionare un file da caricare.";
    }
}

if($unicoFile == 0) {
//Set Refresh header using PHP.
header( "refresh:5;url=/authclick/new/files.html" );

?>

<body class="animate-in" id="animate-in">

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>

<!-- BARRA DI NAVIGAZIONE --> 
<div id="w3-top" class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <div onclick="closeNav()"><a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a></div>
    <a href="form.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">AUTENTICA</a>
    <a href="files.html" style="border-bottom: 2px solid white;" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
    <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
    <a href="contratto.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">CONTRATTI</a>
    <a href="contratto.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">CONTRATTI</a>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="files.html" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
  <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large" >TRASFERIMENTI</a>
  <a href="contratto.html" class="w3-bar-item w3-button w3-padding-large" >CONTRATTI</a>
</div>

<!-- INDICATORE DELLA BARRA DEL PROGRESSO -->
<div id="header" class="header">
  <div id="progress-container" class="progress-container">
    <div class="progress-bar" id="myBar"></div>
  </div>  
</div>

<!-- FOOTNOTE CHE SCRIVE IL MESSAGGIO PER RIMANDARE ALLA HOME PAGE -->
<div id="main" onclick="closeNav2()">
<div class="main" style="margin-top:20px;">
  <div class="container">
    <br>
    <div class="w3-center"><i class="fa fa-warning"></i>
<?php
    echo "$statusMsg";
?>
    </div>
    <br>
    <hr class="horizontalLine" style="margin-left:100px;margin-right:100px;">
    <br>
    <p class="w3-opacity w3-center">
    <i>
    ...pochi istanti ancora. Ti stiamo reindirizzando alla HOME page.
    </i></p><br>
</div>
</div>
<div class="w3-padding-16"></div>
<div class="w3-center">
<!-- BOTTONE PER TORNARE INDIETRO -->
<button type="button" class="w3-black w3-button" style="background-color:green;" onclick="window.location.href='/authclick/new/files.html'">
  <i class="fa fa-backward"></i> INDIETRO
</button>
</div>

</body>

<?php
}
else if($unicoFile==1){
    //Set Refresh header using PHP.
    header( "refresh:5;url=/authclick/new/files.html" );

?>

<body class="animate-in" id="animate-in">

<!-- BOTTONE IN BASSO A DESTRA DI RITORNO AD INIZIO PAGINA -->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-caret-up"></i></button>

<!-- BARRA DI NAVIGAZIONE --> 
<div id="w3-top" class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <div onclick="closeNav()"><a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a></div>
    <a href="form.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">AUTENTICA</a>
    <a href="files.html" style="border-bottom: 2px solid white;" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
    <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
    <a href="contratto.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">CONTRATTI</a>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="files.html" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
  <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large" >TRASFERIMENTI</a>
  <a href="contratto.html" class="w3-bar-item w3-button w3-padding-large" >CONTRATTI</a>
</div>

<!-- INDICATORE DELLA BARRA DEL PROGRESSO -->
<div id="header" class="header">
  <div id="progress-container" class="progress-container">
    <div class="progress-bar" id="myBar"></div>
  </div>  
</div>

<!-- FOOTNOTE CHE SCRIVE IL MESSAGGIO PER RIMANDARE ALLA HOME PAGE -->
<div id="main" onclick="closeNav2()">
<div class="main" style="margin-top:20px;">
<div class="container">

<div class="w3-center">
<?php
    echo "$statusMsg";
?>
</div><br>
<hr class="horizontalLine" style="margin-left:100px;margin-right:100px;">
    <br><br>
    <p class="w3-opacity w3-center">
    <i>
    ...pochi istanti ancora. Ti stiamo reindirizzando alla HOME page.
    </i></p><br>
</div>
</body>

<?php
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

</script>

</body>
</html>