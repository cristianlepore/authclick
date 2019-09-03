<!DOCTYPE html>
<html lang="en">
<title>App</title>
<meta charset="UTF-8">

<!-- HASH AUTORE DELLA PAGINA WEB -->
<meta name="author" content="68bf9588feee255538e722cce5971af3c9f50e5ed8e06b876032e9fb98c5a9f62036c47cf20f4022eac95154f1a88b65aef367eefa36898fc8e9e850be1af275">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/formattazione.css">
<link rel="stylesheet" href="css/template.css">
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

  include 'dbConfig.php';
  $statusMsg = '';
  $idPhoto = $_POST['id'];
  $codIdentificativo = $_POST['codIdentificativoEsporta'];
  $codiceIdentificativo = strtoupper($codiceIdentificativo);
  $tipoToDelete = $_POST['delete'];
  $fileName = $_POST['fileName'];
  $targetDir = $_POST['path'];

  // QUESTO È UN FLAG CHE SERVE PER NON STAMPARE LO STORICO NEL CASO IN CUI IL CODICE IDENTIFICATIVO DELLA FOTOGRAFIA NON APPARTENGA A NESSUNA FOTO CARICATA AL SISTEMA
  $flagErrore = 0;

  // Cancello il file dal DB e dalla cartella.
  if($tipoToDelete!=''){

    // CANCELLO IL FILE DAL DATABASE (HO L'ID PRECISO DEL DOCUMENTO IN QUESTO CASO)
    $result = $db->query("DELETE FROM `File` WHERE `id`= $idPhoto ");
    
    // CANCELLO IL FILE.
    unlink($targetDir.$fileName);

    // SE LA CARTELLA RIMANENTE È VUOTA, LA POSSO CANCELLARE.
    $numFiles = 0;
    $files = glob($targetDir); // get all file names
    foreach($files as $file){ // iterate files
        if(is_file($file)){
          $numFiles++;
        }
        // SE TROVO ANCHE SOLO UN FILE, SMETTO DI ITERARE ED ESCO DAL LOOP. RISPARMIO TEMPO.
        if($numFiles>0){
          break;
        }
    }

    // SE LA CARTELLA SCHEDA O FOTO SONO VUOTE, LE POSSO CANCELLARE
    if($numFiles == 0){
      rmdir($targetDir);
    }

    // SE LA CARTELLA CON IL NOME DEL CODICE IDENTIFICATIVO È VUOTA, LA POSSO CANCELLARE
    $numFiles = 0;
    $files = glob("uploads/".$codIdentificativo."/"); // get all file names
    foreach($files as $file){ // iterate files
        if(is_file($file)){
          $numFiles++;
        }
        // SE TROVO ANCHE SOLO UN FILE, SMETTO DI ITERARE ED ESCO DAL LOOP. RISPARMIO TEMPO.
        if($numFiles>0){
          break;
        }
    }

    // SE LA CARTELLA CON IL NOME DEL CODICE IDENTIFICATIVO È VUOTA, LA POSSO CANCELLARE
    if($numFiles == 0){
      rmdir("uploads/".$codIdentificativo."/");
    }

  }
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
    <a href="files.html" style="border-bottom: 2px solid white;" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">GESTISCI FILE</a>
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
    <a class="" href="#"><i class="fa fa-upload"></i> Ultimi caricati</a>
    <a class="" href="#panel_storico"><i class="fa fa-history"></i> Storico</a>
  </div>
</div>

<div id="main" onclick="closeNav2()">
<div class="main">
<div class="container">

