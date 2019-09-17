// SCRIPT AJAX. MENTRE SI DIGITA UN COGNOME, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {
    $('.search-boxCodFotografia input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        inputVal = inputVal.toUpperCase();

        var titolo = document.getElementById("titolo").value;
        var keywordsFotografia = document.getElementById("keywordsFotografia").value;

        if (inputVal.length) {
            $.get("queriesOpere/backend-search-codIdentificativo.php", { term: inputVal, titolo: titolo, keywordsFotografia: keywordsFotografia }).done(function (data) {
                if (data != '') {
                    $('#codFotografia').css("color", "black");
                    $('#titolo').css("color", "black");
                    $('#keywordsFotografia').css("color", "black");
                } else {
                    $('#codFotografia').css("color", "red");
                    $('#titolo').css("color", "red");
                    $('#keywordsFotografia').css("color", "red");
                    trackOpere.setUltimo = 0;
                    destroyHTMLTableOpera();
                }

                $.get("queriesOpere/queryFotografie.php", { codFotografia: inputVal, titolo: titolo, keywordsFotografia: keywordsFotografia }).done(function (data) {
                    if (data != '') {
                        let myJson = JSON.parse(data);
                        var singolaOpera = JSON.parse(myJson.Dati_utente);

                        document.getElementById("tabellaOpere").innerHTML = "";
                        createHTMLTableOpera(singolaOpera);
                    } else {
                        trackOpere.setUltimo = 0;
                        destroyHTMLTableOpera();
                    }
                });
            });
        } else {
            trackOpere.setUltimo = 0;
            if (document.getElementById("titolo").value == '' && document.getElementById("keywordsFotografia").value == '') {
                destroyHTMLTableOpera();
            }
            resultDropdown.empty();
        }

    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-boxCodFotografia").find('input[type="text"]').val();
        $(this).parent(".result").empty();
    });

});

// SCRIPT AJAX. MENTRE SI DIGITA UN COGNOME, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {
    $('.search-boxTitolo input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

        var codFotografia = document.getElementById("codFotografia").value;
        var keywordsFotografia = document.getElementById("keywordsFotografia").value;

        if (inputVal.length) {
            $.get("queriesOpere/backend-search-titolo.php", { codFotografia: codFotografia, term: inputVal, keywordsFotografia: keywordsFotografia }).done(function (data) {
                if (data != '') {
                    $('#codFotografia').css("color", "black");
                    $('#titolo').css("color", "black");
                    $('#keywordsFotografia').css("color", "black");
                } else {
                    $('#codFotografia').css("color", "red");
                    $('#titolo').css("color", "red");
                    $('#keywordsFotografia').css("color", "red");
                    trackOpere.setUltimo = 0;
                    destroyHTMLTableOpera();
                }

                $.get("queriesOpere/queryFotografie.php", { codFotografia: codFotografia, titolo: inputVal, keywordsFotografia: keywordsFotografia }).done(function (data) {
                    if (data != '') {
                        let myJson = JSON.parse(data);
                        var singolaOpera = JSON.parse(myJson.Dati_utente);

                        document.getElementById("tabellaOpere").innerHTML = "";
                        createHTMLTableOpera(singolaOpera);
                    } else {
                        trackOpere.setUltimo = 0;
                        destroyHTMLTableOpera();
                    }
                });
            });
        } else {
            trackOpere.setUltimo = 0;
            if (document.getElementById("codFotografia").value == '' && document.getElementById("keywordsFotografia").value == '') {
                destroyHTMLTableOpera();
            }
            resultDropdown.empty();
        }

    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-boxTitolo").find('input[type="text"]').val();
        $(this).parent(".result").empty();
    });

});

// SCRIPT AJAX. MENTRE SI DIGITA UN COGNOME, CERCA NEL DATABASE DEI SUGGERIMENTI PER QUEL VALORE
$(document).ready(function () {
    $('.search-boxKeywordsOpera input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

        var codFotografia = document.getElementById("codFotografia").value;
        var titolo = document.getElementById("titolo").value;

        if (inputVal.length) {
            $.get("queriesOpere/backend-search-keywords.php", { codFotografia: codFotografia, titolo: titolo, term: inputVal }).done(function (data) {
                if (data != '') {
                    $('#codFotografia').css("color", "black");
                    $('#titolo').css("color", "black");
                    $('#keywordsFotografia').css("color", "black");
                } else {
                    $('#codFotografia').css("color", "red");
                    $('#titolo').css("color", "red");
                    $('#keywordsFotografia').css("color", "red");
                    trackOpere.setUltimo = 0;
                    destroyHTMLTableOpera();
                }

                $.get("queriesOpere/queryFotografie.php", { codFotografia: codFotografia, titolo: titolo, keywordsFotografia: inputVal }).done(function (data) {
                    let myJson = JSON.parse(data);
                    var singoloUtente = JSON.parse(myJson.Dati_utente);
                    if (singoloUtente == '') {
                        trackOpere.setUltimo = 0;
                        destroyHTMLTableOpera();
                    } else if (data != '') {
                        let myJson = JSON.parse(data);
                        var singolaOpera = JSON.parse(myJson.Dati_utente);

                        document.getElementById("tabellaOpere").innerHTML = "";
                        createHTMLTableOpera(singolaOpera);
                    } else {
                        trackOpere.setUltimo = 0;
                        destroyHTMLTableOpera();
                    }
                });
            });
        } else {
            trackOpere.setUltimo = 0;
            if (document.getElementById("codFotografia").value == '' && document.getElementById("keywordsFotografia").value == '') {
                destroyHTMLTableOpera();
            }
            resultDropdown.empty();
        }

    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-boxTitolo").find('input[type="text"]').val();
        $(this).parent(".result").empty();
    });

});

