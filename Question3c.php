<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve IC Number from form
    $ic_number = $_POST["ic_number"];

    // Validate IC Number (assuming the IC number has a specific format)
    if (preg_match("/^\d{6}-\d{2}-\d{4}$/", $ic_number)) {
        // Extract information
        $dob = substr($ic_number, 0, 6); // Extract first 6 characters as date of birth
        $gender_digit = substr($ic_number, 6, 1);
        $gender = ($gender_digit % 2 == 0) ? "Female" : "Male"; // Even is female, odd is male
        $place_of_birth_digit = substr($ic_number, 11, 1);
        $place_of_birth = ($place_of_birth_digit == 0) ? "Overseas" : "Malaysia";

        // Display information
        echo "Date of Birth: $dob<br>";
        echo "Gender: $gender<br>";
        echo "Place of Birth: $place_of_birth";
    } else {
        echo "Invalid Malaysian IC Number";
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: ic_input_form.html");
    exit();
}
?>
