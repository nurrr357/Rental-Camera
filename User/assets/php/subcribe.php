<?php
echo "File subscribe.php berhasil diakses"; // Debugging
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email_address'];
}
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (!empty($name) && !empty($email)) {
    header('Location: ./index.php');
} else {
    echo "Please fill in all the required fields.";
}
?>