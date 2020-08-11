<?php
require_once 'student.php';
getAllData();
delData();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<style>
  input[type=submit] {
    width: 50px;
    background-color: #58257b;
    color: white;
    /* padding: 14px 20px; */
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type=button] {
    width: 20%;
    background-color: #58257b;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  .center{
    margin: 20px;
  }
</style>
</head>
<body class="center">
<a href="add_student.php"><input type="button" value="Thêm"></a><br>
<table id="table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>MSSV</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th class="edit">Edit</th>
                <!-- <th>Start date</th>
                <th>Salary</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
if (isset($_SESSION['students'])) {
    foreach ($_SESSION['students'] as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value[0] . '</td>';
        echo '<td>' . '<a href="add_student.php?id=' . $key . '">' . $value[1] . '</a>' . '</td>';
        echo '<td>' . $value[2] . '</td>';
        echo '<td><form mothod="get"><input type="hidden" value="' . $key . '" name="get_del_student">';
        echo '<input type="submit" value="Del" name="del_student">';
        echo '</form></td>';
        echo '</tr>';
    }
}
?>
        </tbody>
    </table>
</body>
<script>
  $(document).ready(function() {
    $('#table').DataTable( {
      "columnDefs": [ {
        "targets": 3,
        "orderable": false
      } ]
    } );
  } );
</script>
</html>
