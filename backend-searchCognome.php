<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'dbConfig.php';
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
    // PRENDO IL VALORE DEL NOME
    $nome = $_REQUEST["nome"] . '%';
    $codFiscale = $_REQUEST["codFiscale"] . '%';
    $luogoNascita = $_REQUEST["luogoNascita"] . '%';
    $tipologia = $_REQUEST["tipologia"];

    if($tipologia == "Tutti"){
        if($codFiscale == '%' && $luogoNascita == '%')
            $sql = "SELECT DISTINCT `Cognome` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE ? ";
        else if($codFiscale != '%' && $luogoNascita == '%')
            $sql = "SELECT DISTINCT `Cognome` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE ? AND Codice_fiscale LIKE '$codFiscale' ";
        else if($codFiscale == '%' && $luogoNascita != '%')
            $sql = "SELECT DISTINCT `Cognome` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE ? AND Luogo_nascita LIKE '$luogoNascita' ";
        else
            $sql = "SELECT DISTINCT `Cognome` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE ? AND Codice_fiscale LIKE '$codFiscale' AND Luogo_nascita LIKE '$luogoNascita' ";
    } else {
        if($codFiscale == '%' && $luogoNascita == '%')
            $sql = "SELECT DISTINCT `Cognome` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE ? AND Tipologia = '$tipologia' ";
        else if($codFiscale != '%' && $luogoNascita == '%')
            $sql = "SELECT DISTINCT `Cognome` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE ? AND Codice_fiscale LIKE '$codFiscale' AND Tipologia = '$tipologia' ";
        else if($codFiscale == '%' && $luogoNascita != '%')
            $sql = "SELECT DISTINCT `Cognome` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE ? AND Luogo_nascita LIKE '$luogoNascita' AND Tipologia = '$tipologia' ";
        else
            $sql = "SELECT DISTINCT `Cognome` FROM `Utente` WHERE Nome LIKE '$nome' AND Cognome LIKE ? AND Codice_fiscale LIKE '$codFiscale' AND Luogo_nascita LIKE '$luogoNascita' AND Tipologia = '$tipologia' ";
    }

    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    // SE IL NOME COMPARE DUE VOLTE, LO PROPONGO UNA VOLTA SOLTANTO
                    echo "<p>" . $row["Cognome"] . "</p>";
                }
            } else{
                ;
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($db);
?>