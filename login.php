<?php
session_start();

// Redirect to admin or counselor dashboard if already logged in
if (isset($_SESSION['Admin_Id'])) {
    header("Location: admin/index.php");
    exit();
} elseif (isset($_SESSION['Counselor_Id'])) {
    header("Location: counselor/index.php");
    exit();
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connection.php'; // Ensure database connection is included

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $identifier = trim($_POST['identifier']); // Can be email or username
    $password = trim($_POST['password']);

    // Determine if the identifier is an email or a username
    if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
        $admin_query = "SELECT Admin_Id, Username, Email, Password FROM admin_table WHERE Email = ?";
        $counselor_query = "SELECT Counselor_Id, Username, Email, Password FROM counselor_table WHERE Email = ?";
    } else {
        $admin_query = "SELECT Admin_Id, Username, Email, Password FROM admin_table WHERE Username = ?";
        $counselor_query = "SELECT Counselor_Id, Username, Email, Password FROM counselor_table WHERE Username = ?";
    }

    // Function to check login credentials
    function checkLogin($conn, $query, $identifier, &$userData) {
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("s", $identifier);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 1) {
                $stmt->bind_result($userData['id'], $userData['username'], $userData['email'], $userData['password']);
                $stmt->fetch();
                $stmt->close();
                return true;
            }
            $stmt->close();
        }
        return false;
    }

    $userData = [];

    if (checkLogin($conn, $admin_query, $identifier, $userData)) {
        if ($password === $userData['password']) {
            $_SESSION['Admin_Id'] = $userData['id'];
            $_SESSION['Username'] = $userData['username'];
            $_SESSION['Email'] = $userData['email'];
            header("Location: admin/index.php");
            exit();
        }
    } elseif (checkLogin($conn, $counselor_query, $identifier, $userData)) {
        if ($password === $userData['password']) {
            $_SESSION['Counselor_Id'] = $userData['id'];
            $_SESSION['Username'] = $userData['username'];
            $_SESSION['Email'] = $userData['email'];
            header("Location: counselor/index.php");
            exit();
        }
    }

    // If login fails
    $error_message = "Invalid credentials. Please try again.";

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guidance Admin Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="GFI-LOGO.png" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                          
                            </div>
                            <h4>Hello! Let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <?php if (!empty($error_message)): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
                            <?php endif; ?>
                            <form class="pt-3" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" name="identifier" class="form-control form-control-lg" placeholder="Id or Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    
                                  
                                </div>
                                <!-- <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
</body>
</html>
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