<?php

include_once('./database.php');

$rows = [];

if ($result = $conn->query("SELECT * FROM canvas_img")) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        array_push($rows, $row);
    }

    /* free result set */
    $result->free();
}

/* close connection */
$conn->close();

echo json_encode($rows);

?>