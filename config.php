<?php

// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "login_register_cognito";
// $conn = mysqli_connect($server, $username, $password, $database);

// if (!$conn) {
//     die("<script>alert('Connection Failed.')</script>");
// }

// <?php

$conn = mysqli_connect("localhost", "root", "", "login_register_cognito");

if (!$conn) {
    echo "Connection Failed";
}
?>

