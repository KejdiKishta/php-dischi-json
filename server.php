<?php
// nella variable metto una stringa con il contenuto del file JSON
$disc_list = file_get_contents("dischi.json");
// var_dump($disc_list);

// codice per trasformare la JSON string in array
$disc_list_to_array = json_decode($disc_list, true);
// var_dump($disc_list_to_array);

// strutturiamo il nostro array associativo
$response = [
    "result" => $disc_list_to_array,
    "success" => true,
];

// codice per trasformare la array string in JSON
$response_to_json = json_encode($response);

// facciamo leggere il file come json
header("Content-Type: application/json");

echo $response_to_json;