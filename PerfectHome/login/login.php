<?php
include 'database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Get the role from the form

    // Default admin credentials
    $defaultAdminEmail = 'perfecthome@gmail.com';
    $defaultAdminPassword = '1234';

    // Check if logging in as an admin or a user
    if ($role === 'admin') {
        // Check if the credentials match the default admin
        if ($email === $defaultAdminEmail && $password === $defaultAdminPassword) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            // Redirect to the admin dashboard
            header("Location: ../admin/dashboard.html");
            exit();
        } else {
            // Query the admins table for admin login
            $sql = "SELECT * FROM admin WHERE email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Verify the password
                if (password_verify($password, $row['password'])) {
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;

                    header("Location: book.html");
                    exit();
                } else {
                    echo "Incorrect password.";
                }
            } else {
                echo "No admin account found with that email.";
            }
        }
    } else {
        // Query the users table for user login
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;

                // Redirect to the user home page
                header("Location: ../home page/home.html");
                exit();
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "No account found with that email.";
        }
    }
}
?>