<?php

  // VERIFICO QUANTI FILE SONO PRESENTI NELLA TABELLA DEI FILE CON QUEL CODICE IDENTIFICATIVO FACENDO UNA JOIN CON LA TABELLA FOTOGRAFIA.
  $result = $db->query("SELECT `File`.`Nome`,`File`.`Path` FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id`= `Fotografia`.`id` WHERE `Fotografia`.`Codice_identificativo` = '$codIdentificativo' ");
  if($row = mysqli_fetch_row($result) == 0){
    $flagErrore = 1;
    // SE NON CI SONO DOCUMENTI CARICATI CON QUEL CODICE FOTOGRAFIA, LO SEGNALO ALL'UTENTE.
    ?>
    <div class="w3-padding-32 w3-center">
      <i class="fa fa-warning"></i> Non ci risulta alcun documento caricato a sistema per questa fotografia.
      </div>
      <div class="w3-center">
        Per favore, modificare il codice identificativo e riprovare.
      </div>
      <br>
      <hr class="horizontalLine" style="margin-left:100px;margin-right:100px;">

      <div class="w3-row w3-padding-16">
      <p class="w3-opacity w3-center">
      <i>
      ...pochi istanti ancora. Ti stiamo reindirizzando alla HOME page.
      </i></p></div>
      </div>
    </div>

    <div class="w3-padding-16"></div>

    <?php
    // USO UNO SCRIPT PER REDIRIGERE ALLA HOME PAGE. PHP NON PUÒ FUNZIONARE DENTRO ALLA CONDIZIONE IF
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            setTimeout(function(){
              window.location.href = '/authclick/new/files.html#panel_esporta';
            }, 5000);
          </SCRIPT>");
          
  }else{
    // QUESTE SUCCESSIVE DUE JOINS SERVONO PER SELEZIONARE L'ULTIMO FILE DI SCHEDA E DELLA MINIATURA (FOTO) INSERITA NEL SISTEMA.
    $result = $db->query("SELECT `File`.`id`,`File`.`Nome`,`File`.`Path` FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id`= `Fotografia`.`id` WHERE `Fotografia`.`Codice_identificativo` = '$codIdentificativo' AND `File`.`Tipologia`= 'Foto' AND `File`.`Last`=1 ");
    if($row = mysqli_fetch_assoc($result)) {
        $SubjectCode['foto']['name']=$row["Nome"];
        $SubjectCode['foto']['path']=$row["Path"];
        $SubjectCode['foto']['id']=$row["id"];
    }
    $result = $db->query("SELECT `File`.`id`,`File`.`Nome`,`File`.`Path` FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id`= `Fotografia`.`id` WHERE `Fotografia`.`Codice_identificativo` = '$codIdentificativo' AND `File`.`Tipologia`= 'Scheda' AND `File`.`Last`=1 ");
    if($row = mysqli_fetch_assoc($result)) {
        $SubjectCode['scheda']['name']=$row["Nome"];
        $SubjectCode['scheda']['path']=$row["Path"];
        $SubjectCode['scheda']['id']=$row["id"];
    }

    // PROSEGUO CON IL MIO CODICE ALL'INTERNO DELLA CLAUSOLA "ELSE"...CREANTO LA TABELLA IN HTML

    // SE L'ID È CORRETTO.
    ?>
    <div class="w3-center">
    <h3><i class="fa fa-cloud-download"></i> ULTIMI DOCUMENTI CARICARTI</h3>
    </div>
    <div class="w3-center">Fotografia con codice identificativo: <h3 style="color:green;"><?php echo $codIdentificativo; ?></h3>
    </div>
    <hr class="horizontalLine">

    <div class="w3-padding-16"></div>
    <?php
    ?>
    <div class="w3-row w3-padding-bottom">
        <table class="tablePreview" style="width:100%;">
            <tr class="trPreview">
                <th class="tdPreview w3-center" style="width:50%"><h4><i class="fa fa-photo"></i> Miniatura</th></h4>
                <th class="tdPreview w3-center" style="width:50%"><h4><i class="fa fa-file"></i> Scheda</th></h4>
            </tr>
            <tr class="trPreview">
                <td class="tdPreview" style="width:50%"><div class="w3-center"><b>Nome file: </b> <?php echo $SubjectCode['foto']['name'] ?></div> </td> 
                <td class="tdPreview" style="width:50%"><div class="w3-center"><b>Nome file: </b> <?php echo $SubjectCode['scheda']['name'] ?></div> </td> 
            </tr>
            <tr class="trPreview">
              <!-- COLONNA DI SINISTRA - PULSANTE DI SCARICA FILE -->
              <td class="tdPreview" style="width:50%">
                <div class="col-33 w3-center">
                <?php
                  if($SubjectCode['foto']['name']!=''){
                  ?>
                  <button class="w3-button w3-huge" style="background-color:green;color:white;">
                    <a class="ex5" href= "<?php echo $SubjectCode['foto']['path'].$SubjectCode['foto']['name']; ?>" download>
                    <?php
                          echo '<i class="fa fa-download"></i>'.' ';
                          echo "SCARICA";
                    ?>
                    </a>
                  </button>
                  <?php
                  }
                  ?>
                </div>
                <div class="col-33">
                </div>
                <!-- COLONNA DI SINISTRA - PULSANTE DI ELIMINA FILE -->
                <div class="col-33 w3-center">
                    <?php 
                      if($SubjectCode['foto']['name'] == ''){
                        ;
                      }
                      else{
                        echo "<button class='w3-button w3-huge' style='background-color:red;color:white;' onclick='on_foto()'><i class='fa fa-trash'></i> Elimina</button>";
                      }
                    ?>
                </div>
              </td>
              <!-- COLONNA DI DESTRA - PULSANTE DI SCARICA FILE -->
              <td class="tdPreview" style="width:50%">
                <div class="col-33 w3-center">
                <?php
                  if($SubjectCode['scheda']['name']!=''){
                  ?>
                  <button class="w3-button w3-huge" style="background-color:green;color:white;">
                    <a class="ex5" href= "<?php echo $SubjectCode['scheda']['path'].$SubjectCode['scheda']['name']; ?>" download>
                    <?php
                          echo '<i class="fa fa-download"></i>'.' ';
                          echo "SCARICA";
                    ?>
                    </a>
                  </button>
                  <?php
                  }
                  ?>
                </div>
                <div class="col-33">
                </div>
                <!-- COLONNA DI SINISTRA - PULSANTE DI ELIMINA FILE -->
                <div class="col-33 w3-center">
                    <?php 
                      if($SubjectCode['scheda']['name'] == ''){
                        ;
                      }
                      else{
                        echo "<button class='w3-button w3-huge' style='background-color:red;color:white;' onclick='on_scheda()'><i class='fa fa-trash'></i> Elimina</button>";
                      }
                    ?>
                </div>
              </td>
            </tr>
            <tr class="trPreview">
              <td class="tdPreview" >
              </td>
              <td class="tdPreview" >
              </td>
            </tr>
            <tr class="trPreview">
              <td class="tdPreview" >
                <div class="w3-center">
                  <?php
                    // COLONNA DI SINISTRA - PREVIEW DEL FILE
                    if($SubjectCode['foto']['name'] != ''){
                      $urlFoto=$SubjectCode['foto']['path'].$SubjectCode['foto']['name'];
                      $urlFoto= "https://docs.google.com/gview?url=http://192.168.1.6/authclick/new/".$urlFoto."&embedded=true";
                  ?>
                    <iframe style="width:85%;height:340px;" src="<?php echo $urlFoto; ?>"></iframe>
                  <?php
                    }
                  ?>
                  </div>
                </td>
                <td class="tdPreview" >
                  <div class="w3-center">
                    <?php
                      // COLONNA DI DESTRA - PREVIEW DEL FILE
                      if($SubjectCode['scheda']['name'] != ''){
                        $urlScheda=$SubjectCode['scheda']['path'].$SubjectCode['scheda']['name'];
                        $urlScheda= "https://docs.google.com/gview?url=http://192.168.1.6/authclick/new/".$urlScheda."&embedded=true";
                    ?>
                      <iframe style="width:85%;height:340px;" src="<?php echo $urlScheda; ?>"></iframe> 
                    <?php
                      }
                    ?>
                    </div>
                </td>
            </tr>
        </table>
      </div>
    <?php
  }
        ?>
