<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client(
    'mongodb+srv://miguel:admin123456@cluster0.amgor.mongodb.net/precipitacion?retryWrites=true&w=majority');

//variables de entrada
$a=$GET['anno'];
$b=$GET['represa'];


// $tb=$client->MultimediaS->puntaje;
// $registro=array(
//     "iduser"=>"1458",
//     "fecha"=>"1/1/2023",
//     "puntaje"=>"321654"
// );

// $resultado=$tb->insertOne($registro);
// echo $resultado ->getInsertedCount();

$tb=$client->water->precipitacion;
$filter= ['$and'=>
            [
                ['ANNO'=>['$eq'=>'2018']],
                ['ESTACION'=>['$eq'=>'Tisquesusa']]
            ]
        ];
 
// $query = new MongoDB\Driver\Query($filter);
 
$rows = $tb->find($filter);
$datos= iterator_to_array($rows);
echo json_encode($datos);

?>