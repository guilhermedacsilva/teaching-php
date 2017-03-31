<!DOCTYPE html>
<html>
<head>
    <title>Pizza Delivery</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
</head>
<body>
    <div class="center-block site">
        <h1 class="text-center">List of orders</h1>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th>Client</th>
                    <th>Pizza size</th>
                    <th>Pizza flavor</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($orders)) : ?>
                    <tr>
                        <td colspan="3" class="text-center">No orders!</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $order->getClient() ?></td>
                            <td><?= $order->getPizzaSize() ?></td>
                            <td><?= $order->getPizzaFlavor() ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
        <?php if (!empty($orders)) : ?>
            <form method="POST">
                <button type="submit" class="btn btn-danger">Remove first</button>
            </form>
        <?php endif ?>
    </div>
</body>
</html>
