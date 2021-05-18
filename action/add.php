<?php
include_once "../src/Queue.php";
$patient = new Queue();
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$name = $_REQUEST['name'];
$code = $_REQUEST['code'];
$id = $_REQUEST['id'];
$data =[
        'name' => $name,
        'code' => $code,
    'id' => $id,
];
$patient->push($data,'../data.json');
}

header("Location: ../index.php");

