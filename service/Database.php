<?php

namespace services;

use PDO;

/**
 * Manages connections to the DBMS.
 */
class Database
{
    /** @var Database */
    protected static $instance;

    /** @var string The user to connect to the database as */
    protected $username;

    /** @var string The password to connect to the database with */
    protected $password;

    /** @var string The host name or IP address of the DBMS */
    protected $host;

    /** @var string The name of the database to connect to */
    protected $database;

    /**
     * Database constructor.
     */
    protected function __construct()
    {
        $config = require __DIR__.'/../config/database.php';

        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->host = $config['host'];
        $this->database = $config['database'];
    }

    /**
     * Provides one and only one instance of this class.
     *
     * Subsequent calls to this method will return the same instance.
     *
     * @return Database
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Creates a new database connection.
     *
     * @return PDO the new database connection
     */
    public function connect()
    {
        $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
