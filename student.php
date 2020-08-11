<?php
session_start();

function getAllData()
{
    return $_SESSION['students'] = isset($_SESSION['students']) ? $_SESSION['students'] : array();
}
function addAndUpdateDate()
{
    $mssvErr = $fNameErr = $emailErr = '';
    $check_update = !empty($_GET['id']) ? true : false;

    if (isset($_GET['submit'])) {
        $infoStudent = checkData($_GET['mssv'], $_GET['fname'], $_GET['email']);
        $mssvErr = $infoStudent[0] === false ? '* Nhập lại MSSV' : '';
        $fNameErr = $infoStudent[1] === false ? '* Nhập lại Họ và Tên' : '';
        $emailErr = $infoStudent[2] === false ? '* Nhập lại email' : '';

        if ($infoStudent[0] && $infoStudent[1] && $infoStudent[2]) {
            if ($check_update) {
                $_SESSION['students'] = array_replace($_SESSION['students'], array($_GET['id'] => $infoStudent));
            } else {
                array_push($_SESSION['students'], $infoStudent);
            }

            header("Location:index.php");
        }
    }
    return array($mssvErr, $fNameErr, $emailErr);
}
function delData()
{
    if (isset($_GET['del_student'])) {
        $key = $_GET['get_del_student'];
        unset($_SESSION['students'][$key]);
        header("Location:index.php");
    }
}
function checkData($mssv, $fname, $email)
{
    $mssv = !empty($mssv) && (filter_var($mssv, FILTER_VALIDATE_INT) === 0 || !filter_var($mssv, FILTER_VALIDATE_INT) === false) ? $mssv : false;
    $fname = !empty($fname) && !preg_match(" /[^a-zA-Z ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u", $fname) ? filter_var($fname, FILTER_SANITIZE_STRING) : false;
    $email = !empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false ? filter_var($email, FILTER_SANITIZE_EMAIL) : false;

    return array($mssv, $fname, $email);
}