</div>

<?php
  // SALVO QUESTI VALORI IN UNA VARIABILE PER POI PASSARLI COME STRINGA NELLO STEP SUCCESSIVO 
  $fileNameFotografia = $SubjectCode['foto']['name'];
  $pathFotografia = $SubjectCode['foto']['path'];

  $fileNameScheda = $SubjectCode['scheda']['name'];
  $pathScheda = $SubjectCode['scheda']['path'];

  $idPhoto = $SubjectCode['foto']['id'];
  $idScheda = $SubjectCode['scheda']['id'];
?>

<!-- POPUP CHE CHIEDE SE SI VUOLE CANCELLARE LA FOTOGRAFIA -->
<div id="overlay_foto" class="w3-left animate-in" onclick="off_foto()">
  <div id="text_esportaFiles" class="w3-center"><i class="fa fa-trash" ></i> Vuoi eliminare il file?</div>
  <input type="button" id="text_button_no" style="width:5%;background-color:red;" class="w3-huge w3-button" value="NO" onclick="off()" />
  <form action="/authclick/new/esportaFile.php" method="post" >
      <input type="hidden" name="delete" value = 'Foto' >
      <!-- IL CODICE IDENTIFICATIVO LO PASO AL SOLO SCOPO DI POTER RIPULIRE LE CARTELLE LASCIATE VUOTE -->
      <input type="hidden" name="codIdentificativoEsporta" value = '<?php echo "$codIdentificativo";?>' >
      <input type="hidden" name="id" value = '<?php echo "$idPhoto";?>' >
      <input type="hidden" name="fileName" value = '<?php echo "$fileNameFotografia";?>' >
      <input type="hidden" name="path" value = '<?php echo "$pathFotografia";?>' >
      <input type="submit" id="text_button_si" style="width:5%;background-color:green;" class="w3-huge w3-button" value="SI">
  </form>
