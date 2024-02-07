<?php include("dbcon.php") ?>

<div>
    <div>
        <h1>Create Todo</h1>
    </div>

    <form action="create.php" method="POST">
        <div>
            <label>Enter Todo</label>
            <input type="text" name="todo"> 
        </div>
        <div>
            <button type="submit" name="createTodoBtn">Create Todo</button>
        </div>
    </form>

</div>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['createTodoBtn'])) {
        $todo = $_POST['todo'];
        $sql = "INSERT INTO todo (todo) VALUES('$todo')";
        $result = $conn->query($sql);
        if(!$result)
        {
            echo "Error" . $conn->error;
        }

        echo "Todo created successfully";
        header("Location: index.php");
    }

?>