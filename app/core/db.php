<?php

namespace mvc\core;

use PDO;
use PDOException;

class db
{
    private $connection;
    private $statement;
    private $table;
    function __construct()
    {
        $this->get_class_name();
        $this->connectionTODatabase();
    }
    private function get_class_name()
    {

        $this->table = substr(static::class, 11, -5);
    }
    private function connectionTODatabase()
    {
        try {
            $this->connection = new PDO(DNS, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "connection failed" . $e->getMessage();
            die();
        }
    }
    private function prepare($query)
    {
        $this->statement = $this->connection->prepare($query);
    }
    private function execute($data)
    {
        if ($this->statement->execute($data))
            return true;
        return false;
    }
    protected function insert($data)
    {
        $fields = '';
        $values = '';
        foreach ($data as $key => $value) {
            $fields .= "$key,";
            $values .= ":$key,";
        }
        $fields = substr($fields, 0, -1);
        $values = substr($values, 0, -1);
        $query = "INSERT INTO  $this->table ($fields) VALUES($values)";
        $this->prepare($query);
        return  $this->execute($data);
    }
    protected function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $data = ['id' => $id];
        $this->prepare($query);
        return  $this->execute($data);
    }
    protected function update($data, $id)
    {
        $sub_query = '';
        foreach ($data as $key => $value) {
            $sub_query .= "$key=:$key ,";
        }
        $sub_query = substr($sub_query, 0, -1);
        $query = "UPDATE $this->table SET $sub_query WHERE id=$id";
        $this->prepare($query);
        return   $this->execute($data);
    }
    protected function All($query)
    {
        $q = $this->connection->query($query);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
    protected function select_count()
    {
        $num = $this->connection->query("SELECT COUNT(*) FROM `$this->table`");
        return  $num->fetchColumn();
    }
    public function __destruct()
    {
    }
}
