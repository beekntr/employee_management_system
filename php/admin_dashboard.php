<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}

include 'config.php';

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="bg-purple-100 flex items-center justify-center h-screen">
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-md animate__animated animate__fadeIn">
        <h1 class="text-4xl mb-4 text-purple-700 text-center">Admin Dashboard</h1>
        <table class="table-auto w-full mb-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Address</th>
                    <th class="px-4 py-2">Salary</th>
                    <th class="px-4 py-2">Age</th>
                    <th class="px-4 py-2">Role</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $row['id']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['name']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['phone']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['email']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['address']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['salary']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['age']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['role']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="logout.php" class="bg-purple-500 text-white px-4 py-2 rounded">Logout</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
