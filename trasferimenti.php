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
<!-- SCRIPT JQUERY PER INSERIRE UN DASH OGNI 4 CIFRE DIGITATE DEL CAMPO PARTITA IVA -->
<script src="css/jquery.min.js"></script>

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
      <a style="font-size:14px;" href="trasferimenti.php#cognome"><i>Keywords</i></a>
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
      <a style="font-size:14px;" href="trasferimenti.php#vendita"><i>Cessione diritti</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#contrattoForm"><i>Carica contratto</i></a>
      <a style="font-size:14px;" href="trasferimenti.php#contrattoForm"><i>Keywords</i></a>
    </div>
  </div>
</div>

<!-- INIZIO DEL FORM PER INSERIRE AUTENTICA -->
<div id="main" onclick="closeNav2()">
<div class="main">
<div class="container">
  <h3 class="w3-center"><i class="fa fa-users"></i> INFORMAZIONI SUL PROPRIETARIO</h3>
  <p style="color:red;">In rosso i campi obbligatori.</p>
  <hr class="horizontalLine">

  <form name="myFormOpera" action="/authclick/new/insertTrasferimenti.php" method="POST" enctype="multipart/form-data" onsubmit="return validateform()">
  <!-- INSERISCO INFORMAZIONI RELATIVE ALL'AUTORE -->
  <div class="row">
    <div class="col-25">
      <label for="nome"><i class="fa fa-user"></i> Nome</label>
    </div>
    <div class="col-75">
      <input type="text" id="nome" name="nome" placeholder="es: Luigi" required>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="cognome"><i class="fa fa-user"></i> Cognome</label>
    </div>
    <div class="col-75">
      <input type="text" id="cognome" name="cognome" placeholder="es: Verdi" required>
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="codFiscale"><i class="fa fa-credit-card"></i> Codice Identificativo</label>
    </div>
    <div class="col-75">
      <input type="text" id="codFiscale" name="codFiscale" placeholder="es: VRDLGU75A01F205W" required>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="partitaIVA"><i class="fa fa-tag"></i> Partita IVA</label>
    </div>
    <div class="col-75">
      <input type="text" id="partitaIVA" name="partitaIVA" placeholder="es: 0123-4567-891" >
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="keywordsProprietario"><i class="fa fa-bookmark"></i> Keywords proprietario</label>
    </div>
    <div class="col-75">
      <input type="text" id="keywordsProprietario" name="keywordsProprietario" placeholder="es: Luigi, proprietario, ecc...">
    </div>
  </div>
  <br>
</div>
<br><br><br>

<div class="container" id="indirizzo">
  <h3 class="w3-center"><i class="fa fa-address-card-o"></i> INDIRIZZO</h3>
  <!-- INSERISCO INFORMAZIONI RELATIVE ALL'AUTORE -->
  <hr class="horizontalLine">

  <div class="row">
    <div class="col-25">
      <label for="indirizzoNazione"><i class="fa fa-flag"></i> Nazione</label>
    </div>
    <div class="col-75">
    <select id="indirizzoNazione" name="indirizzoNazione">
                <option value="">Seleziona un paese</option>
                <option value="Italia">Italia</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="indirizzoCittà"><i class="fa fa-institution"></i> Città</label>
    </div>
    <div class="col-75">
      <input type="text" id="indirizzoCittà" name="indirizzoCittà" placeholder="es: Milano">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="indirizzoCAP"><i class="fa fa-location-arrow"></i> CAP</label>
    </div>
    <div class="col-75">
      <input type="text" id="indirizzoCAP" name="indirizzoCAP" placeholder="es: 20019">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="indirizzoVia_piazza"><i class="fa fa-address-card-o"></i> Via / Piazza</label>
    </div>
    <div class="col-75">
      <input type="text" id="indirizzoVia_piazza" name="indirizzoVia_piazza" placeholder="es: piazza Duomo">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="indirizzoCivico"><i class="fa fa-street-view"></i> Numero civico</label>
    </div>
    <div class="col-75" style="margin-top:16px;">
      <input type="numeric" id="indirizzoCivico" style="width:100%;" name="indirizzoCivico" placeholder=" es: 12">
    </div>
  </div>
  <br>
