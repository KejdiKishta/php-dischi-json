<?php
// nella variable metto una stringa con il contenuto del file json
$disc_list = file_get_contents("dischi.json");
// var_dump($disc_list);

// codice per trasformare la JSON string in array
// $disc_list_to_array = json_decode($disc_list, true);
// var_dump($disc_list_to_array);

// e viceversa
// $disc_list_to_json = json_encode($disc_list_to_array);

header("Content-Type: application/json");

echo $disc_list;