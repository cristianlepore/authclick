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

// SCRIPT AJAX. MENTRE SI DIGITA UN NOME, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {
    $('.search-boxNome input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

        if (inputVal.length) {
            // PRENDO IL VALORE DEL COGNOME DA PASSARGLI
            var cognome = document.getElementById("cognome").value;
            var codFiscale = document.getElementById("codFiscale").value;
            var tipologia = document.getElementById("tipologia").value;
            var keywords = document.getElementById("keywordsAutoreProprietario").value;

            $.get("../backend-searchNome.php", { cognome: cognome, term: inputVal, codFiscale: codFiscale, luogoNascita: "", tipologia: tipologia }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (data != '') {
                    $('#nome').css("color", "black");
                    $('#cognome').css("color", "black");
                    $('#codFiscale').css("color", "black");
                    $('#tipologia').css("color", "black");
                    $('#keywordsAutoreProprietario').css("color", "black");
                } else {
                    $('#nome').css("color", "red");
                    $('#cognome').css("color", "red");
                    $('#codFiscale').css("color", "red");
                    $('#tipologia').css("color", "red");
                    $('#keywordsAutoreProprietario').css("color", "red");
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }
            });

            $.get("queryAutoriAcquirenti.php", { cognome: cognome, nome: inputVal, codFiscale: codFiscale, luogoNascita: "", tipologia: tipologia, keywords: keywords }).done(function (data) {
                if (data != '') {
                    let myJson = JSON.parse(data);
                    var singoloUtente = JSON.parse(myJson.Dati_utente);

                    document.getElementById("tabellaAutoriAcquirenti").innerHTML = "";
                    createHTMLTable(singoloUtente);
                } else {
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }

            });
        } else {
            track.setUltimo = 0;
            if (document.getElementById("codFiscale").value == '' && document.getElementById("cognome").value == '' && document.getElementById("keywordsAutoreProprietario").value == '') {
                destroyHTMLTable();
            }
            resultDropdown.empty();
        }

    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-boxNome").find('input[type="text"]').val();
        $(this).parent(".result").empty();
    });
});

// SCRIPT AJAX. MENTRE SI DIGITA UN COGNOME, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {
    $('.search-boxCognome input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

        if (inputVal.length) {
            // PRENDO IL VALORE DEL COGNOME DA PASSARGLI
            var nome = document.getElementById("nome").value;
            var codFiscale = document.getElementById("codFiscale").value;
            var tipologia = document.getElementById("tipologia").value;
            var keywords = document.getElementById("keywordsAutoreProprietario").value;

            $.get("../backend-searchCognome.php", { nome: nome, term: inputVal, codFiscale: codFiscale, luogoNascita: "", tipologia: tipologia }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (data != '') {
                    $('#cognome').css("color", "black");
                    $('#nome').css("color", "black");
                    $('#codFiscale').css("color", "black");
                    $('#tipologia').css("color", "black");
                    $('#keywordsAutoreProprietario').css("color", "black");
                } else {
                    $('#cognome').css("color", "red");
                    $('#nome').css("color", "red");
                    $('#codFiscale').css("color", "red");
                    $('#tipologia').css("color", "red");
                    $('#keywordsAutoreProprietario').css("color", "red");
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }

                $.get("queryAutoriAcquirenti.php", { cognome: inputVal, nome: nome, codFiscale: codFiscale, luogoNascita: "", tipologia: tipologia, keywords: keywords }).done(function (data) {
                    if (data != '') {
                        let myJson = JSON.parse(data);
                        var singoloUtente = JSON.parse(myJson.Dati_utente);

                        document.getElementById("tabellaAutoriAcquirenti").innerHTML = "";
                        createHTMLTable(singoloUtente);
                    }
                });

            });
        } else {
            track.setUltimo = 0;
            if (document.getElementById("nome").value == '' && document.getElementById("codFiscale").value == '' && document.getElementById("keywordsAutoreProprietario").value == '') {
                destroyHTMLTable();
            }
            resultDropdown.empty();
        }

    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-boxCognome").find('input[type="text"]').val();
        $(this).parent(".result").empty();
    });
});

