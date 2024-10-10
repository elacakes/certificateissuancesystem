<?php
include '../conn.php';

$id =$_REQUEST['id'];

$result = mysqli_query($conn, "SELECT * FROM residents_tbl WHERE id  = '$id'");
$test = mysqli_fetch_assoc($result);
if ($result==TRUE) 
    {
    
    $name=$test['name'];        
    $age = $test['age'];
    $gender = $test['gender'];
    $status = $test['status'];
    $bday = $test['bday'];
    $stay = $test['stay'];
    $zone = $test['zone'];
    }
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body{
      padding: 0;
      margin: 0;
    }

    .div{
      width: 7.5in;
      height: 10in;
      border: 5px solid blue;
      margin: .5in auto;
      background-image: url('images/puncan logo2.png');
      background-size: 500px;
      background-position: center;
      background-repeat: no-repeat;

    }

    input[type=button]{
      width: 100px;
      padding: 12px;
      border: none;
      background-color: #AED6F1;
      font-family: sans-serif;
    }
    input[type=button]:hover{
      background-color: #2E86C1;
      color: white;
      transition: .5s;
    }
    a{
      background-color: #C39BD3;
      color: black;
      text-decoration: none;
      padding-top: 9px;
      padding-bottom: 9px;
      padding-left: 28px;
      padding-right: 28px;
      font-family: sans-serif;
    }

    a:hover{
      background-color: #6C3483;
      color: white;
      transition: .5s;
    }
  </style>
  <title>Barangay Puncan Record System | Clearance</title>
  
</head>
<body>

<a href="certificate.php">BACK</a>
  <div class="div">
  <img src="../img/puncan logo.png" width="90px" style="position: absolute; margin-top: 13px; margin-left: 155px;">
    <p align="center" style=" font-size: 16px;"><b style="font-family: 'Brush script mt', cursive;">Republic of the Philippines</b><br>
    <b style="font-family: 'Berlin',bold;">Province of Nueva Ecija</b><br>Municipality of Carranglan<br><b>BARANGAY PUNCAN</b></p><br>
    <h1 align="center" style="font-family: Times New Roman narrow; text-transform: uppercase; letter-spacing: 1px; font-size: 24px; color: red;">Office of the Punong Barangay</h1>
    <hr width="80%">
    
    <h1 align="center" style="font-family: Arial; text-transform: uppercase; margin-top: 40px; color: #246672d3; letter-spacing: 2px; font-size: 24px;"><u style="padding: 2px;">B</u><u style="padding: 2px;">A</u><u style="padding: 2px;">R</u><u style="padding: 2px;">A</u><u style="padding: 2px;">N</u><u style="padding: 2px;">G</u><u style="padding: 2px;">A</u><u style="padding: 2px;">Y</u>   <u style="padding: 2px;">C</u><u style="padding: 2px;">L</u><u style="padding: 2px;">E</u><u style="padding: 2px;">A</u><u style="padding: 2px;">R</u><u style="padding: 2px;">A</u><u style="padding: 2px;">N</u><u style="padding: 2px;">C</u><u style="padding: 2px;">E</u></h1>

    <p style="margin-left: 10%; margin-top: 40px;">TO WHOM IT MAY CONCERN:</p>

    <p align="justify" style="margin-left: 10%; margin-right: 10%; line-height: 1.5; text-indent: 50px;">
    This is to certify that &nbsp; <span style="text-decoration:underline;"> &nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $name;?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>  </span>.<br>
    Aged:<span style="text-decoration: underline;"> &nbsp; <?php echo $age?> Years Old &nbsp;</span> &nbsp;Born On: <u> &nbsp; <?php echo $bday;?> </u> &nbsp; Status: <b><u>&nbsp;<?php echo $status;?> </u></b> &nbsp; is a resident of this barangay since year <u> &nbsp;<?php echo $stay;?> </u> , 
    with exact mailing address at <u> &nbsp; <b><?php echo $zone;?></b> &nbsp;</u>,Barangay Puncan, Carranglan, Nueva Ecija  .</p>

    <p align="justify" style="margin-left: 10%; margin-right: 10%; line-height: 1.5; text-indent: 50px;">
    <b>He/She</b> has found no deregatory record or any pending case filed against him/her as per implementation of Katarungang Pambarangay is concern.</p>

    <p align="justify" style="margin-left: 10%; margin-right: 10%; line-height: 1.5; text-indent: 50px;">
    This <b>BARANGAY CLEARANCE</b> is issued upon his/her request for <u> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </u>purpose/s. Issued this <u> &nbsp; <?php echo date('jS');?>, of <?php echo date('F');?> ,</u>&nbsp;2024 , hereat the Office of the
    Punong Barangay  at Barangay Puncan, Carranglan, Nueva Ecija.
    </p>
    <div><br><br>
    <p><hr style="width: 40%; background-color:black; margin-top:20px;">
    <center><b style="font-size:small;">[Requester's Signature Above Printed Name]</b></center></p>
    <div style="width: 1in; height: 1in; border: 1px solid black; margin-left: 75%; margin-top: 10px; position: relative;">
    <p style="color: red; font-size: xx-small; margin: 0; padding: 0; position: absolute; top:5px; left: 2px;">
        RIGHT THUMB MARK
    </p>
</div>
    </div>
    <div style="text-align: center; margin-right: 325px;">
    <p style="text-transform: uppercase; margin: 0; font-family: 'Cambria', serif; display: inline-block; padding-left: 20px; padding-right: 20px;">
        <u><?php
            $select2 = mysqli_query($conn, "SELECT * FROM officials_tbl WHERE position = 'Barangay Captain'");
            $row2 = mysqli_fetch_assoc($select2);
            echo $row2['fullname'];
        ?></u>
    </p>
    <p style="margin: 0; font-family: 'Cambria', serif; font-weight: bold;">
        Barangay Captain/LnB President
    </p>
</div>




    <br><br><br>
  
    <p style="margin-bottom: 20px; margin-left:50%; font-size:small; font-family:Cal">THIS IS NOT VALID IF WITHOUT BRGY. DRY SEAL</p>
    
    <br><br>
    </div>
    <center>
  <input type="button" name="submit" onclick="window.print()" value="PRINT"><br><br>

  <a href="clearance_cert.php">BACK</a></center><br>
</body>
</html>