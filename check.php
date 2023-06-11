<?php
session_start();

// Connect to the database
$conn = new mysqli("localhost", "root", "", "petstore");

// Check the connection
if ($conn->connect_error) {
  die("資料庫連接失敗: " . $conn->connect_error);
}

// Handle login requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Escape the username and password to prevent SQL injection
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password);

  // Check if there is a matching record in the customer table
  $sql = "SELECT * FROM customer WHERE c_mail = '$username' AND c_password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Login successful as customer
    $_SESSION['username'] = $username;
    $_SESSION['loggedIn'] = true;
    $_SESSION['userRole'] = 'customer';

    // Redirect to the customer page
    header("Location: customer.php");
    exit();
  }

  // Check if there is a matching record in the babysit table
  $sql = "SELECT * FROM babysit WHERE b_mail = '$username' AND b_password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Login successful as babysit
    $_SESSION['username'] = $username;
    $_SESSION['loggedIn'] = true;
    $_SESSION['userRole'] = 'babysit';

    // Redirect to the babysit page
    header("Location: babysit.php");
    exit();
  }

  // Check if there is a matching record in the admin table
  $sql = "SELECT * FROM admin WHERE a_mail = '$username' AND a_password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Login successful as admin
    $_SESSION['username'] = $username;
    $_SESSION['loggedIn'] = true;
    $_SESSION['userRole'] = 'admin';

    // Redirect to the admin page
    header("Location: admin.php");
    exit();
  }

  // Login failed, display error message
  $_SESSION['loginError'] = "登入失敗，帳號或密碼有誤!";
  header("Location: login.php");
  exit();
}

// Check if the user is already logged in
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
  $userRole = $_SESSION['userRole'];
  
  // Redirect based on user role
  if ($userRole === 'customer') {
    header("Location: customer.php");
  } elseif ($userRole === 'babysit') {
    header("Location: babysit.php");
  } elseif ($userRole === 'admin') {
    header("Location: admin.php");
  }
  exit();
}

// Close the database connection
$conn->close();
?>
