<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) ;

$id = $_GET["id"];
mysqli_query($con,"DELETE from images where id=$id");

?>

<script type="text/javascript">
    window.location = "admin.php";
</script>
