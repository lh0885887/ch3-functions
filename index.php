<?php
declare(strict_types = 1);

$games = [
    'Minecraft' => ['price' => 19, 'stock' => 54],
    'Call of Duty' => ['price' => 73, 'stock' => 231],
    'Hollow Knight' => ['price' => 22, 'stock' => 82],
    'Borderlands 4' => ['price' => 57, 'stock' => 117],
];
$tax = 20;

function get_reorder_message(int $stock): string
{
    return ($stock < 75) ? 'Yes' : 'No';
}

function get_total_value(float $price, int $quantity): float
{
    return $price * $quantity;
}

function get_tax_due(float $price, int $quantity, int $tax = 0): float
{
    return ($price * $quantity) * ($tax / 100);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chapter 3 - Functions</title>
</head>
<body>

    <h1>The Game Shop</h1>
    <h2>Stock Control</h2>

    <table>
        <tr>
            <th>PRODUCT</th><th>STOCK</th><th>RE-ORDER</th><th>TOTAL VALUE</th><th>TAX DUE</th>
        </tr>
        <?php foreach ($games as $name => $data) { ?>
        <tr>
            <td><?= $name ?></td>
            <td><?= $data['stock'] . ' units' ?></td>
            <td><?= get_reorder_message($data['stock']) ?></td>
            <td><?= '$' . number_format(get_total_value($data['price'], $data['stock']), 0)?></td>
            <td><?= '$' . number_format(get_tax_due($data['price'], $data['stock'], $tax), 2) ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>