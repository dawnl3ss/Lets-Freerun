<?php

class SQLSession {

    public const DATABASE_LETS_FREERUN = "lets_freerun";
    public const STATEMENT_DATA_FIND = 1;

    /** @var mysqli $session */
    private $session;

    public function __construct(){
        $this->session = new \MySQLi("p:127.0.0.1", "root", "root", self::DATABASE_LETS_FREERUN);
    }

    /**
     * @param string $statement
     */
    public function write(string $statement) : self {
        $this->session->query($statement);
        return $this;
    }

    /**
     * @param string $statement
     *
     * @return array
     */
    public function get(string $statement){
        return $this->session->query($statement)->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param string $statement
     *
     * @return bool
     */
    public function exist(string $statement) : bool {
        return $this->session->query($statement)->num_rows >= self::STATEMENT_DATA_FIND;
    }
}