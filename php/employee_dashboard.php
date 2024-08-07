<?php
include 'config.php';
session_start();

if (!isset($_SESSION['employee_id'])) {
    header("Location: ../login.html");
    exit();
}

$employee_id = $_SESSION['employee_id'];
$sql = "SELECT * FROM employees WHERE id='$employee_id'";
$result = $conn->query($sql);
$employee = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="bg-purple-100 animate__animated animate__fadeIn">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl mb-6 animate__animated animate__bounceIn">Welcome, <?php echo $employee['name']; ?>!</h1>
        <div class="bg-white p-6 rounded-lg shadow-md animate__animated animate__fadeInUp">
            <p><strong>Phone:</strong> <?php echo $employee['phone']; ?></p>
            <p><strong>Email:</strong> <?php echo $employee['email']; ?></p>
            <p><strong>Home Address:</strong> <?php echo $employee['address']; ?></p>
            <p><strong>Salary:</strong> <?php echo $employee['salary']; ?></p>
            <p><strong>Age:</strong> <?php echo $employee['age']; ?></p>
        </div>
    </div>
</body>
</html>

