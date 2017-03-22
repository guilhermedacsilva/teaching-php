<?php
namespace Model;

class Order
{
    const DATA_FILE = APPLICATION_ROOT . 'Database/data.txt';
    private $clientName;
    private $pizzaSize;
    private $pizzaFlavor;

    public function __construct(
        $clientName,
        $pizzaSize,
        $pizzaFlavor
    ) {
        $this->clientName = $clientName;
        $this->pizzaSize = $pizzaSize;
        $this->pizzaFlavor = $pizzaFlavor;
    }

    public function getClientName()
    {
        return $this->clientName;
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
        $data = self::all();
        $data[] = $this;
        self::saveData($data);
    }

    public static function all()
    {
        $ordersString = file_get_contents(self::DATA_FILE);
        $orders = unserialize($ordersString);
        return $orders;
    }

    public static function destroy()
    {
        $data = self::all();
        array_shift($data);
        self::saveData($data);
    }

    private static function saveData($data)
    {
        $dataString = serialize($data);
        file_put_contents(self::DATA_FILE, $dataString);
    }

    public static function createFile()
    {
        if (!file_exists(self::DATA_FILE)) {
            $emptyArrayString = serialize([]);
            file_put_contents(self::DATA_FILE, $emptyArrayString);
        }
    }
}
