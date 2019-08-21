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
<!-- CODICE PER IMPORTARE JQUERY -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- INSERISCO LO SCRIPT AJAX PER LE DATE -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- CODICE PER IMPORTARE JQUERY -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


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
      <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">TRASFERIMENTI</a>
      <a href="#" style="border-bottom: 2px solid white;" class="w3-bar-item w3-button w3-padding-large w3-hide-small" onclick="myFunction()">CONTRATTI</a>
    </div>
  </div>
</div>

<!-- BARRA DI NAVIGAZIONE PER SMARTPHONES -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="files.html" class="w3-bar-item w3-button w3-padding-large" >GESTISCI FILE</a>
    <a href="trasferimenti.html" class="w3-bar-item w3-button w3-padding-large" >TRASFERIMENTI</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" >CONTRATTI</a>
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
    <a class="collapsible"><i class="fa fa-pencil-square-o"></i> Contratti</a>
    <div class="content" style="margin-left:30px;">
        <a style="font-size:14px;" href="#panel_esporta"><i>Acronimo fotografia</i></a>
    </div>
  </div>
</div>
        

<!-- PAGGINA SOVRAPPOSTA DI OVERLAY PER L'INSERIMENTO DEI DATI IN BLOCKCHAIN -->
<div class="animate-in" id="overlay" onclick="off()">
  <div id="text" style="top: 42%; left: 50%; width: 60%;" class="w3-center" onclick="off_stopPropagation()">
    <p id='xbalance' class='w3-center' style='font-size:18px;'></p>
  </div>
</div>

<div id="main" onclick="closeNav2()">
  <!-- SLIDEUP E SLIDEDOWN MENU DI ESPORTA -->
  <div id="panel_esporta">
    <div class="main">
      <!-- PREVIEW DEL CODICE IDENTIFICATIVO DELLA FOTOGRAFIA -->
      <div class="w3-center" id="codiceIdentificativoView" style=" margin-top:-30px; margin-left:-123px; background-color:white; font-size:22px; "></div>

      <div class="container">
        <h3 class="w3-wide w3-center"><i class="fa fa-pencil-square-o"></i>
          VISUALIZZA ED ESPORTA CONTRATTI
        </h3>
        <p class="w3-opacity w3-center"><i>Selezionare il contratto che si desidera scaricare</i></p>

        <div class="w3-row w3-padding-16"> 
          <div class="w3-left w3-col m4 w3-medium w3-padding-16"><i class="fa fa-tag"></i>
            Codice identificativo fotografia
          </div>
          <div class="w3-col m8">
              <div class="search-box-codIdentificativo">
                <input type="text" style="text-transform: uppercase;width:95%;" autocomplete="off" placeholder="es: MRT000100" id="codIdentificativo" name="codIdentificativo" required>
                <button type="submit" class="w3-circle" onclick="location.href = '#';"><i class="fa fa-search"></i></button>
                <div class="w3-right result" style="width:96%;"></div>
              </div>
          </div>
        </div>
        <hr class="horizontalLine">
        <br>

        <h4 id="storicoTrasferimenti"><i class="fa fa-history"></i> STORICO TRASFERIMENTI</h4>
        <div id="newTable">
          <table id="contratti">
            <tr>
              <th>Numero</th>
              <th>Contratto</th>
              <th>Tipologia</th>
              <th>Data trasferimento</th>
              <th>Fine cessione</th>
              <th>Proprietario</th>
              <th></th>
            </tr>
          </table>

        </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="w3-padding-32"></div>
            
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

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction(); myFunction_progressBar();};

// When the user scrolls the page, execute myFunction 
function myFunction_progressBar() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
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

