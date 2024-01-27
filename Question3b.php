<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve IC Number from form
    $ic_number = $_POST["ic_number"];

    // Validate IC Number (assuming the IC number has a specific format)
    if (preg_match("/^\d{6}-\d{2}-\d{4}$/", $ic_number)) {
        echo "Valid Malaysian IC Number: $ic_number";
    } else {
        echo "Invalid Malaysian IC Number";
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: ic_input_form.php");
    exit();
}
?>
