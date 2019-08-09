<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'dbConfig.php';
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
    $codIdentificativo = $_REQUEST["code"];
    $codFiscale = $_REQUEST["codeFiscale"];

    // SELEZIONO ID UTENTE CHE HA QUEL CODICE FISCALE. QUESTO VALE SOLO SE L'UTENTE È GIÀ PRESENTE NEL DATABASE.
    $result = $db->query( " SELECT `id` FROM `Utente` WHERE `Codice_fiscale`='$codFiscale' AND `Codice_fiscale`='$codFiscale' " );

    // SE C'È GIÀ UN UTENTE CON QUEL CODICE IDENTIFICATIVO AL SISTEMA, GUARDO I FILE DEL CONTRATTO AD ESSO ASSOCIATI
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $userID = $row['id'];

        // ESTRAGGO DALLA TABELLA FILE IL NOME PER L'UTENTE (SOLO SE È GIÀ REGISTRATO AL DATABASE CON UN CONTRATTO CARICATO)
        $sql = "SELECT DISTINCT `File`.`Nome` FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id` = `Fotografia`.`id` WHERE `Fotografia`.`Codice_identificativo` = '$codIdentificativo' AND `File`.`Tipologia`='Contratto' AND `File`.`Utente_id`= $userID AND Nome LIKE ? ";

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

                    $fileName = $row["Nome"];

                    echo "<p>" . $fileName . "</p>";
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