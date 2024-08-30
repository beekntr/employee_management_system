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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" type="image/png" href="../icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: #1a1a2e;
            color: #ffffff;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #16213e;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .navbar h1 {
            font-size: 24px;
            color: #ffffff;
        }
        .profile-icon {
            width: 50px;
            height: 50px;
            background-image: linear-gradient(120deg, #00aaff 0%, #0066ff 100%);
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
            background-image: linear-gradient(120deg, #0066ff 0%, #00aaff 100%);
        }
        .dropdown-menu {
            background-color: #16213e;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .dropdown-menu a {
            color: #ffffff;
        }
        .dropdown-menu a:hover {
            background-color: #0e153a;
        }
        .content-box {
            background: #16213e;
            border-radius: 20px;
            box-shadow: 5px 5px 15px #0e153a, 5px 5px 15px #ffffff1a;
            animation: fadeInDown 1s 2s;
        }
        h1, p {
            color: #ffffff;
        }
        #color-patch {
            position: fixed;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle at center, rgba(0, 153, 255, 0.6), rgba(0, 204, 204, 0.6), rgba(0, 0, 102, 0.6));
            pointer-events: none;
            filter: blur(100px);
            opacity: 1.5;
            transition: transform 0.1s ease-out;
        }
    </style>
</head>
<body>
    <div id="color-patch"></div>

    <div class="navbar">
        <h1 class="empdsh">Employee Dashboard</h1>
        <div class="profile-container">
            <div class="profile-icon" onclick="toggleDropdown()">
                <?php echo strtoupper($employee['name'][0]); ?>
            </div>
            <div id="dropdown-menu" class="dropdown-menu hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                <a href="logout.php" class="block px-4 py-2 text-sm">Logout</a>
            </div>
        </div>
    </div>

    <div class="flex-grow flex justify-center items-center">
        <div class="content-box w-full max-w-md p-8 animate__animated animate__fadeInUp">
            <h1 class="text-2xl font-semibold mb-6 text-center">Welcome, <?php echo $employee['name']; ?>!</h1>
            <div>
                <p class="mb-2"><strong>Phone:</strong> <?php echo $employee['phone']; ?></p>
                <p class="mb-2"><strong>Email:</strong> <?php echo $employee['email']; ?></p>
                <p class="mb-2"><strong>Home Address:</strong> <?php echo $employee['address']; ?></p>
                <p class="mb-2"><strong>Salary:</strong> <?php echo $employee['salary']; ?></p>
                <p class="mb-2"><strong>Age:</strong> <?php echo $employee['age']; ?></p>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.toggle('hidden');
        }

        window.onclick = function(event) {
            if (!event.target.matches('.profile-icon')) {
                const dropdown = document.getElementById('dropdown-menu');
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        }

        document.addEventListener('mousemove', (e) => {
            const colorPatch = document.getElementById('color-patch');
            const x = e.clientX;
            const y = e.clientY;
            colorPatch.style.transform = `translate(${x - 150}px, ${y - 150}px)`;
        });
    </script>
</body>
</html>
<?php
$conn->close();
?>
