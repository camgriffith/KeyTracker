<?php
if (isset($_POST['action']) && $_POST['action'] == 'execute_query') {
    // Database connection details (same as above)
    $servername = "localhost";
    $username = "cameron";
    $password = "M@rtyRock$";
    $dbname = "keytracker";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM key WHERE keyholders.firstName LIKE $_GET[student_name] JOIN key on key.assignedTo = keyholders.Id"; // Example query
    $result = $conn->query($sql);

    if ($result) {
        // Format results as needed for AJAX response
        $output = "Query executed successfully! <br>";
        if ($result->num_rows > 0) {
            
        } else {
            $output .= "0 results";
        }
        echo $output;
    } else {
        echo "Error executing query: " . $conn->error;
    }

    $conn->close();
}
?>
