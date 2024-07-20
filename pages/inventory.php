<?php
include '../includes/config.php';
include '../functions/functions.php';
include '../includes/header.php';

// Ensure the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Handle form submission for adding inventory
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    addInventory($conn, $name, $quantity);
}

$inventory = getInventory($conn);
?>
<h2>Inventory Management</h2>
<form method="post" action="">
    <label for="name">Item Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>
    <button type="submit">Add Item</button>
</form>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inventory as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>
                <a href="edit_inventory.php?id=<?php echo $item['id']; ?>">Edit</a>
                <a href="delete_inventory.php?id=<?php echo $item['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include '../includes/footer.php'; ?>
