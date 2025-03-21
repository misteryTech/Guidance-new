<?php
session_start();
include("connection.php"); // Ensure the database connection is included

// Redirect logged-in users
if (isset($_SESSION['Admin_Id'])) {
    header("Location: admin/index.php");
    exit();
} elseif (isset($_SESSION['Counselor_Id'])) {
    header("Location: counselor/index.php");
    exit();
} elseif (isset($_SESSION['Patient_Id'])) {
    header("Location: patient/index.php");
    exit();
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = trim($_POST['identifier']); // Can be Email, Username, or Student ID
    $password = trim($_POST['password']);

    // Queries for different user types
    $queries = [
        "admin" => "SELECT Admin_Id AS id, Username, Email, Password FROM admin_table WHERE Email = ? OR Username = ?",
        "counselor" => "SELECT Counselor_Id AS id, Username, Email, Password FROM counselor_table WHERE Email = ? OR Username = ?",
        "student" => "SELECT Patient_Id AS id, Username, Password, archive FROM patient_table WHERE Patient_Id = ? OR Username = ?"
    ];

    foreach ($queries as $role => $query) {
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $identifier, $identifier);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            if ($role === "student") {
                $stmt->bind_result($id, $username, $db_password, $archive_status);
                $stmt->fetch();

                if ($archive_status === 'Yes') {
                    $error_message = "Your account is inactive. Please contact support.";
                    break;
                }
            } else {
                $stmt->bind_result($id, $username, $email, $db_password);
                $stmt->fetch();
            }

            // Use password_verify() for secure password validation
            if (password_verify($password, $db_password)) {
                // Set session variables based on role
                $_SESSION['Username'] = $username;
                if ($role === "admin") {
                    $_SESSION['Admin_Id'] = $id;
                    header("Location: admin/index.php");
                } elseif ($role === "counselor") {
                    $_SESSION['Counselor_Id'] = $id;
                    header("Location: counselor/index.php");
                } elseif ($role === "student") {
                    $_SESSION['Patient_Id'] = $id;
                    header("Location: patient/index.php");
                }
                exit();
            } else {
                $error_message = "Invalid password. Please try again.";
                break;
            }
        }
        $stmt->close();
    }

    if (empty($error_message)) {
        $error_message = "Invalid credentials. Please try again.";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="front/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/assets/css/Overlay-Login-Form.css">
</head>
<body>

<style>
    .inputbox input {
        color: #1e1e25;
    }
</style>
<section>
    <div class="section-bg-overlay">
        <div class="form-box">
            <div class="form-value">
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <h3 class="text-center">Student Login</h3>
                    <div class="inputbox">
                        <input type="text" id="identifier" name="identifier" required placeholder=" " />
                        <label for="identifier">Student ID or Username</label>
                    </div>
                    <div class="inputbox">
                        <input type="password" id="myInput" name="password" required placeholder=" " />
                        <label for="password">Password</label>
                    </div>

                    <input type="checkbox" onclick="myFunction()">Show Password
                    <br>
                
                    <button type="submit">Login</button>
                    <!-- <div class="register">
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="front/assets/bootstrap/js/bootstrap.min.js"></script>
    
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>
