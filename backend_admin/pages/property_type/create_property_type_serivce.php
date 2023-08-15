<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpwd = '';
$dbname = 'ss5_realestate_db';

$conn = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $proTypeKh = mysqli_real_escape_string($conn, $_POST['txt_property_type_kh']);
    $proTypeEn = mysqli_real_escape_string($conn, $_POST['txt_property_type_en']);
    $proTypeDesc = mysqli_real_escape_string($conn, $_POST['tar_property_desc']);

    // Validate and sanitize the data as needed before insertion

    $sql = "INSERT INTO tbl_property_type (property_type_kh, property_type_en, property_type_desc) VALUES ('$proTypeKh', '$proTypeEn', '$proTypeDesc')";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        $response = array("success" => true, "message" => "Data saved successfully!");
        echo json_encode($response);
    } else {
        // Error occurred while inserting data
        $response = array("success" => false, "message" => "Error saving data: " . mysqli_error($conn));
        echo json_encode($response);
    }
}

mysqli_close($conn);
?>
