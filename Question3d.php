<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve IC Number from form
    $ic_number = $_POST["ic_number"];

    // Validate IC Number (assuming the IC number has a specific format)
    if (preg_match("/^\d{6}-\d{2}-\d{4}$/", $ic_number)) {
        // Extract information
        $dob = substr($ic_number, 0, 6);
        $gender = ($ic_number[6] % 2 == 0) ? "Female" : "Male";
        $place_of_birth = ($ic_number[11] == 0) ? "Overseas" : "Malaysia";

        // Database connection parameters
        $host = "localhost";
        $dbname = "db_MY";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL statement to insert data into MyData table
        $sql = "INSERT INTO MyData (ic_number, date_of_birth, gender, place_of_birth) 
                VALUES ('$ic_number', '$dob', '$gender', '$place_of_birth')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Data saved successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Invalid Malaysian IC Number";
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: ic_input_form.php");
    exit();
}
?>
