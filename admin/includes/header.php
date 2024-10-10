<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.php');
    exit();
}

if ($_SESSION['role'] == 'resident') {
    header('Location: ../pages/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="../img/puncan logo.png">
    <title>Admin Dashboard</title>
</head>



<body>
    
      

   
