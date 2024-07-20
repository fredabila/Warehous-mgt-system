<?php
function checkLogin($conn, $username, $password) {
    $sql = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

function getInventory($conn) {
    $sql = "SELECT * FROM inventory";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addInventory($conn, $name, $quantity) {
    $sql = "INSERT INTO inventory (name, quantity) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $quantity);
    return $stmt->execute();
}

function updateInventory($conn, $id, $name, $quantity) {
    $sql = "UPDATE inventory SET name=?, quantity=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $name, $quantity, $id);
    return $stmt->execute();
}

function deleteInventory($conn, $id) {
    $sql = "DELETE FROM inventory WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>