</div>

<!-- POPUP CHE CHIEDE SE SI VUOLE CANCELLARE LA SCHEDA -->
<div id="overlay_scheda" class="w3-right animate-in" onclick="off_scheda()">
  <div id="text_esportaFiles" class="w3-center"><i class="fa fa-trash"></i> Vuoi eliminare il file?</div>
  <input type="button" id="text_button_no" style="width:5%;background-color:red;" class="w3-huge w3-button" value="NO" onclick="off()" />
  <form action="/authclick/new/esportaFile.php" method="post" >
      <input type="hidden" name="delete" value = 'Scheda' >
      <!-- IL CODICE IDENTIFICATIVO LO PASO AL SOLO SCOPO DI POTER RIPULIRE LE CARTELLE LASCIATE VUOTE -->
      <input type="hidden" name="codIdentificativoEsporta" value = '<?php echo "$codIdentificativo";?>' >
      <input type="hidden" name="id" value = '<?php echo "$idScheda";?>' >
      <input type="hidden" name="fileName" value = '<?php echo "$fileNameScheda";?>' >
      <input type="hidden" name="path" value = '<?php echo "$pathScheda";?>' >
      <input type="submit" id="text_button_si" style="width:5%;background-color:green;" class="w3-huge w3-button" value="SI">
  </form>
</div>
</div>