const createHTMLTableOpera = function (singolaOpera) {

    let tuple = "";
    let autoreOpera = "";
    let tabella = "";
    createLegendOpera();
    document.getElementById("tabellaOpere").innerHTML = "<div id='divTabellaOpere' style='overflow-x:auto;'><table id='tabellaOpere'><thead><tr><th>Titolo</th><th>Codice identificativo</th><th>Data ripresa</th><th>Data stampa</th><th>Stampatore</th><th>Committente</th><th>Tecnica di ripresa</th><th>Supporto</th><th>Artist's proof</th></tr></thead></table>";

    for (var i = 0; i < singolaOpera.length; i++) {

        if (singolaOpera[i].Giorno_scatto == null || singolaOpera[i].Giorno_scatto == '0')
            singolaOpera[i].Giorno_scatto = '';
        else
            singolaOpera[i].Giorno_scatto += ' / ';
        if (singolaOpera[i].Mese_scatto == null || singolaOpera[i].Mese_scatto == '0')
            singolaOpera[i].Mese_scatto = '';
        else
            singolaOpera[i].Mese_scatto += ' / ';

        if (singolaOpera[i].Giorno_stampa == null || singolaOpera[i].Giorno_stampa == '0')
            singolaOpera[i].Giorno_stampa = '';
        else
            singolaOpera[i].Giorno_stampa += ' / ';
        if (singolaOpera[i].Mese_stampa == null || singolaOpera[i].Mese_stampa == '0')
            singolaOpera[i].Mese_stampa = '';
        else
            singolaOpera[i].Mese_stampa += ' / ';

        if (singolaOpera[i].Codice_fiscale == null)
            singolaOpera[i].Codice_fiscale = '';

        tuple = "<tr style='background-color: white; font-size: 12px;' class='breakrow'><td>" + singolaOpera[i].Titolo + "</td><td>" + singolaOpera[i].Codice_identificativo + "</td><td>" + singolaOpera[i].Giorno_scatto + singolaOpera[i].Mese_scatto + singolaOpera[i].Anno_scatto + "</td><td>" + singolaOpera[i].Giorno_stampa + singolaOpera[i].Mese_stampa + singolaOpera[i].Anno_stampa + "</td><td>" + singolaOpera[i].Nome_stampatore + " " + singolaOpera[i].Cognome_stampatore + "</td><td>" + singolaOpera[i].Nome_committente + "</td><td>" + singolaOpera[i].Tecnica_scatto + "</td><td>" + singolaOpera[i].Supporto + "</td><td>" + singolaOpera[i].Artist_proof + "</td></tr>";
        autoreOpera = "<tr style='background-color: rgb(171, 236, 171); display: none; font-size: 12px;' class='datarow'><td></td><td><b>Autore: </b>" + singolaOpera[i].Nome + " " + singolaOpera[i].Cognome + "</td><td><b>Cod ID: </b>" + singolaOpera[i].Codice_fiscale + "</td><td><b>Keywords: </b>" + singolaOpera[i].Keywords_autore + "</td><td></td><td></td><td></td><td></td><td></td></tr>";
        tuple += autoreOpera;
        tabella += tuple;
    }

    document.getElementById("tabellaOpere").innerHTML += tabella;

}

const destroyHTMLTableOpera = function () {

    destroyLegendOpera();

    document.getElementById("tabellaOpere").innerHTML = "<div id='divTabellaOpere' style='overflow-x:auto;'><table id='tabellaOpere'><thead><tr><th>Titolo</th><th>Codice identificativo</th><th>Data ripresa</th><th>Data stampa</th><th>Stampatore</th><th>Committente</th><th>Tecnica di ripresa</th><th>Supporto</th><th>Artist's proof</th></tr></thead></table>";

}

const destroyLegendOpera = function () {

    document.getElementById("legendaOpera").style.display = "none";

}

const createLegendOpera = function () {

    document.getElementById("legendaOpera").style.display = "block";

}

const trackOpere = {
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
    $('#tabellaOpere').on('click', 'tr.breakrow', function () {
        $(this).nextUntil('tr.breakrow').slideToggle(200);
    });

});