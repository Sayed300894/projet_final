<?php

namespace App\Core;
// on importe PDO
use PDO;
use PDOException;

class Db  extends PDO
{
    // Instance unique de la class
    private static $instance;

    // Information de connection

    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'demo_poo';

    private function __construct()
    {
        // DSN de connexion
        $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST;

        // on appelle le constructeur de la class PDO

        try {
        parent::__construct($_dsn, self::DBUSER, self::DBPASS);

        $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch(PDOException $e) {
            die($e->getMessage());
        }

    }

    public static function getInstance():self
    {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}