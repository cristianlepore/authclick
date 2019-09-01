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
window.onscroll = function () { scrollFunction() };

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
    } else {
        document.getElementById("mySidebar").style.width = "225px";
    }
}

// FUNZIONE PER CHIUDERE LA BARRA LATERALE DI SINISTRA
function closeNav() {
    if (window.innerWidth > 600) {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("w3-top").style.marginLeft = "0px";
        document.getElementById("myBtn").style.marginLeft = "4%";
        document.getElementById("header").style.marginLeft = "0";
    } else {
        document.getElementById("mySidebar").style.width = "0";
    }
}

function closeNav2() {
    if (window.innerWidth > 600) {
    } else {
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
window.onscroll = function () { scrollFunction(); myFunction_progressBar(); };

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
    coll[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}

// SCRIPT AJAX. MENTRE SI DIGITA IL CODICE IDENTIFICATIVO DELLA FOTOGRAFIA, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {
    $('.search-box-codIdentificativo input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

        // LO TRASFORMO IN STRINGA PER PASSARLO DOPO ALLA FUNZIONE SUCCESSIVA
        var codiceIdentificativoFotografia = JSON.stringify(inputVal);

        if (inputVal.length) {
            $.get("backend-search-codIdentificativo.php", { term: inputVal }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);

                // STAMPO LA LISTA DEI CONTRATTI
                $.get("show-contracts.php", { code: inputVal }).done(function (data) {
                    // FACCIO IL PARSING DEL JSON E LO STAMPO
                    var listaContratti = JSON.parse(data);
                    var singoloContratto = JSON.parse(listaContratti.contratto);

                    // SE IL CODICE IDENTIFICATIVO CERCATO NON RITORNA NULLA, ALLORA CANCELLO IL TAG
                    if (singoloContratto == "") {
                        document.getElementById("contratti").innerHTML = "";
                        document.getElementById("storicoTrasferimenti").innerHTML = "";
                    } else {
                        document.getElementById("contratti").innerHTML = "";

                        // RICREO LA TABELLA CHE È STATA DISTRUTTA PRIMA
                        var tabella = '<table id="contratti"><tr><th>Numero</th><th>Contratto</th><th>Tipologia</th><th>Data trasferimento</th><th>Fine cessione</th><th>Proprietario</th><th>ID proprietario</th><th></th></tr></table>';
                        document.getElementById('newTable').innerHTML = tabella;
                        var titolo = '<h4 id="storicoTrasferimenti"><i class="fa fa-history"></i> STORICO TRASFERIMENTI</h4>';
                        document.getElementById('storicoTrasferimenti').innerHTML = titolo;

                        // document.getElementById("contratti").innerHTML = 1 + " <div class='w3-left'>" + singoloContratto[0].Nome + " -- " + singoloContratto[0].Tipologia + " -- " + singoloContratto[0].Data_cessione +  " -- " + singoloContratto[0].Fine_cessione +  " -- " + singoloContratto[0].Nome_proprietario +  " -- " + singoloContratto[0].Cognome_proprietario + "</div><br><hr class='horizontalLine'><br>";
                        // QUANDO VIENE DIGITATO UN CODICE ESISTENTE
                        for (var i = 0; i < singoloContratto.length; i++) {
                            // SE LA DATA DI FINE CESSIONE È NULL, LA ELIMINO
                            if (singoloContratto[i].Fine_cessione == null)
                                singoloContratto[i].Fine_cessione = "";

                            // PREPARO I VALORI DA PASSARE
                            var idTrasferimento = singoloContratto[i].idTrasferimento;
                            var path = JSON.stringify(singoloContratto[i].Path + singoloContratto[i].Nome);
                            var nomeFile = JSON.stringify(singoloContratto[i].Nome);

                            // GENERO I PULSANTI DA UTILIZZARE SU OGNI RIGA
                            var visualizza = "<span title='Visualizza documento caricato'><a href='https://docs.google.com/gview?url=http://192.168.1.6/authclick/new/" + singoloContratto[i].Path + singoloContratto[i].Nome + "&embedded=true' class='w3-button' style='background-color:#6397d0; color:white;' target='_blank'><i class='fa fa-eye'></i></a></span>";
                            var scarica = "<span title='Scarica documento'><a href=" + singoloContratto[i].Path + singoloContratto[i].Nome + " class='w3-button' style='background-color:red;color:white;'><i class='fa fa-download'></i></a></span>";
                            var blockchian = "<span title='Invia dati su blockchain'><button class='w3-button' style='background-color:green;color:white;' onclick='on(" + [i, codiceIdentificativoFotografia, idTrasferimento, path, nomeFile] + ")'><i class='fa fa-chain'></i> BLOCKCHAIN</button></span>";

                            // STAMPO I VALORI OTTENUTI
                            // STAMPO L'ULTIMO CODICE IDENTIFICATIVO INSERITO NEL DATABASE
                            var tr = document.createElement('TR');
                            tr.innerHTML = '<tr><td>' + (i + 1) + "</td><td>" + singoloContratto[i].Nome + "</td><td>" + singoloContratto[i].Tipologia + "</td><td>" + singoloContratto[i].Data_cessione + "</td><td>" + singoloContratto[i].Fine_cessione + "</td><td>" + singoloContratto[i].Nome_proprietario + " " + singoloContratto[i].Cognome_proprietario + "</td><td>" + singoloContratto[i].Codice_fiscale + "</td><td>" + visualizza + "&nbsp  &nbsp" + scarica + "&nbsp  &nbsp &nbsp  &nbsp &nbsp" + blockchian + "</td></tr>";
                            document.getElementById('contratti').appendChild(tr);

                        }
                    }
                });

            });

        } else {
            resultDropdown.empty();
        }

    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-box-codIdentificativo").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });

});

