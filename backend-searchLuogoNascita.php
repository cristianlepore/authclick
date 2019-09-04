<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'dbConfig.php';
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["luogoNascita"])){
    // PRENDO IL VALORE DEL COGNOME
    $nome = $_REQUEST["nome"] . '%';
    $cognome = $_REQUEST["cognome"] . '%';
    $codFiscale = $_REQUEST["codFiscale"] . '%';

    if($codFiscale == '%')
        $sql = " SELECT DISTINCT `Luogo_nascita` FROM `Utente` WHERE Luogo_nascita LIKE ? AND Cognome LIKE '$cognome' AND Nome LIKE '$nome' ";
    else
        $sql = " SELECT DISTINCT `Luogo_nascita` FROM `Utente` WHERE Luogo_nascita LIKE ? AND Cognome LIKE '$cognome' AND Nome LIKE '$nome' AND Codice_fiscale LIKE '$codFiscale'";


    if($stmt = mysqli_prepare($db, $sql)){

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = $_REQUEST["luogoNascita"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    // SE IL NOME COMPARE DUE VOLTE, LO PROPONGO UNA VOLTA SOLTANTO
                    echo "<p>" . $row["Luogo_nascita"] . "</p>";
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