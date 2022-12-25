<?php
include "setting.php";

$sql = "SELECT * FROM vente ";

$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $sumTotal = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['vente_id'];
        $name = $row['nom'];
        $quantity = $row['quantity'];
        $total = $row['total'];
        $client = $row['client'];
        $sumTotal = $total + $sumTotal;
        echo ' <tr class="text-center">
        <td>' . $name . '</td>
        <td>' . $quantity . '</td>
        <td>' . $total . '</td>
        <td>' . $id . '</td>
        <td>' . $client . '</td>
    </tr>';
    }
}
