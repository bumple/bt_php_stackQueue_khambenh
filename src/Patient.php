<?php

class Patient
{
    public string $code;
    public string $name;
    public int $id;
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->code = $data['code'];
        $this->id = $data['id'];
    }

    /**
     * @return mixed|string
     */
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getCode(): mixed
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

}