<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="../icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: #1a1a2e;
            color: #f0f0f0;
            margin: 0;
            padding: 20px;
            width: 100%;
        }
        .content {
            width: 90%;
            max-width: 1500px;
            padding: 30px;
            background: #16213e;
            border-radius: 20px;
            box-shadow: 5px 5px 15px #0e153a, 5px 5px 15px #ffffff;
            overflow-x: auto;
            margin: 50px auto;
            animation: fadeInDown 1s 2s;
        }
        .title-container {
            background: linear-gradient(120deg, #00aaff 0%, #0066ff 100%);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeInDown 1s ease-out;
        }

        h1 {
            font-size: 4.5rem;
            font-weight: 800;
            color: #ffffff;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 3px;
            margin: 0;
            line-height: 1.2;
            text-transform: uppercase;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            h1 { 
                font-size: 3.5rem; 
            }
        }

        @media (max-width: 480px) {
            h1 { 
                font-size: 2.8rem; 
            }
            .title-container {
                padding: 15px;
            }
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 12px;
            background: #1e2746;
            color: #f0f0f0;
            border-radius: 10px;
            text-align: center;
        }
        table th {
            font-weight: bold;
            background: #2a3a5e;
        }
        .button {
            display: inline-block;
            width: calc(50% - 10px);
            padding: 15px;
            background-image: linear-gradient(120deg, #00aaff 0%, #0066ff 100%);
            color: #ffffff;
            font-size: 18px;
            font-weight: 400;
            text-align: center;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 5px;
            text-decoration: none;
        }
        .button:hover {
            scale: 1.1;
            background-image: linear-gradient(120deg, #0066ff 0%, #00aaff 100%);
        }
        #color-patch {
            position: fixed;
            width: 300px;
            height: 300px;
            border-radius: 80%;
            background: radial-gradient(circle at center, rgba(0, 153, 255, 0.6), rgba(0, 204, 204, 0.6), rgba(0, 0, 102, 0.6));
            pointer-events: none;
            filter: blur(100px);
            opacity: 1.5;
            transition: transform 0.1s ease-out;
        }

        @media (max-width: 768px) {
            h1 { font-size: 2rem; }
            .content { padding: 20px; width: 95%; }
            table th, table td { padding: 10px; font-size: 14px; }
            .button { width: 100%; margin: 5px 0; }
        }

        @media (max-width: 480px) {
            h1 { font-size: 1.8rem; }
            .content { padding: 15px; width: 100%; }
            table { border-spacing: 5px; }
            table th, table td { padding: 8px; font-size: 12px; }
            .button { padding: 10px; font-size: 16px; }
        }
    </style>
</head>
<body>
    <div id="color-patch"></div>
    <div class="content animate__animated animate__fadeIn">
        <h1>Admin Dashboard</h1>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Age</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:text-red-700">Delete</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="logout.php" class="button">Logout</a>
        <a href="export.php" class="button">Export Data to PDF</a>
    </div>

    <script>
        document.addEventListener('mousemove', (e) => {
            const patch = document.getElementById('color-patch');
            patch.style.left = e.clientX + 'px';
            patch.style.top = e.clientY + 'px';
        });
    </script>
</body>
</html>
