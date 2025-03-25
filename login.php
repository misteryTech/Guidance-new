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
        "admin" => "SELECT Admin_Id AS id, Username, Email, Password, Archive FROM admin_table WHERE Email = ? OR Username = ?",
        "counselor" => "SELECT Counselor_Id AS id, Username, Email, Password, Archive FROM counselor_table WHERE Email = ? OR Username = ?",
        "student" => "SELECT Patient_Id AS id, Username, Email, Password, Archive FROM patient_table WHERE Patient_Id = ? OR Username = ?"
    ];

    foreach ($queries as $role => $query) {
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $identifier, $identifier);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            // Adjusted to match the number of selected columns
            $stmt->bind_result($id, $username, $email, $db_password, $archive_status);
            $stmt->fetch();

            // Check if the account is archived
            if ($archive_status === 'Yes') {
                $error_message = "Your account is inactive. Please visit the guidance office for reactivation.";
                break;
            }

            // Secure password verification
            if ($password === $db_password) {
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="GFI-LOGO.png" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <h4>Welcome! Please log in</h4>
                            <?php if (!empty($error_message)): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
                            <?php endif; ?>
                            <form method="POST">
                                <div class="form-group">
                                    <input type="text" name="identifier" class="form-control form-control-lg" placeholder="Email, Username, or ID" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" required>
                                    <small><input type="checkbox" onclick="togglePassword()"> Show Password</small>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-success btn-lg">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            x.type = x.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
