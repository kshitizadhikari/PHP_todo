
<?php 
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "todo");

    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if(!$conn)
    {
        die("Connection failed.");
    } 

    echo "connection successful\n";

?>
