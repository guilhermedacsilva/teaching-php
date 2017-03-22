<!DOCTYPE html>
<html>
<head>
    <title>Pizza Delivery</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'general.css' ?>">
</head>
<body>
    <div class="center-block site">
        <h1 class="text-center">Order now</h1>
        <form method="post">
            <div class="form-group">
                <label for="clientName">Client name</label>
                <input id="clientName" name="clientName" class="form-control" autofocus>
            </div>
            <div class="form-group">
                <label for="pizzaSize">Pizza size</label>
                <select id="pizzaSize" name="pizzaSize" class="form-control">
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pizzaFlavor">Pizza flavor</label>
                <select id="pizzaFlavor" name="pizzaFlavor" class="form-control">
                    <option value="mozzarella">Mozzarella</option>
                    <option value="pepperoni">Pepperoni</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Finish</button>
        </form>
    </div>
</body>
</html>
