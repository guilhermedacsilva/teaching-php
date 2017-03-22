<?php
namespace Controller;

use \Model\Order;

class OrderController
{
    public function index()
    {
        $orders = Order::all();
        require APPLICATION_VIEW . 'index.php';
    }

    public function create()
    {
        require APPLICATION_VIEW . 'create.php';
    }

    public function store()
    {
        $order = new Order(
            $_POST['clientName'],
            $_POST['pizzaSize'],
            $_POST['pizzaFlavor']
        );
        $order->save();
        require APPLICATION_VIEW . 'thanks.php';
    }

    public function destroy()
    {
        Order::destroy();
        header('Location: ' . URL_ROOT . 'pizza');
        exit;
    }
}
