<?php

class SQLManager {

    public const DATABASE_LETS_FREERUN = "lets_freerun";
    public const STATEMENT_DATA_FIND = 1;

    /** @var MySQLi $database */
    public static $database;

    /**
     * @param string $statement
     */
    public static function write_data(string $statement) : void {
        self::$database->query($statement);
    }

    /**
     * @param string $statement
     *
     * @return bool
     */
    public static function data_exist(string $statement) : bool {
        return self::$database->query($statement)->num_rows >= self::STATEMENT_DATA_FIND;
    }

    /**
     * @param string $statement
     *
     * @return array|bool
     */
    public static function get_data(string $statement){
        return self::$database->query($statement)->fetch_all(MYSQLI_ASSOC);
    }
}