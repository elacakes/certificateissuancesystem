<?php
include '../conn.php';

$id = $_REQUEST['id'];

$result = mysqli_query($conn, "SELECT * FROM residents_tbl WHERE id  = '$id'");
$test = mysqli_fetch_assoc($result);
if ($result == TRUE) {

    $name = $test['name'];
    $age = $test['age'];
    $gender = $test['gender'];
    $status = $test['status'];
    $bday = $test['bday'];
    $stay = $test['stay'];
    $postal = $test['postal'];
    $zone = $test['zone'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .div {
            width: 7.5in;
            height: 10in;
            border: 5px solid blue;
            margin: .5in auto;
            background-image: url('images/puncan logo2.png');
            background-size: 500px;
            background-position: center;
            background-repeat: no-repeat;

        }

        input[type=button] {
            width: 100px;
            padding: 12px;
            border: none;
            background-color: #AED6F1;
            font-family: sans-serif;
        }

        input[type=button]:hover {
            background-color: #2E86C1;
            color: white;
            transition: .5s;
        }

        a {
            background-color: #C39BD3;
            color: black;
            text-decoration: none;
            padding-top: 9px;
            padding-bottom: 9px;
            padding-left: 28px;
            padding-right: 28px;
            font-family: sans-serif;
        }

        a:hover {
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
        <img src="../img/puncan logo.png" width="90px" style="position: absolute; margin-top: 13px; margin-left: 100px;">
        <p align="center" style=" font-size: 16px; margin-bottom:0;"><b style="font-family: 'Brush script mt', cursive;">Republic of the Philippines</b><br>
            <b style="font-family: 'Berlin',bold;">Province of Nueva Ecija</b><br>Municipality of Carranglan<br><b>BARANGAY PUNCAN</b>
        </p><br>
        <h1 align="center" style="font-family: Times New Roman narrow; text-transform: uppercase; letter-spacing: 1px; font-size: 24px; color:red; margin-top:0; margin-bottom:0">Office of the Punong Barangay</h1>
        <hr width="80%" style="margin-top:0;margin-bottom:0;">

        <h1 align="center" style="font-family: Arial; text-transform: uppercase; margin-top: 40px; color: #003366; letter-spacing: 2px; font-size: 24px;"><u style="padding: 2px;">c</u><u style="padding: 2px;">e</u><u style="padding: 2px;">r</u><u style="padding: 2px;">t</u><u style="padding: 2px;">i</u><u style="padding: 2px;">f</u><u style="padding: 2px;">i</u><u style="padding: 2px;">c</u><u style="padding: 2px;">a</u><u style="padding: 2px;">t</u><u style="padding: 2px;">e</u> <text style="text-transform:lowercase;">of</text> <u style="padding: 2px;">r</u><u style="padding: 2px;">e</u><u style="padding: 2px;">s</u><u style="padding: 2px;">i</u><u style="padding: 2px;">d</u><u style="padding: 2px;">e</u><u style="padding: 2px;">n</u><u style="padding: 2px;">c</u><u style="padding: 2px;">y</u></h1>

        <p style="margin-left: 10%; margin-top: 40px; font-family: 'Comic Neue';font-weight: 600;font-style: normal;">TO WHOM IT MAY CONCERN:</p>

        <p align="justify" style="margin-left: 10%; margin-right: 10%; line-height: 1.5; text-indent: 50px; font-family: 'Comic Neue', cursive; font-weight:600; font-style:italic;">
            This is to certify that the person named below is a resident of this barangay since year <span style="text-decoration:underline;"> &nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $stay; ?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>. <br>
        </p>

        <p align="justify" style="margin-left: 8%; margin-right: 10%; line-height: 1.5; text-indent: 50px;">
            NAME: <span style="text-decoration:underline;"> &nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $stay; ?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span> <br>
        </p>
        <p align="justify" style="margin-left: 8%; margin-right: 10%; line-height: 1.5; text-indent: 50px;">
            AGE: <span style="text-decoration:underline;"> &nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $age; ?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>YEARS OLD </span>  &nbsp;&nbsp;&nbsp;&nbsp; CIVIL STATUS: <span style="text-decoration:underline;"> &nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $status; ?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b</span><br>
        </p>
        <p align="justify" style="margin-left: 8%; margin-right: 10%; line-height: 1.5; text-indent: 50px;">
            DATE OF BIRTH: <span style="text-decoration:underline;"> &nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $stay; ?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span> <br>
        </p>
        <p align="justify" style="margin-left: 8%; margin-right: 10%; line-height: 1.5; text-indent: 50px;">
            POSTAL ADDRESS: <span style="text-decoration:underline;"> &nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $postal; ?>     , <?php echo $zone; ?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>Puncan, Carranglan Nueva Ecija <br>
        </p>
        

        <p align="justify" style="margin-left: 10%; margin-right: 10%; line-height: 1.5; text-indent: 50px; font-family: 'Comic Neue',cursive;font-weight: 600;font-style: italic;">
            This Certificate of Residency is issued upon his/her request, this <u> &nbsp; <?php echo date('jS');?></u>,day  of <u><?php echo date('F'); ?> ,</u>&nbsp;2024.
            Here at Barangay of Puncan, Carranglan, Nueva Ecija.
        </p>
        <br><br><br><br><br>
        <div style="text-align: right; margin-right:5rem;">
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
    </div>
</body>
<center>
        <input type="button" name="submit" onclick="window.print()" value="PRINT"><br><br>

        <a href="certificate.php">BACK</a>
    </center><br>
</html>