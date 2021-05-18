<?php
include_once "../src/Queue.php";
include_once "../src/Patient.php";
$patient = new Queue();
$users = $patient->getAll('../data.json');
$newUsers = [];
$doneusers = $patient->getAll('../data1.json');
foreach ($users as $key => $item) {
    $newUsers[$item->getCode() . $key] = $item;
}
ksort($newUsers);

array_push($doneusers,current($newUsers));
echo "<pre>";
var_dump($doneusers);
echo "<hr>";
var_dump($users);

//header("Location: ../index.php");
