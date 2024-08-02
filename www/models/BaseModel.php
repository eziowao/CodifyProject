<?php

require_once __DIR__ . './../models/Database.php';

class BaseModel
{

    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // public function getLastRecordId(): int
    // {
    //     return $this->db->lastInsertId();
    // }
    // servait pour le booking 

    /**
     * Get the value of db
     */
    public function getDb(): PDO
    {
        return $this->db;
    }
}