// VISUALIZZAO L'ULTIMO CODICE IDENTIFICATIVO INSERITO NEL SISTEMA
// RICHIAMO IL FILE PHP PER VISUALIZZARE L'ULTIMO CODICE IDENTIFICATIVO INSERITO AL SISTEMA
$.get("show-codiceIdentificativo.php", {}).done(function(data){
  // PRENDO I DATI DI RITORNO DALLA QUERY AL DATABASE
  var resultQuery = data;

  // STAMPO L'ULTIMO CODICE IDENTIFICATIVO INSERITO NEL DATABASE
  document.getElementById('codiceIdentificativoView').innerHTML = "CODICE FOTOGRAFIA: <span style='color:green;'>"+resultQuery+"</span>";

  // INSERISCO AUTOMATICAMENTE IL VALORE DEL CODICE IDENTIFICATIVO NEL CAMPO DEL FORM HTML
  $("#codIdentificativo").val(resultQuery);
});

// SCRIPT AJAX. MENTRE SI DIGITA IL CODICE IDENTIFICATIVO DELLA FOTOGRAFIA, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function(){
  $('.search-box-codIdentificativo input[type="text"]').on("keyup input", function(){
      /* Get input value on change */
      var inputVal = $(this).val();
      var resultDropdown = $(this).siblings(".result");

      // LO TRASFORMO IN STRINGA PER PASSARLO DOPO ALLA FUNZIONE SUCCESSIVA
      var codiceIdentificativoFotografia = JSON.stringify(inputVal);

      if(inputVal.length){
        $.get("backend-search-codIdentificativo.php", {term: inputVal}).done(function(data){
          // Display the returned data in browser
          resultDropdown.html(data);

          // STAMPO LA LISTA DEI CONTRATTI
          $.get("show-contracts.php", {code:inputVal}).done(function(data){
            // FACCIO IL PARSING DEL JSON E LO STAMPO
            var listaContratti = JSON.parse(data);
            var singoloContratto = JSON.parse(listaContratti.contratto);

            // SE IL CODICE IDENTIFICATIVO CERCATO NON RITORNA NULLA, ALLORA CANCELLO IL TAG
            if(singoloContratto==""){
              document.getElementById("contratti").innerHTML = "";
              document.getElementById("storicoTrasferimenti").innerHTML = "";
            }else{
              document.getElementById("contratti").innerHTML = "";

              // RICREO LA TABELLA CHE È STATA DISTRUTTA PRIMA
              var tabella = '<table id="contratti"><tr><th>Numero</th><th>Contratto</th><th>Tipologia</th><th>Data trasferimento</th><th>Fine cessione</th><th>Proprietario</th><th></th></tr></table>';
              document.getElementById('newTable').innerHTML = tabella;
              var titolo = '<h4 id="storicoTrasferimenti"><i class="fa fa-history"></i> STORICO TRASFERIMENTI</h4>';
              document.getElementById('storicoTrasferimenti').innerHTML = titolo;

              // document.getElementById("contratti").innerHTML = 1 + " <div class='w3-left'>" + singoloContratto[0].Nome + " -- " + singoloContratto[0].Tipologia + " -- " + singoloContratto[0].Data_cessione +  " -- " + singoloContratto[0].Fine_cessione +  " -- " + singoloContratto[0].Nome_proprietario +  " -- " + singoloContratto[0].Cognome_proprietario + "</div><br><hr class='horizontalLine'><br>";
              // QUANDO VIENE DIGITATO UN CODICE ESISTENTE
              for(var i = 0 ; i< singoloContratto.length; i++){
                // SE LA DATA DI FINE CESSIONE È NULL, LA ELIMINO
                if(singoloContratto[i].Fine_cessione==null)
                  singoloContratto[i].Fine_cessione = "";

                // PREPARO I VALORI DA PASSARE
                var idTrasferimento = singoloContratto[i].idTrasferimento;
                var path = JSON.stringify(singoloContratto[i].Path + singoloContratto[i].Nome);
                var nomeFile = JSON.stringify(singoloContratto[i].Nome);

                // GENERO I PULSANTI DA UTILIZZARE SU OGNI RIGA
                var visualizza = "<span title='Visualizza documento caricato'><a href='https://docs.google.com/gview?url=http://192.168.1.6/authclick/new/" + singoloContratto[i].Path + singoloContratto[i].Nome + "&embedded=true' class='w3-button' style='background-color:#6397d0; color:white;' target='_blank'><i class='fa fa-eye'></i></a></span>"; 
                var scarica = "<span title='Scarica documento'><a href=" + singoloContratto[i].Path + "/" + singoloContratto[i].Nome + " class='w3-button' style='background-color:red;color:white;'><i class='fa fa-download'></i></a></span>";        
                var blockchian = "<span title='Invia dati su blockchain'><button class='w3-button' style='background-color:green;color:white;' onclick='on(" + [codiceIdentificativoFotografia,idTrasferimento,path,nomeFile] + ")'><i class='fa fa-chain'></i> BLOCKCHAIN</button></span>";

                // STAMPO I VALORI OTTENUTI
                // STAMPO L'ULTIMO CODICE IDENTIFICATIVO INSERITO NEL DATABASE
                var tr = document.createElement('TR');
                tr.innerHTML = '<tr><td>' + (i+1) + "</td><td>" + singoloContratto[i].Nome + "</td><td>" + singoloContratto[i].Tipologia + "</td><td>" + singoloContratto[i].Data_cessione +  "</td><td>" + singoloContratto[i].Fine_cessione +  "</td><td>" + singoloContratto[i].Nome_proprietario + " " + singoloContratto[i].Cognome_proprietario + "</td><td>" + visualizza + "&nbsp  &nbsp" + scarica + "&nbsp  &nbsp &nbsp  &nbsp &nbsp" + blockchian + "</td></tr>";
                document.getElementById('contratti').appendChild(tr);
              
              }
            }
          });

        });

      } else{
          resultDropdown.empty();
      }

  });

  // Set search input value on click of result item
  $(document).on("click", ".result p", function(){
    $(this).parents(".search-box-codIdentificativo").find('input[type="text"]').val($(this).text());
    $(this).parent(".result").empty();
  });

});