</div>
<br><br><br>

<div class="container" id="domicilio">
  <h3 class="w3-center"><i class="fa fa-address-card-o"></i> DOMICILIO</h3>
  <!-- INSERISCO INFORMAZIONI RELATIVE ALL'AUTORE -->
  <hr class="horizontalLine">

  <div class="row">
    <div class="col-25">
      <label for="domicilioNazione"><i class="fa fa-flag"></i> Nazione</label>
    </div>
    <div class="col-75">
    <select id="domicilioNazione" name="domicilioNazione">
                <option value="">Seleziona un paese</option>
                <option value="Italia">Italia</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="domicilioCittà"><i class="fa fa-institution"></i> Città</label>
    </div>
    <div class="col-75">
      <input type="text" id="domicilioCittà" name="domicilioCittà" placeholder="es: Milano">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="domicilioCAP"><i class="fa fa-location-arrow"></i> CAP</label>
    </div>
    <div class="col-75">
      <input type="text" id="domicilioCAP" name="domicilioCAP" placeholder="es: 20019">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="domicilioVia_piazza"><i class="fa fa-address-card-o"></i> Via / Piazza</label>
    </div>
    <div class="col-75">
      <input type="text" id="domicilioVia_piazza" name="domicilioVia_piazza" placeholder="es: piazza Duomo">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="domicilioCivico"><i class="fa fa-street-view"></i> Numero civico</label>
    </div>
    <div class="col-75" style="margin-top:16px;">
      <input type="numeric" id="domicilioCivico" style="width:100%;" name="domicilioCivico" placeholder=" es: 12">
    </div>
  </div>
  <br>
</div>
<br><br><br>

<div class="container" id="residenza">
  <h3 class="w3-center"><i class="fa fa-address-card-o"></i> RESIDENZA</h3>
  <!-- INSERISCO INFORMAZIONI RELATIVE ALL'AUTORE -->
  <hr class="horizontalLine">

  <div class="row">
    <div class="col-25">
      <label for="residenzaNazione"><i class="fa fa-flag"></i> Nazione</label>
    </div>
    <div class="col-75">
    <select id="residenzaNazione" name="residenzaNazione">
                <option value="">Seleziona un paese</option>
                <option value="Italia">Italia</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="residenzaCittà"><i class="fa fa-institution"></i> Città</label>
    </div>
    <div class="col-75">
      <input type="text" id="residenzaCittà" name="residenzaCittà" placeholder="es: Milano">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="residenzaCAP"><i class="fa fa-location-arrow"></i> CAP</label>
    </div>
    <div class="col-75">
      <input type="text" id="residenzaCAP" name="residenzaCAP" placeholder="es: 20019">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="residenzaVia_piazza"><i class="fa fa-address-card-o"></i> Via / Piazza</label>
    </div>
    <div class="col-75">
      <input type="text" id="residenzaVia_piazza" name="residenzaVia_piazza" placeholder="es: piazza Duomo">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="residenzaCivico"><i class="fa fa-street-view"></i> Numero civico</label>
    </div>
    <div class="col-75" style="margin-top:16px;">
      <input type="numeric" id="residenzaCivico" style="width:100%;" name="residenzaCivico" placeholder=" es: 12">
    </div>
  </div>
  <br>
</div>
<br><br><br>

