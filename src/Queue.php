<?php
include_once "Patient.php";

class Queue

{
    public array $stack;
    public int $limit;

    public function __construct($limit = 10)
    {
        $this->stack = [];
        $this->limit = $limit;
    }

    public function push($data, $filePath)
    {
        $patient = new Patient($data);
        $data1 = $this->getFilefromJson($filePath);

        if (count($data1) < $this->limit) {
            array_push($data1, $patient);
            $this->savetoJson($data1, $filePath);
        } else {
            echo '<script> alert("Welcome to Geeks for Geeks")</script>';
        }
    }

    function getAll($filePath): array
    {
        $data = $this->getFilefromJson($filePath);
        $users = [];
        foreach ($data as $item) {
            $user = new Patient((array)$item);
            $users[] = $user;
        }
        return $users;
    }

    public function savetoJson($data, $filePath)
    {
        $dataJson = json_encode($data);
        file_put_contents($filePath, $dataJson);
    }

    public function getFilefromJson($filePath)
    {
        $dataJson = file_get_contents($filePath);
        return json_decode($dataJson);
    }

    public function pop($filePath)
    {
        $data1 = $this->getFilefromJson($filePath);
        array_shift($data1);
        $this->savetoJson($data1, $filePath);
    }

    public function top()
    {
        return end($this->stack);
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }

    public function showStack()
    {
        echo implode('-', $this->stack);
    }



}