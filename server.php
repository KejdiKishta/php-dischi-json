<?php
// 1. Aggiungete ad ogni disco la chiave "like" con valore booleano che rappresenta se l'utente ha aggiunto il disco ai preferiti.
// Al click sul bottone per ogni disco fare una chiamata api che cambia il valore del like nel file json e invia l'array di dischi aggiornati da stampare in pagina.
// 2. Permettere all'utente di selezionare se visualizzare tutti i dischi o solo quelli preferiti. Il filtro deve essere applicato lato server. Quindi il client invia la richiesta al server con il valore del filtro, il server prepara l'array di dischi in base al filtro e lo invia al client.

// nella variable metto una stringa con il contenuto del file JSON
$disc_list = file_get_contents("dischi.json");
// var_dump($disc_list);

// codice per trasformare la JSON string in array
$disc_list_to_array = json_decode($disc_list, true);
// var_dump($disc_list_to_array);

if (isset($_POST["action"]) && $_POST["action"] === "toggle-like") {
    $index = $_POST["like_index"];
    $disc_list_to_array[$index]["like"] = !$disc_list_to_array[$index]["like"];
    file_put_contents("dischi.json", json_encode($disc_list_to_array));
}

// codice per trasformare la array string in JSON
$response_to_json = json_encode($disc_list_to_array);

// facciamo leggere il file come json
header("Content-Type: application/json");

echo $response_to_json;