<div class="container" id="vendita">
  <h3 class="w3-center"><i class="fa fa-edit"></i> CONTRATTO</h3>
  <!-- INSERISCO INFORMAZIONI RELATIVE ALL'AUTORE -->
  <p style="color:red;">In rosso i campi obbligatori.</p>
  <hr class="horizontalLine">
  <br>
  
  <div class="row">
    <div class="col-25">
      <label for="prezzo"><i class="fa fa-euro"></i> Prezzo di vendita (EUR)</label>
    </div>
    <div class="col-75" style="margin-top:16px;">
      <input type="numeric" id="prezzo" style="width:100%;" name="prezzo" placeholder=" es: 200.50 -- Usare il punto . per separare i decimali.">
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label for="codIdentificativo"><i class="fa fa-tag"></i> Codice identificativo dell'opera</label>
    </div>
    <div class="col-75">
      <input type="text" id="codIdentificativo" name="codIdentificativo" placeholder="es: MRT000100" required>
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

<div class="row">
  <div class="col-25">
    <label for="dataCessione"><i class="fa fa-calendar-check-o"></i> Data cessione</label>
  </div>
  <div class="col-75">
    <div class="w3-col m3 w3-padding-16">
      <input style="margin-top:-12px;width:100%;" type="date" value="0" name="dataCessione" required>
    </div>
  </div>
</div>
<br>

<div class="row" id="contrattoForm">
  <div class="col-25">
    <label for="timbro"><i class="fa fa-trademark"></i> Cessione diritti di pubblicazione</label>
  </div>
  <div class="col-75" style="margin-top:12px;">
    <label class="switch">
      <input type="checkbox" id="myCheck" name="cessioneDiritti" onclick="myFunctionToggle()">
      <div class="slider round">
        <div class="w3-row" id="text" style="margin-top:3px;width:200px;font-size:16px;margin-left:150px;color:black;display:none">
          <i class="fa fa-check"></i> Cessione diritti
        </div>
      </div>
    </label>
  </div>
</div>

  <div class="w3-row" style="margin-top:20px;">
    <div id="dataFineCessione" style="display:none;">
      <div class="col-25">
        <label for="dataFineCessione"><i class="fa fa-calendar-check-o"></i> Data di fine cessione</label>
      </div>
      <!-- INSERIRE LA DATA DEL PRESTITO -->
      <div class="col-75">
        <div class="w3-padding-16 w3-col m3">
          <input style="margin-top:-12px;width:100%;" type="date" value="0" name="dataFineCessione">
        </div>
      </div>
    </div>
  </div>
  <br>
  <hr class="horizontalLine">
  <br>

  <div class="row"> 
    <div class="col-25">
      <label for="nomeContratto"><i class="fa fa-file-o"></i> Nome file</label>
    </div>
    <div class="col-75">
        <div class="w3-col m5 w3-left">
          <input type="text" style="width:100%;" placeholder="es: ContrattoAuthclick" id="nomeContratto" name="nomeContratto" required>
        </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-25">
      <label><i class="fa fa-laptop"></i> Carica contratto</label>
    </div>
    <div class="col-75">
      <div clasS="w3-col m5 w3-left">
        <input type="file" name="contratto" id="contratto" class="w3-left w3-small" style="width:100%;margin: 8px 0px 0px 0px" onchange="uploadFile()" required>
      </div>
      <div class="w3-col m5 w3-right">
        <progress id="progressBar" class="w3-center" value="0" max="100" style="margin-top:15px;width:100%;"></progress>
        <p id="loaded_n_total"></p>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-33"></div>
    <div class="w3-col m8">
      <div class="w3-col m7">
        
      </div>
    </div>
  </div>
  <hr class="horizontalLine">
  <br>

  <div class="row">
    <div class="col-25">
      <label for="keywordsContratto"><i class="fa fa-bookmark"></i> Keywords contratto</label>
    </div>
    <div class="col-75">
      <input type="text" id="keywordsContratto" name="keywordsContratto" placeholder="es: Primo contratto, vendita, ecc...">
    </div>
  </div>
<br>
</div>

<div class="col-25"></div><div class="col-25"></div><div class="col-25"></div>
<div class="col-25 submitButton">
  <button type="submit" name="submit" class="submitButton" ><i class="fa fa-send"></i> <i class="prova">INVIA</i></button>
