<?php
include '../conn.php';

function validate($inputData){
    global $conn;

    return mysqli_real_escape_string($conn, $inputData);
}

function redirect($url, $status)
{
    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);
}

function alertMessage()
{
    if(isset($_SESSION['status']))
    {
        echo '<div class="alert alert-success">
        <h6>'.$_SESSION['status'].' </h6>
         </div>';
         unset($_SESSION['status']);
    }
}

function getAll($tableName)
{
    global $conn;

    $table = validate($tableName);

    $query = "SELECT * FROM $table WHERE role='admin'";
    $result= mysqli_query($conn, $query);
    return $result;
}
?>