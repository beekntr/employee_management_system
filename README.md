Step 1: Create the Database and Table
Create Database: CREATE DATABASE employee_management;
Create Table: 
    USE employee_management;

   CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    age INT NOT NULL,
    role ENUM('employee', 'admin') DEFAULT 'employee'
);



Step 2:Verify Database Connection
Edit: $servername = ""; //your database server address
      $username = ""; //your database username
      $password = ""; // your database password
      $dbname = "employee_management";
      according to your databse credentials 
