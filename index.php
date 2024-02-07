<?php include("dbcon.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Todo Application</title>
</head>
<body>
    <div class="container">
        <div>
            <button><a href="create.php">Create Todo</a></button>
        </div>

        <div>
            <h3>My TodoList</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Todo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM todo";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                    ?>
                    
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['todo'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $row['id']?>">Update</a> |
                                        <a href="delete.php?id=<?php echo $row['id']?>">Delete</a>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    
</body>
</html>