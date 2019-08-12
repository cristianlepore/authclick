<?php

// SE L'INSERIMENTO DEL PROPRIETARIO È AVVENUTO CORRETTAMENTE, PREPARO I DATI PER L'INSERIMENTO SULLA BLOCKCHAIN
if( $resultArray['response']=="OK" && ( $resultArrayTrasferimenti[0]=="OK" || resultArrayCessioneDiritti[0]=="OK") ){
  // DEFINISCO IL VENDITORE E L'ACQUIRENTE
  $result = $db->query("SELECT `Utente_id` FROM `Possiede` WHERE `Fotografia_id`='$fotografia_id'");
  $row = mysqli_fetch_row($result);
  $venditore_id = $row[0];
  
  // PRENDO I DATI RILEVANTI DA INSERIRE SULLA BLOCKCHAIN E LI METTO IN FORMATO JSON
  $result = $db->query("SELECT `id`,`Clausole_contratto`,`Tipologia`,`Prezzo`,`Data_cessione`,`Fine_cessione`,`id_venditore`,`id_acquirente`,`Fotografia_id` FROM `Trasferimento` WHERE `id_venditore`='$venditore_id' AND `id_acquirente`='$acquirente_id' AND `Fotografia_id`=$fotografia_id ");
  while($row = mysqli_fetch_array($result)){
      $myObj->id_trasferimento = $row[0];
      $myObj->clausoleContratto = $row[1];
      $myObj->tipologia = $row[2];
      $myObj->prezzo = $row[3];
      $myObj->dataCessione = $row[4];
      $myObj->fineCessione = $row[5];
      $myObj->venditore_Id = $row[6];
      $myObj->acquirente_Id = $row[7];
      $myObj->fotografia_Id = $row[8];

      $myJSON = json_encode($myObj);
   }

   // RICHIAMO LA FUNZIONE PER PROCESSARE I DATI E PREPARALI ALL'INVIO SU BLOCKCHAIN
   $outHash = prepareStringForBlockchain($myJSON);

   // PREPARAZIONE DEI MESSAGGI DA STAMPARE A VIDEO
   $statusBlockchain = "OK";
   $statusMsgBlockchain = $myJSON;

} else {
  $statusBlockchain = "FAIL";
  $statusMsgBlockchain = "<i class='fa fa-warning'></i><b style='color:red;'> ATTENZIONE!</b><b> Non è stato possibile preparare i dati per l'inserimento su blockchain.</b>";
}

?>