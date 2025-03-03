<?php
    include("connection.php");
session_start();

// Redirect if already logged in
if (isset($_SESSION['Patient_Id'])) {
    header("Location: patient/index.php");
    exit();
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $identifier = trim($_POST['identifier']);
    $password = trim($_POST['password']);

    // Determine the appropriate query based on input type
    if (is_numeric($identifier)) {
        // If identifier is numeric, treat it as Patient_Id
        $query = "SELECT Patient_Id, Username, Password FROM patient_table WHERE Patient_Id = ?";
    } else {
        // Otherwise, treat it as Username
        $query = "SELECT Patient_Id, Username, Password FROM patient_table WHERE Username = ?";
    }

    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $identifier);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        // Bind results
        $stmt->bind_result($Patient_Id, $username, $db_password);
        $stmt->fetch();

        // Verify the password (assumes passwords are hashed in the database)
        if ($password === $db_password) {
            // Set session variables on successful login
            $_SESSION['Patient_Id'] = $Patient_Id;
            $_SESSION['Username'] = $username;

            // Redirect to the dashboard
            header("Location: patient/index.php");
            exit();
        } else {
            $error_message = "Invalid password. Please try again.";
        }
    } else {
        $error_message = "Invalid Patient ID or Username. Please try again.";
    }
    $stmt->close();
}
$conn->close();
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