</div>
</form>
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

// VALIDO IL CONTENUTO INSERITO NEL FORM DALL'UTENTE.
function validateform(){  

  var nome=document.myFormOpera.nome.value;
  var cognome=document.myFormOpera.cognome.value;
  var codFiscale=document.myFormOpera.codFiscale.value;
  var partitaIVA=document.myFormOpera.partitaIVA.value;
  var keywordsProprietario=document.myFormOpera.keywordsProprietario.value;

  var indirizzoCittà=document.myFormOpera.indirizzoCittà.value;
  var indirizzoCAP=document.myFormOpera.indirizzoCAP.value;
  var indirizzoCivico=document.myFormOpera.indirizzoCivico.value;

  var domicilioCittà=document.myFormOpera.domicilioCittà.value;
  var domicilioCAP=document.myFormOpera.domicilioCAP.value;
  var domicilioCivico=document.myFormOpera.domicilioCivico.value;

  var residenzaCittà=document.myFormOpera.residenzaCittà.value;
  var residenzaCAP=document.myFormOpera.residenzaCAP.value;
  var residenzaCivico=document.myFormOpera.residenzaCivico.value;

  var prezzo=document.myFormOpera.prezzo.value;
  var codIdentificativo=document.myFormOpera.codIdentificativo.value;
  var dataCessione=document.myFormOpera.dataCessione.value;

  var cessioneDirittiIsChecked=document.getElementById("myCheck").checked;
  var dataFineCessione=document.myFormOpera.dataFineCessione.value;
  var nomeContratto=document.myFormOpera.nomeContratto.value;
  var keywordsContratto=document.myFormOpera.keywordsContratto.value;

  // VERIFICA SUL CAMPO NOME
  if(!/^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(nome)){
    alert("Il campo NOME contiene caratteri non ammessi.");  
    return false; 
  }

  // VERIFICA SUL CAMPO COGNOME
  if(!/^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(cognome)){
    alert("Il campo COGNOME contiene caratteri non ammessi.");  
    return false; 
  }

  // VERIFICA SUL CODICE FISCALE
  if(!/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i.test(codFiscale)){
    alert("Il campo CODICE FISCALE non è formattato correttamente.");  
    return false; 
  }

  // VERIFICO LA PARTITA IVA
  if(!/^$|^[0-9]{4}-[0-9]{4}-[0-9]{3}$/.test(partitaIVA)){
    alert("Il campo PARTITA IVA deve contenere 11 cifre.");
    return false;
  }

  // VERIFICA LA CORRETTEZZA DEI CAMPI INDIRIZZO
  if(!/^$|^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(indirizzoCittà)){
    alert("Il campo CITTÀ (indirizzo) non è formattato correttamente.");  
    return false; 
  }
  
  if(!/^$|^\d{5}$/.test(indirizzoCAP)){
    alert("Il campo CAP (indirizzo) non è formattato correttamente. Deve essere un numero a 5 cifre.");  
    return false; 
  }
  
  if(!/^$|^\d{1,10}$/.test(indirizzoCivico)){
    alert("Il campo CIVICO (indirizzo) non è formattato correttamente.");  
    return false; 
  }

  // VERIFICA LA CORRETTEZZA DEL CAMPO DOMICILIO
  if(!/^$|^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(domicilioCittà)){
    alert("Il campo CITTÀ (domicilio) non è formattato correttamente.");  
    return false; 
  }

  if(!/^$|^\d{5}$/.test(domicilioCAP)){
    alert("Il campo CAP (domicilio) non è formattato correttamente. Deve essere un numero a 5 cifre.");  
    return false; 
  }
  
  if(!/^$|^\d{1,10}$/.test(domicilioCivico)){
    alert("Il campo CIVICO (domicilio) non è formattato correttamente.");  
    return false; 
  }
  
  // VERIFICA LA CORRETTEZZA DEL CAMPO RESIDENZA
  if(!/^$|^[a-zA-ZÀ-ÖØ-öø-ÿ]+(?:[\s.]+[a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/.test(residenzaCittà)){
    alert("Il campo CITTÀ (residenza) non è formattato correttamente.");  
    return false; 
  }

  if(!/^$|^\d{5}$/.test(residenzaCAP)){
    alert("Il campo CAP (residenza) non è formattato correttamente. Deve essere un numero a 5 cifre.");  
    return false; 
  }

  if(!/^$|^\d{1,10}$/.test(residenzaCivico)){
    alert("Il campo CIVICO (residenza) non è formattato correttamente.");  
    return false; 
  }

  // VERIFICO LA CORRETTEZZA DEL VALORE INSERITO NEL CAMPO PREZZO
  if(!/^$|^\d{1,10}\.?\d{0,2}$/.test(prezzo)){
    alert("Il campo PREZZO non contiene un valore valido. I decimali devono essere separati da un punto. Es: 50.25");
    return false; 
  }
  
  // Verifico il codice identificativo.
  if(!/^[a-zA-Z]{3}\d{4,8}$/.test(codIdentificativo)){
    alert("Il campo CODICE IDENTIFICATIVO contiene una stringa non ammessa.");
    return false;
  }

  // VERIFICO CHE LA DATA DI FINE CESSIONE SIA SUCCESSIVA ALLA DATA DI INIZIO CESSIONE
  if(cessioneDirittiIsChecked){
    if(dataCessione > dataFineCessione){
      alert("La data di cessione non può essere successiva alla data di fine cessione.");
      return false;
    }
  }
  
  // VERIFICO CHE IL NOME DEL FILE INSERITO DALL'UTENTE NON CONTENGA DEI CARATTERI NON AMMESSI AL SUO INTERNO
  if(nomeContratto.includes("'") || nomeContratto.includes("/") ||  nomeContratto.includes("#") ||  nomeContratto.includes("%") || nomeContratto.includes("§") ){
    alert("Il campo NOME DEL CONTRATTO contiene caratteri non ammessi. Il nome non deve contenere i seguenti caratteri: ' / § # % ");
    return false; 
  }

}

// AGGIUNGO I DASH NEL CAMPO PARTITA IVA OGNI 4 CIFRE DIGITATE
$(document).ready(function () {
    $('#partitaIVA').keyup(function (event) {
        addHyphen (this);
    });
});

function addHyphen (element) {
    let val = $(element).val().split('-').join('');   // Remove dash (-) if mistakenly entered.

    let finalVal = val.match(/.{1,4}/g).join('-');    // Add (-) after 3rd every char.
    $(element).val(finalVal);		// Update the input box.
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

// PER VISUALIZZARE IL MESSAGGIO QUANDO VIENE SPUNTATO IL TOGGLE.
function myFunctionToggle() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  var dataFirma = document.getElementById("dataFineCessione");

  if (checkBox.checked == true){
    text.style.display = "block";
    dataFirma.style.display = "block";
    $("#dataFineCessione").slideDown("slow");
  } else {
    text.style.display = "none";
    dataFirma.style.display = "none";
  }
}

// USATA PER LA BARRA DI CARICAMENTO DEL FILE
function _(el) {
  return document.getElementById(el);
}

// USATA PER LA BARRA DI CARICAMENTO DEL FILE
function uploadFile() {
  var file = _("contratto").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("contratto", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php");
  ajax.send(formdata);
}

// USATA PER LA BARRA DI CARICAMENTO DEL FILE
function progressHandler(event) {
  //_("loaded_n_total").innerHTML = "Caricati " + event.loaded + " bytes di " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("loaded_n_total").innerHTML = Math.round(percent) + "% caricati";
}

// USATA PER LA BARRA DI CARICAMENTO DEL FILE
function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}

// USATA PER LA BARRA DI CARICAMENTO DEL FILE
function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

// USATA PER LA BARRA DI CARICAMENTO DEL FILE
function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}

</script>

</body>
</html>