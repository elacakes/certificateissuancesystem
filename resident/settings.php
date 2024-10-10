<?php
session_start();
include '../conn.php';
include '../assets/function.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.php');
    exit();
}

if ($_SESSION['role'] == 'admin') {
    header('Location: ../pages/login.php');
    exit();
}
?>