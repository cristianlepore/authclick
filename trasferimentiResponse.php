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
<?php
  include ("insertTrasferimenti.php");
?>

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

<div id="main" onclick="closeNav2()">
  <div class="main">
    <div class="container">
      <div class="w3-center">
        <?php
          // STAMPO I MESSAGGI DI CONFERMA O DI ERRORE NELL'INSERIMENTO DEI DATI. I MESSAGGI SONO PRESI DAL FILE insertTrasferimenti.php.
          echo $statusMsg;

          if($statusMsgCaricamentoContratto!=""){
            echo "<br><br>".$statusMsgCaricamentoContratto;
            echo "<hr class='horizontalLine'>";
          }
          

          if($doubleOwnerMsg != ""){
            echo $doubleOwnerMsg;
          }

          if($doubleAuthor != ""){
            echo $doubleAuthor;
          }

        ?>
      </div>
    <br>
  <div class="w3-padding-16 w3-center">  
    <?php 
    if($doubleOwnerMsg=="" && $doubleAuthor==""){ ?>
    <!-- BOTTONE PER RITORNARE ALLA PAGINA PRECEDENTE -->
      <button class="w3-button w3-huge w3-black" onclick="window.location.href='/authclick/new/trasferimenti.html'">
        <i class="fa fa-backward"></i> INDIETRO
      </button>
    <?php } else if($doubleOwnerMsg!="" && $doubleAuthor==""){
    ?>
    <!-- BOTTONE PER LA SCELTA SE TORNARE INDIETRO -->
    <div class="col-50">
      <button style="background-color:red; color:white;" class="w3-button w3-huge" onclick="window.location.href='/authclick/new/trasferimenti.html'">
        <i class="fa fa-backward"></i> INDIETRO
      </button>
    </div>
    <!-- BOTTONE PER LA SCELTA SE PROSEGUIRE -->
    <div class="col-50">
      <form action="/authclick/new/insertTrasferimentiDoubleUser.php" method="post" >    
        <!-- PASSO TUTTI I VALORI ALLA PAGINA SUCCESSIVA PER INSERIRE I DATI -->    
        <input type="hidden" name="nome" value = '<?php echo "$nome";?>' >
        <input type="hidden" name="cognome" value = '<?php echo "$cognome";?>' >
        <input type="hidden" name="codFiscale" value = '<?php echo "$codFiscale";?>' >
        <input type="hidden" name="partitaIVA" value = '<?php echo "$partitaIVA";?>' >
        <input type="hidden" name="keywordsProprietario" value = '<?php echo "$keywordsProprietario";?>' >

        <input type="hidden" name="indirizzoNazione" value = '<?php echo "$nazione";?>' >
        <input type="hidden" name="indirizzoCittà" value = '<?php echo "$città";?>' >
        <input type="hidden" name="indirizzoCAP" value = '<?php echo "$CAP";?>' >
        <input type="hidden" name="indirizzoVia_piazza" value = '<?php echo "$via_piazza";?>' >
        <input type="hidden" name="indirizzoCivico" value = '<?php echo "$civico";?>' >

        <input type="hidden" name="domicilioNazione" value = '<?php echo "$nazione_domicilio";?>' >
        <input type="hidden" name="domicilioCittà" value = '<?php echo "$città_domicilio";?>' >
        <input type="hidden" name="domicilioCAP" value = '<?php echo "$CAP_domicilio";?>' >
        <input type="hidden" name="domicilioVia_piazza" value = '<?php echo "$via_piazza_domicilio";?>' >
        <input type="hidden" name="domicilioCivico" value = '<?php echo "$civico_domicilio";?>' >

        <input type="hidden" name="residenzaNazione" value = '<?php echo "$nazione_residenza";?>' >
        <input type="hidden" name="residenzaCittà" value = '<?php echo "$città_residenza";?>' >
        <input type="hidden" name="residenzaCAP" value = '<?php echo "$CAP_residenza";?>' >
        <input type="hidden" name="residenzaVia_piazza" value = '<?php echo "$via_piazza_residenza";?>' >
        <input type="hidden" name="residenzaCivico" value = '<?php echo "$civico_residenza";?>' >

        <!-- INFORMAZIONI SUL CONTRATTO -->
        <input type="hidden" name="prezzo" value = '<?php echo "$prezzo";?>' >
        <input type="hidden" name="codIdentificativo" value = '<?php echo "$codIdentificativo";?>' >
        <input type="hidden" name="dataCessione" value = '<?php echo "$dataCessione";?>' >
        <input type="hidden" name="cessioneDiritti" value = '<?php echo "$cessioneDiritti";?>' >
        <input type="hidden" name="dataFineCessione" value = '<?php echo "$dataFineCessione";?>' >
        <input type="hidden" name="keywordsContratto" value = '<?php echo "$keywordsContratto";?>' >
        <!-- NOME DEL FILE PROPOSTO DALL'UTENTE. IN QUESTO CASO L'ESTENSIO È GIÀ INCLUSA -->
        <input type="hidden" name="nomeContratto" value = '<?php echo "$fileName";?>' >
        <!-- GLI PASSO IDPHOTO -->
        <input type="hidden" name="idPhoto" value = '<?php echo "$idPhoto";?>' >

        <button style="background-color:green; color:white;" class="w3-button w3-huge" >
          PROSEGUI <i class="fa fa-forward"></i>
        </button>
      </form>
    </div>
    <?php } else if ($doubleOwnerMsg=="" && $doubleAuthor!="") { ?>
      <!-- BOTTONE PER LA SCELTA SE TORNARE INDIETRO -->
      <div class="col-50">
        <form action="/authclick/new/insertTrasferimentiDoubleAuthor.php" method="post" >
        <!-- PASSO TUTTI I VALORI ALLA PAGINA SUCCESSIVA PER INSERIRE I DATI -->    
        <input type="hidden" name="nome" value = '<?php echo "$nome";?>' >
        <input type="hidden" name="cognome" value = '<?php echo "$cognome";?>' >
        <input type="hidden" name="codFiscale" value = '<?php echo "$codFiscale";?>' >
        <input type="hidden" name="partitaIVA" value = '<?php echo "$partitaIVA";?>' >
        <input type="hidden" name="keywordsProprietario" value = '<?php echo "$keywordsProprietario";?>' >

        <input type="hidden" name="indirizzoNazione" value = '<?php echo "$nazione";?>' >
        <input type="hidden" name="indirizzoCittà" value = '<?php echo "$città";?>' >
        <input type="hidden" name="indirizzoCAP" value = '<?php echo "$CAP";?>' >
        <input type="hidden" name="indirizzoVia_piazza" value = '<?php echo "$via_piazza";?>' >
        <input type="hidden" name="indirizzoCivico" value = '<?php echo "$civico";?>' >

        <input type="hidden" name="domicilioNazione" value = '<?php echo "$nazione_domicilio";?>' >
        <input type="hidden" name="domicilioCittà" value = '<?php echo "$città_domicilio";?>' >
        <input type="hidden" name="domicilioCAP" value = '<?php echo "$CAP_domicilio";?>' >
        <input type="hidden" name="domicilioVia_piazza" value = '<?php echo "$via_piazza_domicilio";?>' >
        <input type="hidden" name="domicilioCivico" value = '<?php echo "$civico_domicilio";?>' >

        <input type="hidden" name="residenzaNazione" value = '<?php echo "$nazione_residenza";?>' >
        <input type="hidden" name="residenzaCittà" value = '<?php echo "$città_residenza";?>' >
        <input type="hidden" name="residenzaCAP" value = '<?php echo "$CAP_residenza";?>' >
        <input type="hidden" name="residenzaVia_piazza" value = '<?php echo "$via_piazza_residenza";?>' >
        <input type="hidden" name="residenzaCivico" value = '<?php echo "$civico_residenza";?>' >

        <!-- INFORMAZIONI SUL CONTRATTO -->
        <input type="hidden" name="prezzo" value = '<?php echo "$prezzo";?>' >
        <input type="hidden" name="codIdentificativo" value = '<?php echo "$codIdentificativo";?>' >
        <input type="hidden" name="dataCessione" value = '<?php echo "$dataCessione";?>' >
        <input type="hidden" name="cessioneDiritti" value = '<?php echo "$cessioneDiritti";?>' >
        <input type="hidden" name="dataFineCessione" value = '<?php echo "$dataFineCessione";?>' >
        <input type="hidden" name="keywordsContratto" value = '<?php echo "$keywordsContratto";?>' >
        <!-- NOME DEL FILE PROPOSTO DALL'UTENTE. IN QUESTO CASO L'ESTENSIO È GIÀ INCLUSA -->
        <input type="hidden" name="nomeContratto" value = '<?php echo "$fileName";?>' >
        <!-- GLI PASSO IDPHOTO -->
        <input type="hidden" name="idPhoto" value = '<?php echo "$idPhoto";?>' >

        <button style="background-color:red; color:white;" class="w3-button w3-huge" >
          <i class="fa fa-plus"></i> AGGIUNGI COME NUOVO PROPRIETARIO
        </button>
      </div>

      <!-- BOTTONE PER LA SCELTA SE PROSEGUIRE -->
      <div class="col-50">
        <form action="/authclick/new/" method="post" >    
        <button style="background-color:green; color:white;" class="w3-button w3-huge" >
          ASSOCIA AD UN AUTORE ESISTENTE <i class="fa fa-forward"></i>
        </button>
      </form>
    </div>
    <?php } ?>
    <div class="w3-padding-16"></div>
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