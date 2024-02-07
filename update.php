<?php 
    include("dbcon.php");
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM todo WHERE id=$id";
    $result = $conn->query($sql);
    if(!$result) {
        die("Query failed");
    }
    $row = $result->fetch_assoc();
?>

<div>
    <div>
        <h1>Update Todo</h1>
    </div>

    <form action="update.php?id=<?php echo $id;?>" method="POST">
        <input type="hidden" value="<?php echo $id?>" name="id">
        <div>
            <label>Todo: <?php echo $row['todo'] ?></label>
        </div>
        <div>
            <label>Select Status</label>
            <select name="status">
                <option value="0">Pending</option>
                <option value="1">Completed</option>
            </select>
        </div>
        <div>
            <button type="submit" name="updateTodoBtn">Update Todo</button>
        </div>
    </form>

</div>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateTodoBtn'])) {
        $status = $_POST['status'];

        $sql_update = "UPDATE todo SET `status`=? WHERE `id`=?";
        $stmt_update = $conn->prepare($sql_update);
        
        $stmt_update->bind_param("ii", $status, $id);

        $stmt_update->execute();

        if($stmt_update->affected_rows > 0) {
            echo "Todo updated successfully";
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating todo: " . $conn->error;
        }
    }
?>
