<?php include("dbcon.php") ?>

<div>
    <div>
        <h1>Create Todo</h1>
    </div>

    <form action="create.php" method="POST">
        <div>
            <label>Enter Todo</label>
            <input type="text" name="todo" required> 
        </div>
        <div>
            <button type="submit" name="createTodoBtn">Create Todo</button>
        </div>
    </form>

</div>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['createTodoBtn'])) {
        $todo = $_POST['todo'];

        $sql_insert = "INSERT INTO todo (todo) VALUES(?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("s", $todo);
        $stmt_insert->execute();
        
        if($stmt_insert->affected_rows > 0)
        {
            echo "Todo created successfully";
            header("Location: index.php");
            exit();
        } else {
            echo "Error" . $conn->error;
        }

    }

?>