// SCRIPT AJAX. MENTRE SI DIGITA IL CODICE IDENTIFICATIVO DELLA FOTOGRAFIA, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function(){

  // ALLA PRIMA APERTURA DELLA PAGINA MI VISUALIZZA L'ELENCO DEI NOMI DEI CONTRATTI
  $.get("show-codiceIdentificativo.php", {}).done(function(data){
    // PRENDO I DATI DI RITORNO DALLA QUERY AL DATABASE
    var codIdentificativo = data;
    var codiceIdentificativo = JSON.stringify(codIdentificativo);
    
    $.get("show-contracts.php", {code:codIdentificativo}).done(function(data){
      // FACCIO IL PARSING DEL JSON E LO STAMPO
      var listaContratti = JSON.parse(data);
      var singoloContratto = JSON.parse(listaContratti.contratto)

      for(var i = 0 ; i< singoloContratto.length; i++){

        // SE LA DATA DI FINE CESSIONE È NULL, LA ELIMINO
        if(singoloContratto[i].Fine_cessione==null)
          singoloContratto[i].Fine_cessione = "";

        // PREPARO I VALORI DA PASSARE
        var idTrasferimento = singoloContratto[i].idTrasferimento;
        var path = JSON.stringify(singoloContratto[i].Path + singoloContratto[i].Nome);
        var nomeFile = JSON.stringify(singoloContratto[i].Nome);
        var tipologia = JSON.stringify(singoloContratto[i].Tipologia);
        var nomeProprietario = JSON.stringify(singoloContratto[i].Nome_proprietario);
        var cognomeProprietario = JSON.stringify(singoloContratto[i].Cognome_proprietario);
        var dataCessione = JSON.stringify(singoloContratto[i].Data_cessione);

        // GENERO I PULSANTI DA UTILIZZARE SU OGNI RIGA
        var visualizza = "<span title='Visualizza documento caricato'><a href='https://docs.google.com/gview?url=http://192.168.1.6/authclick/new/" + singoloContratto[i].Path + singoloContratto[i].Nome + "&embedded=true' class='w3-button' style='background-color:#6397d0; color:white;' target='_blank'><i class='fa fa-eye'></i></a></span>"; 
        var scarica = "<span title='Scarica documento'><a href=" + singoloContratto[i].Path + "/" + singoloContratto[i].Nome + " class='w3-button' style='background-color:red;color:white;'><i class='fa fa-download'></i></a></span>";        
        var blockchian = "<span title='Invia dati su blockchain'><button class='w3-button' style='background-color:green;color:white;' onclick='on(" + [codiceIdentificativo, idTrasferimento, path, nomeFile] + ")'><i class='fa fa-chain'></i> BLOCKCHAIN</button></span>";

        // STAMPO I VALORI OTTENUTI
        // STAMPO L'ULTIMO CODICE IDENTIFICATIVO INSERITO NEL DATABASE
        var tr = document.createElement('TR');
        tr.innerHTML = '<tr><td>' + (i+1) + "</td><td>" + singoloContratto[i].Nome + "</td><td>" + singoloContratto[i].Tipologia + "</td><td>" + singoloContratto[i].Data_cessione +  "</td><td>" + singoloContratto[i].Fine_cessione +  "</td><td>" + singoloContratto[i].Nome_proprietario + " " + singoloContratto[i].Cognome_proprietario + "</td><td>" + visualizza + "&nbsp  &nbsp" + scarica + "&nbsp  &nbsp &nbsp  &nbsp &nbsp" + blockchian + "</td></tr>";
        document.getElementById('contratti').appendChild(tr);

      }
    });

  });

});

