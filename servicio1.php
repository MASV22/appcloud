<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client(
    'mongodb+srv://miguel:admin123456@cluster0.amgor.mongodb.net/MultimediaS?retryWrites=true&w=majority');

// $tb=$client->MultimediaS->puntaje;
// $registro=array(
//     "iduser"=>"1458",
//     "fecha"=>"1/1/2023",
//     "puntaje"=>"321654"
// );

// $resultado=$tb->insertOne($registro);
// echo $resultado ->getInsertedCount();

$tb=$client->water->Precipitaciones;
$filter= ['$and'=>
            [
                ['ANNO'=>['$eq'=>'1997']],
                ['ESTACION'=>['$eq'=>'Sutatausa']]
            ]
        ];
 
// $query = new MongoDB\Driver\Query($filter);
 
$rows = $tb->find($filter);
$datos= iterator_to_array($rows);
echo json_encode($datos);

?>