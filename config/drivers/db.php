<?php

class DB {
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $databaseFile = __DIR__ . '/database.sqlite';
        $this->pdo = new PDO("sqlite:$databaseFile");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, $params = []) {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public function getLastInsertId() {
        return $this->pdo->lastInsertId();
    }
}
