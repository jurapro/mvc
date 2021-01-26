<?php

namespace Src;

class Model
{
    protected $table = '';
    protected $sql = null;

    public function __construct()
    {
        $arr = explode('\\', static::class);
        $this->table = strtolower(array_pop($arr));
        ['host' => $host, 'user' => $user, 'password' => $password, 'database' => $database] = Settings::get()->db;
        $this->sql = new \mysqli($host, $user, $password, $database);
    }

    public function all(): array
    {
        $query = "SELECT * FROM $this->table";
        $services = $this->sql->query($query);

        if ($services && $services->num_rows > 0) {
            return $services->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

}