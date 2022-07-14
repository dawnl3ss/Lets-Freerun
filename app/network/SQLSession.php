<?php

class SQLSession {

    public const DATABASE_LETS_FREERUN = "lets_freerun";
    public const STATEMENT_DATA_FIND = 1;

    /** @var string $table */
    private $table;

    /** @var PDO $session */
    private $session;

    public function __construct(){
        $this->session = new \PDO("mysql:dbname=" . self::DATABASE_LETS_FREERUN . ";host=127.0.0.1", "root", "root");
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function table(string $name) : SQLSession {
        $this->table = $name;
        return $this;
    }

    /**
     * Contre le SQL Injection
     *
     * @param array $table_index
     *
     * @param array $bind_values
     *
     * @return $this
     */
    public function insert(array $table_index, array $bind_values) : self {
        $bind_params = [];
        foreach ($table_index as $data) array_push($bind_params, ":" . $data);
        $statement = $this->session->prepare("INSERT INTO {$this->table} (" . implode(", ", $table_index) . ") VALUES (" . implode(", ", $bind_params) . ")");

        for ($i = 0; $i <= count($bind_params) - 1; $i++) {
            $statement->bindParam($bind_params[$i], $bind_values[$i]);
        }
        $statement->execute();
        return $this;
    }

    /**
     * Contre le SQL Injection
     *
     * @param array $table_index
     *
     * @param array $bind_values
     *
     * @param bool $all
     *
     * @return array|false
     */
    public function get(array $table_index, array $bind_values, bool $all = false){
        if (!$all){
            $list = [];

            for ($i = 0; $i <= count($table_index) - 1; $i++){
                array_push($list, implode(" = ", [$table_index[$i], ":" . $table_index[$i]]));
            }
            $statement = $this->session->prepare("SELECT * FROM {$this->table} WHERE " . implode(" AND ", $list));

            for ($j = 0; $j <= count($table_index) - 1; $j++) {
                $statement->bindParam(":" . $table_index[$j], $bind_values[$j]);
            }
        } else $statement = $this->session->prepare("SELECT * FROM {$this->table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Contre le SQL Injection
     *
     * @param array $table_index
     *
     * @param array $bind_params
     *
     * @param array $bind_values
     *
     * @return bool
     */
    public function exist(array $table_index, array $bind_values) : bool {
        $list = [];

        for ($i = 0; $i <= count($table_index) - 1; $i++){
            array_push($list, implode(" = ", [$table_index[$i], ":" . $table_index[$i]]));
        }
        $statement = $this->session->prepare("SELECT * FROM {$this->table} WHERE " . implode(" AND ", $list));

        for ($j = 0; $j <= count($table_index) - 1; $j++) {
            $statement->bindParam(":" . $table_index[$j], $bind_values[$j]);
        }
        $statement->execute();
        return $statement->rowCount() >= self::STATEMENT_DATA_FIND;
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
    public function delete(string $index, string $value) : self {
        $prepare = $this->session->prepare("DELETE FROM {$this->table} WHERE {$index} = :foo");
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

    public function __destruct(){
        unset($this->session);
    }
}