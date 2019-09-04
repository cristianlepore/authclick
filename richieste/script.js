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
            var luogoNascita = document.getElementById("luogoNascita").value;

            $.get("../backend-searchNome.php", { cognome: cognome, term: inputVal, codFiscale: codFiscale, luogoNascita: luogoNascita }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (data != '') {
                    $('#nome').css("color", "black");
                    $('#cognome').css("color", "black");
                    $('#codFiscale').css("color", "black");
                    $('#luogoNascita').css("color", "black");
                } else {
                    $('#nome').css("color", "red");
                    $('#cognome').css("color", "red");
                    $('#codFiscale').css("color", "red");
                    $('#luogoNascita').css("color", "red");
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }
            });

            $.get("queryAutoriAcquirenti.php", { cognome: cognome, nome: inputVal, codFiscale: codFiscale, luogoNascita: luogoNascita }).done(function (data) {
                if (data != '') {
                    let myJson = JSON.parse(data);
                    var singoloUtente = JSON.parse(myJson.Dati_utente);

                    if (singoloUtente.length != track.getUltimo) {
                        track.setUltimo = singoloUtente.length;
                        document.getElementById("tabellaAutoriAcquirenti").innerHTML = "";
                        createHTMLTable(singoloUtente);
                    }
                } else {
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }

            });
        } else {
            track.setUltimo = 0;
            if (document.getElementById("codFiscale").value == '' && document.getElementById("cognome").value == '' && document.getElementById("luogoNascita").value == '') {
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
            var luogoNascita = document.getElementById("luogoNascita").value;

            $.get("../backend-searchCognome.php", { nome: nome, term: inputVal, codFiscale: codFiscale, luogoNascita: luogoNascita }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (data != '') {
                    $('#cognome').css("color", "black");
                    $('#nome').css("color", "black");
                    $('#codFiscale').css("color", "black");
                    $('#luogoNascita').css("color", "black");
                } else {
                    $('#cognome').css("color", "red");
                    $('#nome').css("color", "red");
                    $('#codFiscale').css("color", "red");
                    $('#luogoNascita').css("color", "red");
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }

                $.get("queryAutoriAcquirenti.php", { cognome: inputVal, nome: nome, codFiscale: codFiscale, luogoNascita: luogoNascita }).done(function (data) {
                    if (data != '') {
                        let myJson = JSON.parse(data);
                        var singoloUtente = JSON.parse(myJson.Dati_utente);

                        if (singoloUtente.length != track.getUltimo) {
                            track.setUltimo = singoloUtente.length;
                            document.getElementById("tabellaAutoriAcquirenti").innerHTML = "";
                            createHTMLTable(singoloUtente);
                        }
                    }
                });

            });
        } else {
            track.setUltimo = 0;
            if (document.getElementById("nome").value == '' && document.getElementById("codFiscale").value == '' && document.getElementById("luogoNascita").value == '') {
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
            var luogoNascita = document.getElementById("luogoNascita").value;

            $.get("../backend-searchCodFiscale.php", { nome: nome, cognome: cognome, term: inputVal, luogoNascita: luogoNascita }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (data != '') {
                    $('#cognome').css("color", "black");
                    $('#nome').css("color", "black");
                    $('#codFiscale').css("color", "black");
                    $('#luogoNascita').css("color", "black");
                } else {
                    $('#cognome').css("color", "red");
                    $('#nome').css("color", "red");
                    $('#codFiscale').css("color", "red");
                    $('#luogoNascita').css("color", "red");
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }

                $.get("queryAutoriAcquirenti.php", { cognome: cognome, nome: nome, codFiscale: inputVal, luogoNascita: luogoNascita }).done(function (data) {
                    if (data != '') {
                        let myJson = JSON.parse(data);
                        var singoloUtente = JSON.parse(myJson.Dati_utente);

                        if (singoloUtente.length != track.getUltimo) {
                            track.setUltimo = singoloUtente.length;
                            document.getElementById("tabellaAutoriAcquirenti").innerHTML = "";
                            createHTMLTable(singoloUtente);
                        }
                    }
                });
            });
        } else {
            track.setUltimo = 0;
            if (document.getElementById("nome").value == '' && document.getElementById("cognome").value == '' && document.getElementById("luogoNascita").value == '') {
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
    $('.search-boxLuogoNascita input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

        if (inputVal.length) {
            // PRENDO IL VALORE DEL COGNOME DA PASSARGLI
            var nome = document.getElementById("nome").value;
            var cognome = document.getElementById("cognome").value;
            var codFiscale = document.getElementById("codFiscale").value;

            $.get("../backend-searchLuogoNascita.php", { nome: nome, cognome: cognome, codFiscale: codFiscale, luogoNascita: inputVal }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (data != '') {
                    $('#cognome').css("color", "black");
                    $('#nome').css("color", "black");
                    $('#codFiscale').css("color", "black");
                    $('#luogoNascita').css("color", "black");
                } else {
                    $('#cognome').css("color", "red");
                    $('#nome').css("color", "red");
                    $('#codFiscale').css("color", "red");
                    $('#luogoNascita').css("color", "red");
                    track.setUltimo = 0;
                    destroyHTMLTable();
                }

                $.get("queryAutoriAcquirenti.php", { cognome: cognome, nome: nome, codFiscale: codFiscale, luogoNascita: inputVal }).done(function (data) {
                    if (data != '') {
                        let myJson = JSON.parse(data);
                        var singoloUtente = JSON.parse(myJson.Dati_utente);

                        if (singoloUtente.length != track.getUltimo) {
                            track.setUltimo = singoloUtente.length;
                            document.getElementById("tabellaAutoriAcquirenti").innerHTML = "";
                            createHTMLTable(singoloUtente);
                        }
                    }
                });
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
        $(this).parents(".search-boxLuogoNascita").find('input[type="text"]').val();
        $(this).parent(".result").empty();
    });
});

const createHTMLTable = function (singoloUtente) {

    if (singoloUtente != '') {
        document.getElementById("tabellaAutoriAcquirenti").innerHTML = "<div id='divTabella' style='overflow-x:auto;'><table id='tabellaAutoriAcquirenti'><tr><th></th><th>Nome</th><th>Cognome</th><th>Data di nascita</th><th>Luogo di nascita</th><th>Data decesso</th><th>Luogo del decesso</th><th>Codice identificativo</th><th>Partita IVA</th></tr></table></div>";

        for (var i = 0; i < singoloUtente.length; i++) {
            if (singoloUtente[i].Giorno_nascita == null || singoloUtente[i].Giorno_nascita == '0')
                singoloUtente[i].Giorno_nascita = '';
            else
                singoloUtente[i].Giorno_nascita += ' / ';
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

            if (i % 2 == 0)
                document.getElementById("tabellaAutoriAcquirenti").innerHTML += "<tr style='background-color: #dddddd;'><td>" + singoloUtente[i].Tipologia + "</td><td>" + singoloUtente[i].Nome + "</td><td>" + singoloUtente[i].Cognome + "</td><td>" + singoloUtente[i].Giorno_nascita + singoloUtente[i].Mese_nascita + singoloUtente[i].Anno_nascita + "</td><td>" + singoloUtente[i].Luogo_nascita + "</td><td>" + singoloUtente[i].Giorno_morte + singoloUtente[i].Mese_morte + singoloUtente[i].Anno_morte + "</td><td>" + singoloUtente[i].Luogo_morte + "</td><td>" + singoloUtente[i].Codice_fiscale + "</td><td>" + singoloUtente[i].Partita_IVA + "</td></tr>";
            else
                document.getElementById("tabellaAutoriAcquirenti").innerHTML += "<tr><td>" + singoloUtente[i].Tipologia + "</td><td>" + singoloUtente[i].Nome + "</td><td>" + singoloUtente[i].Cognome + "</td><td>" + singoloUtente[i].Giorno_nascita + singoloUtente[i].Mese_nascita + singoloUtente[i].Anno_nascita + "</td><td>" + singoloUtente[i].Luogo_nascita + "</td><td>" + singoloUtente[i].Giorno_morte + singoloUtente[i].Mese_morte + singoloUtente[i].Anno_morte + "</td><td>" + singoloUtente[i].Luogo_morte + "</td><td>" + singoloUtente[i].Codice_fiscale + "</td><td>" + singoloUtente[i].Partita_IVA + "</td></tr>";

        }

    }

}

const destroyHTMLTable = function () {

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