<?php
session_start();
include "../conn.php";
include "../assets/function.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendemail_verify($name,$email,$verify_token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true; 
    
    $mail->Host       = "smtp.gmail.com"; 
    $mail->Username   = "brgypuncan@gmail.com";
    $mail->Password   = "jyvv bixb jjjl wlfz";      
    
    $mail->SMTPSecure = "tls"; 
    $mail->Port       = 587;

    $mail->setFrom("brgypuncan@gmail.com", "Barangay Certificate Issuance System");
    $mail->addAddress($email, $name);       
    
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification from Barangay Puncan';

    $email_template = "
    <h2>You have registered with Barangay Puncan Certificate Issuance System</h2>
    <h5>Verify your email address to complete your registration with the given link below.</h5>
    <br><br>
    <a href='http://localhost/certificateissuancesystem/verify_email.php?token=$verify_token'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
    // echo "Message has been sent";
}

// SIGN UP FORM
if(isset($_POST['submit_user'])){
    $name = validate ($_POST['name']);
    $email =validate($_POST['email']);
    $password = validate($_POST['password']);
    $verify_token = md5(rand());

        
        $sql= "SELECT email FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $count_email = mysqli_num_rows($result);

        $role = 'resident';

    if($count_email==0){
            if($password){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $query= "INSERT INTO `users`(`name`, `email`, `password`,`verify_token`,`role`) VALUES ('{$name}','{$email}','{$hash}','{$verify_token}','{$role}') ";

                if(mysqli_query($conn,$query))
                {
                    $id = mysqli_insert_id($conn);
                    $_SESSION['user_id'] = $user_id;

                    sendemail_verify("$name","$email","$verify_token");
                    $_SESSION['status'] = "We’ve sent a verification email. Please open it to activate your account.";
                    header('Location: signup.php');
                }else 
                {
                    $_SESSION['status'] = "Email already exists!";
                    header('Location: signup.php');
                }
        }
        
}
}

// REGISTRATION FORM

if (isset($_POST['submit_resident'])) {
    // Get form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];
    $bplace = $_POST['place'];
    $status = $_POST['status'];
    $gender = $_POST['gender'];
    $stay = $_POST['stay'];
    $postal = $_POST['postal'];
    $zone = $_POST['zone'];
    $brgy = $_POST['brgy'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $mother_name = $_POST['mother_name'];
    $father_name = $_POST['father_name'];
    $pendingcase = $_POST['pendingcase'];
    $caseDetails = $_POST['caseDetails'];

    // SQL query to insert resident data
    $sql = "INSERT INTO residents_tbl (name, age, bday, bplace, status, gender, stay, postal, zone, brgy, city, province, mother_name, father_name, pendingcase, caseDetails) 
            VALUES ('$name', '$age', '$bday', '$bplace', '$status', '$gender', '$stay', '$postal', '$zone', '$brgy', '$city', '$province', '$mother_name', '$father_name', '$pendingcase', '$caseDetails')";

    // Execute query and check result
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Registration successful! You may now log in to your account.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['registerStatus'] = "Error: " . $conn->error;
        header("Location: registration.php");
        exit();
    }
}

// LOGIN FORM
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);
  
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hash = $row['password']; 
        $user_type = $row['role']; 
  
       
        if (password_verify($password, $hash)) {
            
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email']; 
  
            
            if ($user_type == 'resident') {
                $_SESSION['role'] = 'resident';
                header('Location: ../resident/dashboard.php'); 
                exit();
            } elseif ($user_type == 'admin') {
              
                $_SESSION['role'] = 'admin';
                header('Location:../admin/dashboard.php'); 
                exit();
            }
        } else {
            
            $_SESSION['status'] = "Incorrect password!";
            header('Location: login.php');
            exit();
        }
    } else {
       
        $_SESSION['status'] = "No account found with that email!";
        header('Location: login.php');
        exit();
    }
  }
?>