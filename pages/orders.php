<?php
include '../includes/config.php';
include '../includes/header.php';

// Ensure the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<h2>Order Management</h2>
<p>Manage your orders here</p>
<?php include '../includes/footer.php'; ?>
