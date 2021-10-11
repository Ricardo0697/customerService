<?php namespace model;

use PDO;
use services\Database;

class Address
{

    /** @var int */
    public $id;

    /** @var int */
    public $customerId;

    /** @var string */
    public $address;

    /**
     * Finds all Addresses for a particular Customer.
     *
     * @param  int  $id  The id# of the Customer to find Addresses for.
     * @return Address[] The addresses.
     */
    public static function findByCustomerId($id) {
        $pdo = Database::getInstance()->connect();
        $statement = $pdo->prepare('SELECT * FROM addresses WHERE customerId=:id');
        $statement->execute(['id' => $id]);

        return $statement->fetchAll(PDO::FETCH_CLASS, Address::class);
    }

}