<?php

namespace SecTheater\Database\Managers;

use SecTheater\Database\Managers\Contracts\DatabaseManager;

class MySQLManager implements DatabaseManager
{
    protected static $instance;

    public function connect(): \PDO
    {
        if (!self::$instance) {
            self::$instance = new \PDO(env('DB_DRIVER') . ":host=" . env("DB_HOST") . ";dbname=" . env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'));
        }

        return self::$instance;
    }

    public function raw(string $query)
    {
        throw new \Exception('Method raw() is not implemented.');
    }

    public function query(string $query)
    {
        $stmt = self::$instance->prepare($query);
        var_dump($stmt->execute());
    }

    public function create(mixed $data)
    {
        $fields = array_keys($data);
        $values = array_values($data);

        dump($fields, $values);
    }

    public function read(int|string $filter)
    {
        throw new \Exception('Method read() is not implemented.');
    }

    public function update(int|string $clause, mixed $data)
    {
        throw new \Exception('Method update() is not implemented.');
    }

    public function delete(int|string $clause)
    {
        throw new \Exception('Method delete() is not implemented.');
    }
}