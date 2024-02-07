<?php
    include("dbcon.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM todo WHERE id=$id";
    $result = $conn->query($sql);
    if(!$result) {
        echo "Error: " . $conn->error;
    } else {
        echo "Todo deleted successfully";
        header("Location: index.php");
    }

?>