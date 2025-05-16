<?php
$file = 'data.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if (empty($data)) {
    echo "<p>No products found.</p>";
    exit;
}

echo '<table class="table table-bordered">';
echo '<thead><tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Date/Time</th><th>Total</th></tr></thead><tbody>';

$grandTotal = 0;
foreach ($data as $row) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['productName']) . '</td>';
    echo '<td>' . $row['quantity'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '<td>' . $row['datetime'] . '</td>';
    echo '<td>' . $row['total'] . '</td>';
    echo '</tr>';
    $grandTotal += $row['total'];
}

echo '<tr><td colspan="4"><strong>Sum Total</strong></td><td><strong>' . $grandTotal . '</strong></td></tr>';
echo '</tbody></table>';
?>