// SCRIPT AJAX. MENTRE SI DIGITA UN COGNOME, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {
    $('.search-boxCodFiscale input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

        if (inputVal.length) {
            // PRENDO IL VALORE DEL COGNOME DA PASSARGLI
            var nome = document.getElementById("nome").value;
            var cognome = document.getElementById("cognome").value;
            var tipologia = document.getElementById("tipologia").value;
            var keywords = document.getElementById("keywordsAutoreProprietario").value;

            $.get("../backend-searchCodFiscale.php", { nome: nome, cognome: cognome, term: inputVal, luogoNascita: "", tipologia: tipologia }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (data != '') {
                    $('#cognome').css("color", "black");
                    $('#nome').css("color", "black");
                    $('#codFiscale').css("color", "black");
                    $('#tipologia').css("color", "black");
                    $('#keywordsAutoreProprietario').css("color", "black");
                } else {
                    $('#cognome').css("color", "red");
                    $('#nome').css("color", "red");
                    $('#codFiscale').css("color", "red");
                    $('#tipologia').css("color", "red");
                    $('#keywordsAutoreProprietario').css("color", "red");
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }

                $.get("queryAutoriAcquirenti.php", { cognome: cognome, nome: nome, codFiscale: inputVal, luogoNascita: "", tipologia: tipologia, keywords: keywords }).done(function (data) {
                    if (data != '') {
                        let myJson = JSON.parse(data);
                        var singoloUtente = JSON.parse(myJson.Dati_utente);

                        document.getElementById("tabellaAutoriAcquirenti").innerHTML = "";
                        createHTMLTable(singoloUtente);
                    } else {
                        track.setUltimo = 0;
                        destroyHTMLTable();
                    }
                });
            });
        } else {
            track.setUltimo = 0;
            if (document.getElementById("nome").value == '' && document.getElementById("cognome").value == '' && document.getElementById("keywordsAutoreProprietario").value == '') {
                destroyHTMLTable();
            }
            resultDropdown.empty();
        }

    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-boxCodFiscale").find('input[type="text"]').val();
        $(this).parent(".result").empty();
    });
});

// SCRIPT AJAX. MENTRE SI DIGITA UN COGNOME, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {
    $('.search-boxKeywordsAutoreProprietario input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

        var nome = document.getElementById("nome").value;
        var cognome = document.getElementById("cognome").value;
        var tipologia = document.getElementById("tipologia").value;
        var codFiscale = document.getElementById("codFiscale").value;

        if (inputVal.length) {
            // PRENDO IL VALORE DEL COGNOME DA PASSARGLI
            $.get("queryAutoriAcquirenti.php", { cognome: cognome, nome: nome, codFiscale: codFiscale, luogoNascita: "", tipologia: tipologia, keywords: inputVal }).done(function (data) {
                let myJson = JSON.parse(data);
                var singoloUtente = JSON.parse(myJson.Dati_utente);
                if (singoloUtente == '') {
                    track.setUltimo = 0;
                    destroyHTMLTable();
                } else if (data != '') {
                    let myJson = JSON.parse(data);
                    var singoloUtente = JSON.parse(myJson.Dati_utente);

                    document.getElementById("tabellaAutoriAcquirenti").innerHTML = "";
                    createHTMLTable(singoloUtente);

                } else {
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }
            });

        } else {
            track.setUltimo = 0;
            if (document.getElementById("nome").value == '' && document.getElementById("cognome").value == '' && document.getElementById("codFiscale").value == '') {
                destroyHTMLTable();
            }
            resultDropdown.empty();
        }

    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-boxKeywordsAutoreProprietario").find('input[type="text"]').val();
        $(this).parent(".result").empty();
    });
});

