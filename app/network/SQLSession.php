<?php

class SQLSession {

    public const DATABASE_LETS_FREERUN = "lets_freerun";
    public const STATEMENT_DATA_FIND = 1;

    /** @var PDO $session */
    private $session;

    public function __construct(){
        $this->session = new \PDO("mysql:dbname=" . self::DATABASE_LETS_FREERUN . ";host=127.0.0.1", "root", "root");
    }

    /**
     * Contre le SQL injection
     *
     * @param string $table
     *
     * @param array $table_index
     *
     * @param array $table_values
     *
     * @return $this
     */
    public function insert(string $table, array $bind_params, string $table_index, array $table_values) : self {
        $statement = $this->session->prepare("INSERT INTO {$table} (" . $table_index . ") VALUES (" . implode(", ", $bind_params) . ")");

        for ($i = 0; $i <= count($bind_params) - 1; $i++) {
            $statement->bindParam($bind_params[$i], $table_values[$i]);
        }
        $statement->execute();
        return $this;
    }

    /**
     * Ne contre pas le SQL injection
     *
     * @param string $statement
     *
     * @return bool
     */
    public function exist(string $statement) : bool {
        return $this->session->exec($statement) >= self::STATEMENT_DATA_FIND;
    }

    /**
     * Ne contre pas le SQL injection
     *
     * @param string $statement
     *
     * @return array
     */
    public function get(string $statement){
        $prepare = $this->session->prepare($statement);
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Contre le SQL injection
     *
     * @param string $table
     *
     * @param string $index
     *
     * @param string $value
     *
     * @return $this
     */
    public function delete(string $table, string $index, string $value) : self {
        $prepare = $this->session->prepare("DELETE FROM {$table} WHERE {$index} = :foo");
        $prepare->bindParam(":foo", $value);
        $prepare->execute();
        return $this;
    }

    /**
     * Ne contre pas le SQL injection
     *
     * @param string $statement
     *
     * @return $this
     */
    public function update(string $statement) : self {
        $this->session->exec($statement);
        return $this;
    }

    /**
     * @return void
     */
    public function close() : void {
        $this->__destruct();
    }

    public function __destruct(){
        $this->session = null;
    }
}