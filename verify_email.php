<?php
session_start();
include "conn.php";

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token, verify_status FROM users WHERE verify_token = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);

    if (mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);

        if ($row['verify_status'] == "0") {
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE users SET verify_status = '1' WHERE verify_token = '$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($conn, $update_query);

            if ($update_query_run) {
                $_SESSION['registerStatus'] = "Thank you for verifying your email. Now, complete the resident registration form to finish setting up your account.";
                header('Location: pages/register.php');
                exit(0);
            } else {
                $_SESSION['registerStatus'] = "Verification Failed!";
                header('Location: pages/register.php');
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Email already verified.";
            header('Location: login.php');
            exit(0);
        }
    } else {
        $_SESSION['status'] = "This token does not exist.";
        header('Location: login.php');
        exit(0);
    }
} else {
    $_SESSION['status'] = "Not Allowed";
    header('Location: login.php');
    exit(0);
}
?>
