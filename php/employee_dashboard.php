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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
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
            min-height: 100vh;
            background: #e5e5e5;
            display: flex;
            flex-direction: column;
        }
        .empdsh{
            margin:auto;
        }
        .navbar {
            background-color: #ffffff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            displ
        }
        .navbar h1 {
            font-size: 24px;
            color: #333;
        }
        .profile-container {
            position: relative;
        }
        .profile-icon {
            width: 50px;
            height: 50px;
            background-color: #66a6ff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .profile-icon:hover {
            background-color: #89f7fe;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            z-index: 1000;
        }
        .dropdown-menu a {
            display: block;
            padding: 10px 20px;
            text-align: center;
            color: #333;
            text-decoration: none;
        }
        .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .content-box {
            width: 90%;
            max-width: 500px;
            padding: 30px;
            background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            border-radius: 10px;
            box-shadow: -3px -3px 7px #ffffff73,
                        2px 2px 5px rgba(94, 104, 121, 0.288);
        }
        h1 {
            font-size: 28px;
            font-weight: 400;
            margin-bottom: 20px;
            color: #595959;
            text-align: center;
        }
        p {
            margin: 10px 0;
            font-size: 16px;
            color: #595959;
        }

        @media (max-width: 768px) {
            .navbar h1 {
                font-size: 20px;
            }
            .content-box {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .navbar h1 {
                font-size: 18px;
            }
            .content-box {
                padding: 15px;
            }
            p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1 class= "empdsh">Employee Dashboard</h1>
        <div class="profile-container">
            <div class="profile-icon" onclick="toggleDropdown()">
                <?php echo strtoupper($employee['name'][0]); ?>
            </div>
            <div id="dropdown-menu" class="dropdown-menu">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="content-box animate__animated animate__fadeInUp">
            <h1>Welcome, <?php echo $employee['name']; ?>!</h1>
            <div>
                <p><strong>Phone:</strong> <?php echo $employee['phone']; ?></p>
                <p><strong>Email:</strong> <?php echo $employee['email']; ?></p>
                <p><strong>Home Address:</strong> <?php echo $employee['address']; ?></p>
                <p><strong>Salary:</strong> <?php echo $employee['salary']; ?></p>
                <p><strong>Age:</strong> <?php echo $employee['age']; ?></p>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdown-menu');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            } else {
                dropdown.style.display = 'block';
            }
        }

        window.onclick = function(event) {
            if (!event.target.matches('.profile-icon')) {
                var dropdown = document.getElementById('dropdown-menu');
                if (dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
