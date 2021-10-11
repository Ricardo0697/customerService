<?php namespace model;

use PDO;
use services\Database;

class Customer
{
    /** @var int */
    public $id;

    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var string */
    public $phone;

    /**
     * Returns all Customers in the database.
     *
     * @return Customer[]
     */
    public static function findAll() {
        $pdo = Database::getInstance()->connect();

        $statement = $pdo->query('SELECT * FROM customers');

        return $statement->fetchAll(PDO::FETCH_CLASS, Customer::class);
    }

    /**
     * Returns all Addresses for this Customer.
     *
     * @return Address[]
     */
    public function addresses() {
        if (!$this->id) {
            return [];
        }

        return Address::findByCustomerId($this->id);
    }

}
