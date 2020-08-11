<?php
require_once 'student.php';
$error = addAndUpdateDate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .error {color: #FF0000;}
    input[type=text] {
        width: 50%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #e9d8f4;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }
    input[type=text]:focus {
        border: 3px solid #58257b;
    }
    input[type=submit] {
        width: 20%;
        background-color: #58257b;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<body>
<form method="get" >
<label for="mssv">MSSV</label>
<input type="text" id="mssv" name="mssv" value="<?php echo isset($_GET['id']) && $_GET['id'] !=='' ? $_SESSION['students'][$_GET['id']][0] : '' ?>">
<span class="error"><?php echo $error[0]; ?></span><br>
<label for="fname">Họ và Tên</label>
<input type="text" id="fname" name="fname" value="<?php echo isset($_GET['id']) && $_GET['id'] !=='' ? $_SESSION['students'][$_GET['id']][1] : '' ?>">
<span class="error"><?php echo $error[1]; ?></span><br>
<label for="email">Email</label>
<input type="text" id="email" name="email" value="<?php echo isset($_GET['id']) && $_GET['id'] !=='' ? $_SESSION['students'][$_GET['id']][2] : '' ?>">
<span class="error"><?php echo $error[2]; ?></span>
<input type="hidden" id="id" name="id" value="<?php echo isset($_GET['id']) && $_GET['id'] !=='' ? $_GET['id'] : '' ?>"><br>
<input type="submit" value="Submit" name="submit">
</form>
</body>
</html>
