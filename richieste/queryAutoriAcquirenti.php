<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'queries.php';
include '../dbConfig.php';

// PRENDO IL VALORE DEL COGNOME
$cognome = $_REQUEST["cognome"] . '%';
$nome = $_REQUEST["nome"] . '%';
$codFiscale = $_REQUEST["codFiscale"] . '%';
$tipologia = $_REQUEST["tipologia"];
$keywords = '%' . $_REQUEST["keywords"] . '%';

$sql = autoriAcquirenti($nome, $cognome, $codFiscale, $keywords, $tipologia);

if($stmt = mysqli_prepare($db, $sql)){

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_term);

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        
        // Check number of rows in the result set
        if(mysqli_num_rows($result) > 0){

            // CREO UN JSON E RITORNO IL JSON
            $rows=array(); 
            while($singleRow = mysqli_fetch_assoc($result)) { 
                if($keywords == '%%')
                    $rows[]=$singleRow;
                else if($keywords != '%%'){
                    echo "ciao";
                    $keywords = $singleRow['Keywords'];

                    $str_arr = explode (",", $keywords);

                    for($i = 0; $i < count($str_arr); $i++){
                        $str_arr[$i] = strtoupper(trim($str_arr[$i]));

                        if(strpos($str_arr[$i], strtoupper($_REQUEST["keywords"])) === 0){
                            $rows[]=$singleRow;
                            break;
                        }
                    }
                }
            }
            
            $json = json_encode($rows);

            $myJson = array("Dati_utente"=>$json);
            echo json_encode($myJson);

        } else{
            ;
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }

}

?>