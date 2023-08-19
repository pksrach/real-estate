<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpwd = '';
$dbname = 'ss5_realestate_db';

$conn = mysqli_connect($dbhost, $dbuser, $dbpwd);
if (!$conn) {
    die('Connection failed' . mysqli_connect_error());

    exit();
}

mysqli_select_db($conn, $dbname) or die('Connection failed' . mysqli_connect_error());
// printf("Connection successful");
echo "<script>console.log(`Connection Db Successful`)</script>";


function msgstyle($msg, $type)
{
    switch ($type) {
        case 'success':
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> ' . $msg . '.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
            break;

        case 'warning':
            echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> ' . $msg . '.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
            break;
        case 'info':
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Info</strong> ' . $msg . '.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
            break;
    }
}
