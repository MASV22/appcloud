<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client(
    'mongodb+srv://miguel:admin12345@cluster0.amgor.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');

//variables de entrada
$a=$GET['anno'];
$b=$GET['represa'];
$tb=$client->precipitacion->precipitaciones;


// $tb=$client->MultimediaS->puntaje;
// $registro=array(
//     "iduser"=>"1458",
//     "fecha"=>"1/1/2023",
//     "puntaje"=>"321654"
// );

// $resultado=$tb->insertOne($registro);
// echo $resultado ->getInsertedCount();


$filter= ['$and'=>
            [
                ['ANNO'=>['$eq'=>'1995']],
                ['ESTACION'=>['$eq'=>'Pajas Blancas']]
            ]
        ];
 
$query = new MongoDB\Driver\Query($filter);
 
$rows = $tb->find($filter);
$datos= iterator_to_array($rows);
echo json_encode($datos);

?>