// SCRIPT AJAX. MENTRE SI DIGITA IL CODICE IDENTIFICATIVO DELLA FOTOGRAFIA, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {

    // ALLA PRIMA APERTURA DELLA PAGINA MI VISUALIZZA L'ELENCO DEI NOMI DEI CONTRATTI
    $.get("show-codiceIdentificativo.php", {}).done(function (data) {
        // PRENDO I DATI DI RITORNO DALLA QUERY AL DATABASE
        var codIdentificativo = data;
        var codiceIdentificativo = JSON.stringify(codIdentificativo);

        $.get("show-contracts.php", { code: codIdentificativo }).done(function (data) {
            // FACCIO IL PARSING DEL JSON E LO STAMPO
            var listaContratti = JSON.parse(data);
            var singoloContratto = JSON.parse(listaContratti.contratto)

            for (var i = 0; i < singoloContratto.length; i++) {

                // SE LA DATA DI FINE CESSIONE È NULL, LA ELIMINO
                if (singoloContratto[i].Fine_cessione == null)
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
                var blockchian = "<span title='Invia dati su blockchain'><button class='w3-button' style='background-color:green;color:white;' onclick='on(" + [i, codiceIdentificativo, idTrasferimento, path, nomeFile] + ")'><i class='fa fa-chain'></i> BLOCKCHAIN</button></span>";

                // STAMPO I VALORI OTTENUTI
                // STAMPO L'ULTIMO CODICE IDENTIFICATIVO INSERITO NEL DATABASE
                var tr = document.createElement('TR');
                tr.innerHTML = '<tr><td>' + (i + 1) + "</td><td>" + singoloContratto[i].Nome + "</td><td>" + singoloContratto[i].Tipologia + "</td><td>" + singoloContratto[i].Data_cessione + "</td><td>" + singoloContratto[i].Fine_cessione + "</td><td>" + singoloContratto[i].Nome_proprietario + " " + singoloContratto[i].Cognome_proprietario + "</td><td>" + singoloContratto[i].Codice_fiscale + "</td><td>" + visualizza + "&nbsp  &nbsp" + scarica + "&nbsp  &nbsp &nbsp  &nbsp &nbsp" + blockchian + "</td></tr>";
                document.getElementById('contratti').appendChild(tr);

            }
        });

    });

});