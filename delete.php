<?php
    include("dbcon.php");

    $id = $_GET['id'];

    $sql_delete = "DELETE FROM todo WHERE id=?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id);
    $stmt_delete->execute();

    if($stmt_delete->affected_rows > 0) {
        echo "Todo deleted successfully";
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting todo: " . $conn->error;
    }

?>