function on(codiceIdentificativo, idTrasferimento, path, nomeFile) {
  
  // CREAZIONE DELLA CLESSIDRA PER WAITING TIME
  $('body').addClass('waiting');
  
  // DISABILITO TUTTI I CONTROLLI
  $(document).ready(function(){
      $('body :input').prop("disabled", true);
  });
  
  /*
  // RICHIAMO IL FILE PER ESTRARRE I DATI IMPORTANTI DA INSERIRE IN BLOCKCHAIN
  $.get("blockchain/sendToBlockchain.php", {codiceIdentificativo:codiceIdentificativo, idTrasferimento:idTrasferimento, path:path, nomeFile:nomeFile}).done(function(data){

    // CHIUDO L'ICONA DELLA CLESSIDRA
    $('body').removeClass('waiting');

    // ABILITO TUTTI I CONTROLLI
    $(document).ready(function(){
        $('body :input').prop("disabled", false);
    });

    // INVIO I DATI CIFRATI SU BLOCKCHAIN
    setvalue(data);



  });
  */

        // APRO IL LAYER DI OVERLAY
        document.getElementById("overlay").style.display = "block";


        // PREPARO IL MESSAGGIO DA VISUALIZZARE NEL LAYER DI OVERLAY
        $.get("blockchain/viewAutentica.php", {codiceIdentificativo:codiceIdentificativo, idTrasferimento:idTrasferimento, path:path, nomeFile:nomeFile}).done(function(data){
          var myJson = JSON.parse(data);

          // PREPARO I MESSAGGI DA STAMPARE
          var messageToPrint = "<b>Informazioni riassuntive -- AUTENTICA</b><br><hr class='horizontalLine'>";
          var autentica = "<div class='w3-center'><b>Autore</b></div><table><td>Nome</td><td>"+ myJson.Nome + "</td></tr><tr><td>Cognome</td><td>"+ myJson.Cognome + "</td></tr><tr><td>Luogo di nascita</td><td>"+ myJson.Luogo_nascita + "</td></tr><tr><td>Data di nascita</td><td>"+ myJson.Giorno_nascita +"/"+ myJson.Mese_nascita +"/"+ myJson.Anno_nascita +"</td></tr><tr><td>Luogo di morte</td><td>"+ myJson.Luogo_morte + "</td></tr><tr><td>Data del decesso</td><td>"+ myJson.Giorno_morte +"/"+ myJson.Mese_morte +"/"+ myJson.Anno_morte +"</td></tr><tr></table><br><div class='w3-center'><b>Opera</b></div><table><tr><td>Titolo</td><td>"+ myJson.Titolo + "</td></tr><tr><td>Data di scatto</td><td>"+ myJson.Giorno_scatto +"/"+ myJson.Mese_scatto +"/"+ myJson.Anno_scatto + "</td></tr><tr><td>Data di stampa</td><td>"+ myJson.Giorno_stampa +"/"+ myJson.Mese_stampa +"/"+ myJson.Anno_stampa + "</td></tr><tr><td>Lunghezza</td><td>"+ myJson.Lunghezza + "</td></tr><tr><td>Larghezza</td><td>"+ myJson.Larghezza + "</td></tr><tr><td>Tecnica di scatto</td><td>"+ myJson.Tecnica_scatto + "</td></tr><tr><td>Tecnica di stampa</td><td>"+ myJson.Tecnica_stampa + "</td></tr><tr><td>Supporto</td><td>"+ myJson.Supporto + "</td></tr><tr><td>Open edition</td><td>"+ myJson.Open_edition + "</td></tr><tr><td>Tiratura</td><td>"+ myJson.Tiratura + "</td></tr><tr><td>Note aggiuntive tiratura</td><td>"+ myJson.Note_tiratura + "</td></tr><tr><td>Artist's proof</td><td>"+ myJson.Artist_proof + "</td></tr><tr><td>Esemplare</td><td>"+ myJson.Esemplare + "</td></tr><tr><td>Note aggiuntive esemplare</td><td>"+ myJson.Note_esemplare + "</td></tr><tr><td>Timbro</td><td>"+ myJson.Timbro + "</td></tr><tr><td>Annotazioni timbro</td><td>"+ myJson.Annotazioni_timbro + "</td></tr><tr><td>Firma</td><td>"+ myJson.Firma + "</td></tr><tr><td>Annotazioni firma</td><td>"+ myJson.Annotazioni_firma + "</td></tr><tr><td>Annotazioni</td><td>"+ myJson.Annotazioni + "</td></tr></table><br>"
          var scheda = "<br><hr class='horizontalLine'><div><b>SCHEDA</b></div><iframe style='width:100%;height:500px;' src='https://docs.google.com/gview?url=http://192.168.1.6/authclick/new/"+ myJson.Path_scheda +"&embedded=true'></iframe>";
          var contratto = "<br><hr class='horizontalLine'><div><b>CONTRATTO</b></div><iframe style='width:100%;height:500px;' src='https://docs.google.com/gview?url=http://192.168.1.6/authclick/new/"+ path +"&embedded=true'></iframe>";
          
          // VISUALIZZO A SCHERMO I MESSAGGI
          document.getElementById("text").innerHTML = messageToPrint + autentica + scheda + contratto;
        });

}

function off() {
  document.getElementById("overlay").style.display = "none";
}

function off_stopPropagation(){
  document.getElementById("overlay").style.display = "block";
  event.stopPropagation();
}


// **************************************************************************
// **************************************************************************
// ************** PARTE RELATIVA AL TRASFERIMENTO SU BLOCKCHAIN *************
// **************************************************************************
// **************************************************************************

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
                document.getElementById("xbalance").innerHTML = xname;
            }
        });
    }
    catch (err) {
        document.getElementById("xbalance").innerHTML = err;
    }
}

// function to add a new integer value to the blockchain
function setvalue(xvalue) {
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
        myfunction.set.sendTransaction(xvalue, { from: web3.eth.accounts[0], gas: 4000000 }, function (error, result) {
            if (!error) {
                console.log(result);
            } else {
                console.log(error);
            }
        })
    } catch (err) {
        //document.getElementById("xvalue").innerHTML = err;
    }
    
}

// **************************************************************************
// **************************************************************************
// ************** FINE PARTE NECESSARIA PER BLOCKCHAIN **********************
// **************************************************************************
// **************************************************************************

</script>

</body>
</html>