const createHTMLTable = function (singoloUtente) {

    createLegend();

    if (singoloUtente != '') {
        document.getElementById("tabellaAutoriAcquirenti").innerHTML = "<div id='divTabella' style='overflow-x:auto;'><table id='tabellaAutoriAcquirenti'><tr><th></th><th>Nome</th><th>Cognome</th><th>Data di nascita</th><th>Luogo di nascita</th><th>Data decesso</th><th>Luogo del decesso</th><th>Codice identificativo</th><th>Partita IVA</th></tr></table></div>";
        var arr = [];

        var tabella = "";
        for (var i = 0; i < singoloUtente.length; i++) {
            if (singoloUtente[i].Utente_tipologia == 'Altro')
                singoloUtente[i].Utente_tipologia = 'Proprietario';
            else if (singoloUtente[i].Utente_tipologia == 'Autore/altro')
                singoloUtente[i].Utente_tipologia = 'Autore & Proprietario';
            if (singoloUtente[i].Giorno_nascita == null || singoloUtente[i].Giorno_nascita == '0')
                singoloUtente[i].Giorno_nascita = '';
            else
                singoloUtente[i].Giorno_nascita += ' / ';
            if (singoloUtente[i].Anno_nascita == null || singoloUtente[i].Anno_nascita == '0')
                singoloUtente[i].Anno_nascita = '';
            if (singoloUtente[i].Luogo_nascita == null || singoloUtente[i].luogoNascita == '0')
                singoloUtente[i].Luogo_nascita = '';
            if (singoloUtente[i].Mese_nascita == null || singoloUtente[i].Mese_nascita == '0')
                singoloUtente[i].Mese_nascita = '';
            else
                singoloUtente[i].Mese_nascita += ' / ';
            if (singoloUtente[i].Giorno_morte == null || singoloUtente[i].Giorno_morte == '0')
                singoloUtente[i].Giorno_morte = '';
            else
                singoloUtente[i].Giorno_morte += ' / ';
            if (singoloUtente[i].Mese_morte == null || singoloUtente[i].Mese_morte == '0')
                singoloUtente[i].Mese_morte = '';
            else
                singoloUtente[i].Mese_morte += ' / ';
            if (singoloUtente[i].Anno_morte == null || singoloUtente[i].Anno_morte == '0')
                singoloUtente[i].Anno_morte = '';
            if (singoloUtente[i].Luogo_morte == null || singoloUtente[i].Luogo_morte == '0')
                singoloUtente[i].Luogo_morte = '';
            if (singoloUtente[i].Codice_fiscale == null || singoloUtente[i].Codice_fiscale == '0')
                singoloUtente[i].Codice_fiscale = '';
            if (singoloUtente[i].Partita_IVA == null || singoloUtente[i].Partita_IVA == '')
                singoloUtente[i].Partita_IVA = '';

            if (singoloUtente[i].Giorno_scatto == '0')
                singoloUtente[i].Giorno_scatto = '';
            else
                singoloUtente[i].Giorno_scatto += ' / ';
            if (singoloUtente[i].Mese_scatto == '0')
                singoloUtente[i].Mese_scatto = '';
            else
                singoloUtente[i].Mese_scatto += ' / ';

            if (singoloUtente[i].Giorno_stampa == '0')
                singoloUtente[i].Giorno_stampa = '';
            else
                singoloUtente[i].Giorno_stampa += ' / ';
            if (singoloUtente[i].Mese_stampa == '0')
                singoloUtente[i].Mese_stampa = '';
            else
                singoloUtente[i].Mese_stampa += ' / ';

            if (singoloUtente[i].Fine_cessione == null)
                singoloUtente[i].Fine_cessione = '';

            let photoFeatures = "";

            if (i > 0 && (singoloUtente[i].id == singoloUtente[i - 1].id)) {
                if (singoloUtente[i].Utente_tipologia == 'Autore')
                    photoFeatures = "<tr style='background-color: rgb(171, 236, 171); display: none; font-size: 12px;' class='datarow'><td></td><td> <b>Titolo:</b> " + singoloUtente[i].Titolo + "</td><td><b>Cod ID: </b>" + singoloUtente[i].Codice_identificativo + "</td><td><b> Scatto: </b>" + singoloUtente[i].Giorno_scatto + singoloUtente[i].Mese_scatto + singoloUtente[i].Anno_scatto + "</td><td><b> Stampa: </b>" + singoloUtente[i].Giorno_stampa + singoloUtente[i].Mese_stampa + singoloUtente[i].Anno_stampa + "</td><td><b>Lungheza: </b>" + singoloUtente[i].Lunghezza + "</td><td><b>Larghezza: </b>" + singoloUtente[i].Larghezza + "</td><td><b>Tiratura: </b>" + singoloUtente[i].Tiratura + "</td><td><b>Esemplare: </b>" + singoloUtente[i].Esemplare + "</td></tr>";
                else if (singoloUtente[i].Utente_tipologia == 'Autore & Proprietario') {
                    if (singoloUtente[i].Codice_identificativo != singoloUtente[i - 1].Codice_identificativo)
                        photoFeatures = "<tr style='background-color: rgb(171, 236, 171); display: none; font-size: 12px;' class='datarow'><td></td><td> <b>Titolo:</b> " + singoloUtente[i].Titolo + "</td><td><b>Cod ID: </b>" + singoloUtente[i].Codice_identificativo + "</td><td><b> Scatto: </b>" + singoloUtente[i].Giorno_scatto + singoloUtente[i].Mese_scatto + singoloUtente[i].Anno_scatto + "</td><td><b> Stampa: </b>" + singoloUtente[i].Giorno_stampa + singoloUtente[i].Mese_stampa + singoloUtente[i].Anno_stampa + "</td><td><b>Lungheza: </b>" + singoloUtente[i].Lunghezza + "</td><td><b>Larghezza: </b>" + singoloUtente[i].Larghezza + "</td><td><b>Tiratura: </b>" + singoloUtente[i].Tiratura + "</td><td><b>Esemplare: </b>" + singoloUtente[i].Esemplare + "</td></tr>";

                    if (singoloUtente[i].id == singoloUtente[i].Acquirente) {
                        var flag = false;
                        for (var j = 0; j < i; j++) {
                            if (singoloUtente[i].Foto_acquistata == singoloUtente[j].Foto_acquistata && singoloUtente[i].Acquirente == singoloUtente[j].Acquirente && singoloUtente[i].id == singoloUtente[j].id)
                                flag = true;
                        }


                        for (var j = 0; j < arr.length; j++)
                            if (arr[j].id_trasferimento == singoloUtente[i].id_trasferimento)
                                flag = true;

                        if (flag == false && singoloUtente[i].Tipologia != 'Cessione')
                            arr.push(singoloUtente[i]);
                    }

                } else if (singoloUtente[i].Utente_tipologia == 'Proprietario') {
                    if (singoloUtente[i].id == singoloUtente[i].Acquirente) {
                        var flag = false;
                        for (var j = 0; j < i; j++) {
                            if (singoloUtente[i].Foto_acquistata == singoloUtente[j].Foto_acquistata)
                                if (singoloUtente[j].Acquirente == singoloUtente[j].Venditore) {
                                    flag = true;
                                }
                        }

                        if (singoloUtente[i].Utente_tipologia == 'Proprietario' && flag == false)
                            arr.push(singoloUtente[i]);

                        if (flag == true && singoloUtente[i].Tipologia != 'Cessione')
                            for (var j = 0; j < arr.length; j++)
                                if (arr[j].Foto_acquistata == singoloUtente[i].Foto_acquistata)
                                    flag = false;
                        if (flag == true)
                            arr.push(singoloUtente[i]);
                    }

                }
                var tabella = tabella + photoFeatures;
            } else {
                for (var j = 0; j < arr.length; j++) {
                    var user = "<tr style='background-color: lightblue; display: none; font-size: 12px;' class='datarow'><td></td><td> <b>Tipologia:</b> " + arr[j].Tipologia + "</td><td><b>Cod ID: </b>" + arr[j].Foto_acquistata + "</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                    var tabella = tabella + user;
                }

                var arr = [];
                if (singoloUtente[i].Utente_tipologia == 'Autore')
                    var user = "<tr style='background-color: white; font-size: 12px;' class='breakrow'><td style='font-size: 12pxx;'>" + singoloUtente[i].Utente_tipologia + "</td><td>" + singoloUtente[i].Nome + "</td><td>" + singoloUtente[i].Cognome + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Giorno_nascita + singoloUtente[i].Mese_nascita + singoloUtente[i].Anno_nascita + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Luogo_nascita + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Giorno_morte + singoloUtente[i].Mese_morte + singoloUtente[i].Anno_morte + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Luogo_morte + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Codice_fiscale + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Partita_IVA + "</td></tr><tr style='background-color: rgb(171, 236, 171); display: none; font-size: 12px;' class='datarow'><td></td><td> <b>Titolo:</b> " + singoloUtente[i].Titolo + "</td><td><b>Cod ID: </b>" + singoloUtente[i].Codice_identificativo + "</td><td><b> Scatto: </b>" + singoloUtente[i].Giorno_scatto + singoloUtente[i].Mese_scatto + singoloUtente[i].Anno_scatto + "</td><td><b> Stampa: </b>" + singoloUtente[i].Giorno_stampa + singoloUtente[i].Mese_stampa + singoloUtente[i].Anno_stampa + "</td><td><b>Lungheza: </b>" + singoloUtente[i].Lunghezza + "</td><td><b>Larghezza: </b>" + singoloUtente[i].Larghezza + "</td><td><b>Tiratura: </b>" + singoloUtente[i].Tiratura + "</td><td><b>Esemplare: </b>" + singoloUtente[i].Esemplare + "</td></tr>";
                else if (singoloUtente[i].Utente_tipologia == 'Proprietario') {
                    if (singoloUtente[i].id == singoloUtente[i].Acquirente) {
                        var flag = false;
                        for (var j = 0; j <= i; j++) {
                            if (singoloUtente[i].Foto_acquistata == singoloUtente[j].Foto_acquistata)
                                if (singoloUtente[j].Acquirente == singoloUtente[j].Venditore) {
                                    flag = true;
                                }
                        }

                        if (singoloUtente[i].Utente_tipologia == 'Proprietario' && flag == false)
                            for (var j = 0; j < i; j++)
                                if (singoloUtente[i].Foto_acquistata == singoloUtente[j].Foto_acquistata) {
                                    flag = false;
                                    break;
                                } else
                                    flag = true;

                        if (flag == true && singoloUtente[i].Tipologia != 'Cessione')
                            for (var j = 0; j < arr.length; j++)
                                if (arr[j].Foto_acquistata == singoloUtente[i].Foto_acquistata)
                                    flag = false;

                        if (flag == true)
                            arr.push(singoloUtente[i]);
                        else if (i == 0 && flag == false)
                            arr.push(singoloUtente[i]);
                    }
                    var user = "<tr style='background-color: white; font-size: 12px;' class='breakrow'><td style='font-size: 12pxx;'>" + singoloUtente[i].Utente_tipologia + "</td><td>" + singoloUtente[i].Nome + "</td><td>" + singoloUtente[i].Cognome + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Giorno_nascita + singoloUtente[i].Mese_nascita + singoloUtente[i].Anno_nascita + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Luogo_nascita + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Giorno_morte + singoloUtente[i].Mese_morte + singoloUtente[i].Anno_morte + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Luogo_morte + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Codice_fiscale + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Partita_IVA + "</td></tr>";

                } else if (singoloUtente[i].Utente_tipologia == 'Autore & Proprietario') {
                    var user = "<tr style='background-color: white; font-size: 12px;' class='breakrow'><td style='font-size: 12pxx;'>" + singoloUtente[i].Utente_tipologia + "</td><td>" + singoloUtente[i].Nome + "</td><td>" + singoloUtente[i].Cognome + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Giorno_nascita + singoloUtente[i].Mese_nascita + singoloUtente[i].Anno_nascita + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Luogo_nascita + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Giorno_morte + singoloUtente[i].Mese_morte + singoloUtente[i].Anno_morte + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Luogo_morte + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Codice_fiscale + "</td><td style='font-size: 12pxx;'>" + singoloUtente[i].Partita_IVA + "</td></tr><tr style='background-color: rgb(171, 236, 171); display: none; font-size: 12px;' class='datarow'><td></td><td> <b>Titolo:</b> " + singoloUtente[i].Titolo + "</td><td><b>Cod ID: </b>" + singoloUtente[i].Codice_identificativo + "</td><td><b> Scatto: </b>" + singoloUtente[i].Giorno_scatto + singoloUtente[i].Mese_scatto + singoloUtente[i].Anno_scatto + "</td><td><b> Stampa: </b>" + singoloUtente[i].Giorno_stampa + singoloUtente[i].Mese_stampa + singoloUtente[i].Anno_stampa + "</td><td><b>Lungheza: </b>" + singoloUtente[i].Lunghezza + "</td><td><b>Larghezza: </b>" + singoloUtente[i].Larghezza + "</td><td><b>Tiratura: </b>" + singoloUtente[i].Tiratura + "</td><td><b>Esemplare: </b>" + singoloUtente[i].Esemplare + "</td></tr>";
                    if (singoloUtente[i].id == singoloUtente[i].Acquirente) {
                        var flag = false;
                        for (var j = 0; j < i; j++)
                            if (singoloUtente[i].Foto_acquistata == singoloUtente[j].Foto_acquistata && singoloUtente[i].Acquirente == singoloUtente[j].Acquirente && singoloUtente[i].id == singoloUtente[j].id)
                                flag = true;


                        for (var j = 0; j < arr.length; j++)
                            if (arr[j].id_trasferimento == singoloUtente[i].id_trasferimento)
                                flag = true;

                        if (flag == false && singoloUtente[i].Tipologia != 'Cessione')
                            arr.push(singoloUtente[i]);
                    }
                }
                var tabella = tabella + user;
            }

        }
        for (var j = 0; j < arr.length; j++) {
            var user = "<tr style='background-color: lightblue; display: none; font-size: 12px;' class='datarow'><td></td><td><b>Tipologia:</b> " + arr[j].Tipologia + "</td><td><b>Cod ID: </b>" + arr[j].Foto_acquistata + "</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
            var tabella = tabella + user;
        }

    }
    document.getElementById("tabellaAutoriAcquirenti").innerHTML += tabella;

}

const destroyHTMLTable = function () {

    destroyLegend();

    document.getElementById("tabellaAutoriAcquirenti").innerHTML = "<div id='divTabella' style='overflow-x:auto;'><table id='tabellaAutoriAcquirenti'><tr><th></th><th>Nome</th><th>Cognome</th><th>Data di nascita</th><th>Luogo di nascita</th><th>Data decesso</th><th>Luogo del decesso</th><th>Codice identificativo</th><th>Partita IVA</th></tr></table></div>";

}

const track = {
    last: 0,
    get getUltimo() {
        return this.last;
    },
    set setUltimo(ultimo) {
        this.last = ultimo;
    }
}

$(document).ready(function () {

    //collapse and expand sections
    $('#tabellaAutoriAcquirenti').on('click', 'tr.breakrow', function () {
        $(this).nextUntil('tr.breakrow').slideToggle(200);
    });

});

const createLegend = function () {

    document.getElementById("legenda").style.display = "block";

}

const destroyLegend = function () {

    document.getElementById("legenda").style.display = "none";

}