<?php
namespace Model;

use \PDO;
use \Framework\Database;

class Order
{
    const GET_ALL = 'SELECT * FROM orders ORDER BY id';
    const DELETE_FIRST = 'DELETE FROM orders ORDER BY id LIMIT 1';
    const INSERT = 'INSERT INTO orders(client, pizza_flavor, pizza_size) VALUES (?, ?, ?)';
    private $client;
    private $pizzaSize;
    private $pizzaFlavor;

    public function __construct(
        $client,
        $pizzaSize,
        $pizzaFlavor
    ) {
        $this->client = $client;
        $this->pizzaSize = $pizzaSize;
        $this->pizzaFlavor = $pizzaFlavor;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getPizzaSize()
    {
        return $this->pizzaSize;
    }

    public function getPizzaFlavor()
    {
        return $this->pizzaFlavor;
    }

    public function save()
    {
        $command = Database::prepare(self::INSERT);
        $command->bindParam(1, $this->client, PDO::PARAM_STR, 255);
        $command->bindParam(2, $this->pizzaFlavor, PDO::PARAM_STR, 255);
        $command->bindParam(3, $this->pizzaSize, PDO::PARAM_STR, 255);
        $command->execute();
    }

    public static function all()
    {
        $ordersRecords = Database::query(self::GET_ALL);
        $orders = [];
        foreach ($ordersRecords as $record) {
            $orders[] = new Order(
                $record['client'],
                $record['pizza_size'],
                $record['pizza_flavor']
            );
        }
        return $orders;
    }

    public static function destroyFirst()
    {
        Database::exec(self::DELETE_FIRST);
    }
}
