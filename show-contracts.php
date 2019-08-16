<?php

include 'dbConfig.php';
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    // PRENDO IL VALORE DEL CODICE IDENTIFICATIVO CHE GLI HO PASSATO
    $codiceIdentificativo = $_REQUEST["code"];

    // QUERY PER PRENDERE I CONTRATTI CARICATI CON QUEL CODICE IDENTIFICATIVO
    $result = $db->query("  SELECT `F`.`id`, `F`.`Nome`, `Trasferimento`.`Tipologia`, `Trasferimento`.`Data_cessione`, `Trasferimento`.`Fine_cessione`, `Utente`.`Nome` AS `Nome_proprietario`, `Utente`.`Cognome` AS `Cognome_proprietario`, `F`.`Path`
                            FROM `File` `F` 
                                INNER JOIN `Fotografia` ON `Fotografia`.`id` = `F`.`Fotografia_id`
                                INNER JOIN `Trasferimento` ON `F`.`Utente_id` = `Trasferimento`.`id_acquirente`
                                INNER JOIN `Utente` ON `Trasferimento`.`id_acquirente` = `Utente`.`id`
                            WHERE `Fotografia`.`Codice_identificativo`='$codiceIdentificativo' AND `F`.`Tipologia`='Contratto'  
                            ORDER BY `F`.`id`;
                        ");

    // CREO UN JSON E RITORNO IL JSON
    $rows=array(); 
    while($singleRow = mysqli_fetch_assoc($result)) { 
        $rows[]=$singleRow;
    }
    
    $json = json_encode($rows);
    
    $JSON_to_send = array("contratto"=>$json);
    echo json_encode($JSON_to_send);

}

// close connection
mysqli_close($db);
?>