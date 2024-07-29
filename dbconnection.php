<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mbudget');

// Check if a database name is provided
if (empty(DB_NAME)) {
    die("Database name not provided.");
}

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection to database success";
}
?>
