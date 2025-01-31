<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input to prevent code injection
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    // Prepare the data to be written
    $data = "Username: $username, Password: $password\n";

    // Write the data to users.txt
    $file = fopen('users.txt', 'a');
    if ($file) {
        fwrite($file, $data);
        fclose($file);
        echo "Login information saved successfully.";
    } else {
        echo "Error: Unable to open the file.";
    }
} else {
    echo "Invalid request method.";
}
?>
