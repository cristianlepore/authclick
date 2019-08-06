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

    // Prepare a select statement
    $sql = "SELECT DISTINCT `File`.`Tipologia` FROM `File` INNER JOIN `Fotografia` ON `File`.`Fotografia_id`= `Fotografia`.`id` WHERE `Fotografia`.`Codice_identificativo` = '$codIdentificativo' ";
   
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
                // STAMPO LA RIGA DEI FILE CARICATI
                echo "<div class='w3-center w3-col m4'><b> Documenti caricati: </b></div>";

                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $tipologia = $row["Tipologia"];

                    // SE NON CI SONO DOCUMENTI CARICATI LO STAMPO A VIDEO


                    // FACCIO LE VARIE CASISTICHE
                    if($tipologia == "Contratto")
                        $tipologia = "";
                    
                    if($tipologia != ""){
                        // SE IL NOME COMPARE DUE VOLTE, LO PROPONGO UNA VOLTA SOLTANTO
                        echo "<div class='w3-center w3-col m2' style='color:red'><b> [ " . $tipologia . " ] </b></div>";
                    }
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