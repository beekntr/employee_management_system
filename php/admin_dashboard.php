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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins';
        }
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #e5e5e5;
        }
        .content {
            width: 90%;
            max-width: 1500px;
            padding: 30px;
            background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            border-radius: 10px;
            box-shadow: -3px -3px 7px #ffffff73,
                        2px 2px 5px rgba(94, 104, 121, 0.288);
            overflow-x: auto;
            margin-top:2px;
        }
        h1 {
            font-size: 33px;
            font-weight: 400;
            margin-bottom: 35px;
            color: #595959;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px; 
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 12px;
            background: #dde1e7;
            color: #595959;
            border-radius: 10px;
            box-shadow: inset 2px 2px 5px #BABECC,
                        inset -5px -5px 10px #ffffff73;
            text-align: center;
        }
        table th {
            font-weight: bold;
        }
        table tr:not(:last-child) td {
            border-bottom: 1px solid #BABECC;
        }
        .button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%);
            color: #595959;
            font-size: 18px;
            font-weight: 400;
            text-align: center;
            border-radius: 25px;
            box-shadow: 2px 2px 5px #BABECC,
                        -5px -5px 10px #ffffff73;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .button:hover {
            background: linear-gradient(120deg, #66a6ff 0%, #89f7fe 100%);
        }
        

        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            .content {
                padding: 20px;
                width: 95%;
            }

            table th, table td {
                padding: 10px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 20px;
            }

            .content {
                padding: 15px;
                width: 100%;
            }

            table {
                border-spacing: 5px;
            }

            table th, table td {
                padding: 8px;
                font-size: 12px;
            }

            .button {
                padding: 10px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
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
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="del">Delete</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="logout.php" class="button">Logout</a> <a href="export.php" class="button">Export Data to PDF</a>
    </div>
</body>
</html>
