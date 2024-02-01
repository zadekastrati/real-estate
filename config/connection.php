<?php

class Connection 
{
    public $connection = null;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'real_estate';

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }
}
