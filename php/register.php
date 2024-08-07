<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $age = $_POST['age'];
    $role = $_POST['role']; 

    $sql = "INSERT INTO employees (name, phone, email, password, address, salary, age, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssdss", $name, $phone, $email, $password, $address, $salary, $age, $role);

    if ($stmt->execute()) {
        header("Location: ../login.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
