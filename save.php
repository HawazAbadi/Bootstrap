<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'data.json';
    $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    $productName = $_POST['productName'];
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];
    $datetime = date('Y-m-d H:i:s');
    $total = $quantity * $price;

    $data[] = [
        'productName' => $productName,
        'quantity' => $quantity,
        'price' => $price,
        'datetime' => $datetime,
        'total' => $total
    ];

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    echo 'Saved';
}
?>