<?php
  // CIOÈ IL BLOCCO CHE SEGUE DEVE ESSERE VISUALIZZATO A SCHERMO SOLO SE NON È STATO INSERITO UN CODICE IDENTIFICATIVO PER QUELLA FOTOGRAFIA SBAGLIATO
  if($flagErrore!=1){
?>
<!-- MENU DELLO STORICO -->
<div id="panel_esporta">
<div class="main">
  <div class="container">
    <div class="" style="">
      <h3 class="w3-wide w3-center" id="panel_storico"><i class="fa fa-history"></i>
       STORICO DEI DOCUMENTI
      </h3>
    <div class="w3-center">Fotografia con codice identificativo: <h3 style="color:green;"><?php echo $codIdentificativo; ?></h3></div>
    <hr class="horizontalLine">
      <!-- TITOLO DELLA TABELLA -->
      <div class="w3-row">
      <div class="col-50 w3-center">
        <h4><i class="fa fa-photo"></i> Miniature</h4>
      </div>
      <div class="col-50 w3-center">
        <h4><i class="fa fa-file"></i> Schede</h4>
      </div>

      <div class="col-50 w3-left">
        <table class="tableStorico">
          <tr class="trStorico">
            <th style="width:15%;" class="thStorico">Inserimento numero</th>
            <th style="width:85%;" class="thStorico">Nome file</th>     
          </tr>
          <?php
            // FACCIO LA QUERY PER INSERIRE I NUMERI A LATO DEL NOME DEI FILES
            $result = $db->query("SELECT COUNT(*) FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id`= `Fotografia`.`id` WHERE `File`.`Tipologia`='Foto' AND `Fotografia`.`Codice_identificativo` = '$codIdentificativo' AND `File`.`Last`=0 ");
            $numFotoHistory = mysqli_fetch_array($result)[0];

            // INTERROGO IL DATABASE PER ESTRARRE I DATI SULLO STORICO
            // ESTRAGGO TUTTE LE FOTOGRAFIE IN ORDINE DECRESCENTE, TRANNE L'ULTIMA FOTO INSERITA.
            $result = $db->query("SELECT `File`.`Nome`, `File`.`Path` FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id`= `Fotografia`.`id` WHERE `Fotografia`.`Codice_identificativo` = '$codIdentificativo' AND `File`.`Tipologia`= 'Foto' AND `File`.`Last`=0 ORDER BY `File`.`id` DESC ");
            while($fotoHistory = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td style='width:15%;' class='tdStorico'>";
              // STAMPO A VIDEO IL NUMERO DEL FILE (IN ORDINE INVERSO)
              echo " ".$numFotoHistory."°";
              echo "</td>";
              // DECREMENTO IL NUMERO DEL FILE
              $numFotoHistory--;

              // STAMPO IL NOME DEL FILE
              echo "<td style='width:85%;' class='tdStorico'>";
              echo "<a href=".$fotoHistory[1].$fotoHistory[0].">".$fotoHistory[0]."</a>";
              echo "<td>";

              echo "</tr>";
            }
            ?>
        </table>
      </div>
      <div class="col-50 w3-right">
        <table class="tableStorico">
          <tr class="trStorico">
            <th style="width:15%;" class="thStorico">Inserimento numero</th>
            <th style="width:85%;" class="thStorico">Nome file</th>     
          </tr>
          <?php
            // FACCIO LA QUERY PER INSERIRE I NUMERI A LATO DEL NOME DEI FILES
            $result = $db->query("SELECT COUNT(*) FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id`= `Fotografia`.`id` WHERE `File`.`Tipologia`='Scheda' AND `Fotografia`.`Codice_identificativo` = '$codIdentificativo' AND `File`.`Last`=0 ");
            $numSchedaHistory = mysqli_fetch_array($result)[0];

            // INTERROGO IL DATABASE PER ESTRARRE I DATI SULLO STORICO
            // ESTRAGGO TUTTE LE FOTOGRAFIE IN ORDINE DECRESCENTE, TRANNE L'ULTIMA FOTO INSERITA.
            $result = $db->query("SELECT `File`.`Nome`, `File`.`Path` FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id`= `Fotografia`.`id` WHERE `Fotografia`.`Codice_identificativo` = '$codIdentificativo' AND `File`.`Tipologia`= 'Scheda' AND `File`.`Last`=0 ORDER BY `File`.`id` DESC ");
            while($chedaHistory = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td style='width:15%;' class='tdStorico'>";
              // STAMPO A VIDEO IL NUMERO DEL FILE (IN ORDINE INVERSO)
              echo " ".$numSchedaHistory."°";
              echo "</td>";
              // DECREMENTO IL NUMERO DEL FILE
              $numSchedaHistory--;

              // STAMPO IL NOME DEL FILE
              echo "<td style='width:85%;' class='tdStorico'>";
              echo "<a href=".$chedaHistory[1].$chedaHistory[0].">".$chedaHistory[0]."</a>";
              echo "<td>";
              
              echo "</tr>";
            }
            ?>
          </table>
        </div>
      </div>
<?php
  // CHIUDO LA CONDIZIONE IF APERTA ALL'INIZIO DEL BLOCCO.
  }
?>
    </div>
  </div>
</div>

<div class="w3-padding-16"></div>
<!-- BOTTONO PER RITORNARE ALLA HOME PAGE -->
<div class="col-25 submitButton">
  <button type="submit" class="submitButton" onclick="window.location.href='/authclick/new/files.html'"><i class="fa fa-backward"></i>TORNA</button>
</div>
<div class="w3-padding-16"></div>

<script>

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
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

// USATA PER IL TOGGLE DEL MENU QUANDO LA DIMENSIONE DELLO SCHERMO VIENE RIDOTTA
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function on_foto() {
  document.getElementById("overlay_foto").style.display = "block";
}


function off_foto() {
  document.getElementById("overlay_foto").style.display = "none";
}

function on_scheda() {
  document.getElementById("overlay_scheda").style.display = "block";
}

function off_scheda() {
  document.getElementById("overlay_scheda").style.display = "none";
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