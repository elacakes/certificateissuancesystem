<?php
include "../conn.php";

// ADD ADMINISTRATOR
if(isset($_POST['user'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql= "SELECT * FROM users WHERE name='$name' ";
            $result= mysqli_query($conn, $sql);
            $count_user = mysqli_num_rows($result);
            
            $sql= "SELECT * FROM users WHERE email='$email' ";
            $result = mysqli_query($conn, $sql);
            $count_email = mysqli_num_rows($result);

            $role = 'admin';

            if($count_user==0 || $count_email==0){
                if($password){
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $query= "INSERT INTO `users`(`name`, `email`, `password`, `role`) VALUES ('{$name}','{$email}','{$hash}','{$role}') ";
                    $result= $conn->query($query);

                    $_SESSION['status'] = "Added successfully!";
                    header('Location: add-user.php');
                }
            }
            else{
                echo '<script>
                alert("Email already exist"); 
                window.location.href ="add-user.php";
                </script>';
            }


}

// INSERTING DATA
if (isset($_POST['save'])){
    $fullname= $_POST['fullname'];
    $gender=$_POST['gender'];
    $bdate=$_POST['bdate'];
    $position=$_POST['position'];
    $termEnd=$_POST['termEnd'];
    $termStart=$_POST['termStart'];
    $image= $_FILES['image']['name'];

    $ext= pathinfo($image, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tempName= $_FILES['image']['tmp_name'];
    $targetPath= "uploads/" .$image;

    if(in_array($ext, $allowedTypes)){
        if(move_uploaded_file($tempName, $targetPath)){
    
    $sql= "INSERT INTO officials_tbl(fullname,gender,bdate,position,termStart,termEnd,image) VALUES ('{$fullname}','{$gender}','{$bdate}','{$position}','{$termStart}','{$termEnd}','{$image}')";
            $result= $conn->query($sql);
 
    if($result == TRUE){
        header('Location:official.php');
     }else{
         echo "Error" . $sql . "<br>" . $conn->error;
     }
     $conn->close();
    }
}
}

// VIEWING DATA
if(isset($_POST['click_view_btn'])){

    $id=$_POST['user_id'];

   $fetch_query= "SELECT id, fullname, gender, bdate, position, termStart, termEnd, image FROM officials_tbl WHERE id='$id'";
   $fetch_query_run= mysqli_query($conn,$fetch_query);


   if(mysqli_num_rows($fetch_query_run) > 0){
    while ($row=mysqli_fetch_array($fetch_query_run)) 
                 
    {

        echo'
        <h6><b> User ID:</b> ' .$row['id'].'</h6>
        <h6> <img src= "uploads/' .$row['image'].' " style="width:150px; height:150px;"</h6>
        <h6><b> Full Name:</b> ' .$row['fullname'].'</h6>
        <h6><b> Gender: </b> ' .$row['gender'].'</h6>
        <h6><b> Birthday: </b> '.$row['bdate'].'</h6>
        <h6><b> Position: </b>'.$row['position'].'</h6>
        <h6><b> Term Started: </b>'.$row['termStart'].'</h6>
        <h6><b> Term Ended: </b>'.$row['termEnd'].'</h6>

        ';
    }

} 
}

// EDITING DATA
if(isset($_POST['click_edit_btn'])){
        
    $id=$_POST['user_id'];
    $arrayresult=[];

   $fetch_query= "SELECT * FROM officials_tbl WHERE id='$id'";
   $fetch_query_run= mysqli_query($conn,$fetch_query);


   if(mysqli_num_rows($fetch_query_run) > 0){
    while ($row=mysqli_fetch_array($fetch_query_run)) 
    {
        array_push($arrayresult, $row);
        header('content-type: application/json');
        echo json_encode($arrayresult);
    }
}
}

// UPDATE DATA
if(isset($_POST['update_data']))
{
 $id= $_POST['id'];
 $fullname=$_POST['fullname'];
 $gender= $_POST['gender'];
 $bdate= $_POST['bdate'];
 $position= $_POST['position'];
 $termStart= $_POST['termStart'];
 $termEnd=$_POST['termEnd'];
 $image=$_POST['image'];

 $id = mysqli_real_escape_string($conn, $id);
 $fullname = mysqli_real_escape_string($conn, $fullname);
 $gender = mysqli_real_escape_string($conn, $gender);
 $bdate = mysqli_real_escape_string($conn, $bdate);
 $position = mysqli_real_escape_string($conn, $position);
 $termStart = mysqli_real_escape_string($conn, $termStart);
 $termEnd = mysqli_real_escape_string($conn, $termEnd);
 $image= mysqli_real_escape_string($conn, $image);

 
 $update_query= "UPDATE officials_tbl SET fullname='$fullname', gender='$gender', bdate='$bdate', position='$position', termStart='$termStart', termEnd='$termEnd', image='$image' WHERE id='$id'";
 $update_query_run= mysqli_query($conn, $update_query);

 if($update_query_run) {
     header('Location: official.php');
 } else {
     echo "Error updating record: " . mysqli_error($conn);
 }
 
 $conn->close();

}

// Request Approval

if (isset($_POST['action'])) {
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $sql = "UPDATE certificate_requests SET status='approved' WHERE id='$request_id'";
    } elseif ($action == 'disapprove') {
        $sql = "UPDATE certificate_requests SET status='denied' WHERE id='$request_id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: certificate.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
// Request Approval

// INSERT RESIDENT DATA

if (isset($_POST['submit'])){

    $name= $_POST['name'];
    $age=$_POST['age'];
    $bday=$_POST['bday'];
    $bplace=$_POST['bplace'];
    $status=$_POST['status'];
    $gender=$_POST['gender'];
    $stay = $_POST['stay'];
    $postal = $_POST['postal'];
    $zone=$_POST['zone'];
    $brgy=$_POST['brgy'];
    $city=$_POST['city'];
    $province=$_POST['province'];
    $mother_name=$_POST['mother_name'];
    $father_name=$_POST['father_name'];
    $pendingcase=$_POST['pendingcase'];
    $caseDetails=$_POST['caseDetails'];

    $query= "INSERT INTO residents_tbl(`name`, `age`, `bday`, `bplace`,`status`, `gender`, `stay`, `postal`, `zone`, `brgy`, `city`, `province`, `mother_name`, `father_name`,`pendingcase`, `caseDetails`)
                VALUES ('{$name}', '{$age}', '{$bday}', '{$bplace}', '{$status}', '{$gender}','{$stay}','{$postal}', '{$zone}', '{$brgy}', '{$city}', '{$province}', '{$mother_name}', '{$father_name}', '{$pendingcase}', '{$caseDetails}') ";

    $result= $conn->query($query);    

    if($result == TRUE){
    header('Location:resident.php');
    }else{
     echo "Error" . $sql . "<br>" . $conn->error;
     }

    }

    // VIEW RESIDENT DATA
if(isset($_POST['click_show_btn']))
{
    $id= $_POST['user_id'];
                        $query= "SELECT * FROM residents_tbl WHERE id='$id'";
                        $result=mysqli_query($conn,$query);
                 
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){  

    echo ' 
            <h6><b> Full Name:</b> ' .$row['name'].'</h6>
            <h6><b> Age: </b> ' .$row['age'].'</h6>
            <h6><b> Birthday: </b> ' .$row['bday'].'</h6>
            <h6><b> Birth Place: </b> '.$row['bplace'].'</h6>
            <h6><b> Civil Status: </b>'.$row['status'].'</h6>
            <h6><b> Gender: </b>'.$row['gender'].'</h6>
            <h6><b> Years of Residency </b>'.$row['stay'].'</h6>
            <h6><b> Postal Code: </b> ' .$row['postal'].'</h6>
            <h6><b> Zone: </b> ' .$row['zone'].'</h6>
            <h6><b> Barangay: </b> ' .$row['brgy'].'</h6>
            <h6><b> Municipality: </b> ' .$row['city'].'</h6>
            <h6><b> Province: </b> ' .$row['province'].'</h6>
            <h6><b> Mother Name: </b> ' .$row['mother_name'].'</h6>
            <h6><b> Father Name: </b> ' .$row['father_name'].'</h6>
            <h6><b> Pending Cases: </b> ' .$row['pendingcase'].'</h6>
            <h6><b> Case Details: </b> ' .$row['caseDetails'].'</h6>
            ';

}
}

}
 // VIEW RESIDENT DATA

 // EDIT RESIDENT DATA

 if(isset($_POST['click_update_btn'])){

    $id=$_POST['user_id'];
    $array = [];

    $fetch_query= "SELECT * FROM residents_tbl WHERE id='$id'";
       $fetch_query_run= mysqli_query($conn,$fetch_query);

       if(mysqli_num_rows($fetch_query_run) > 0){
        while ($row=mysqli_fetch_array($fetch_query_run)) 
        {
            array_push($array, $row);
            header('content-type: application/json');
            echo json_encode($array);
        }
   }
    }
?>