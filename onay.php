<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="edit.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>FOTOĞRAF DÜNYASI</h1>
				<a href="admin.php"><i class="fas fa-home"></i>Ana Sayfa</a>
				<a href="index.html"><i class="fas fa-sign-out-alt"></i>Çıkış</a>

			</div>
		</nav>

<div class="container-fluid">
    <div class="row-fluid" style="...">
       <div class="span12">
           <div class="widget-box">
               <div class="widget-title"><span class="icon">
                   <i class="icon-align-justify"></i> </span>
                   <h5>Kart Bilgileri</h5>
</div>
<div class="widget-content nopadding">
    <form name="form1" action ="" method="post" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Kart Üzerindeki İsim:</label>
        <div class ="controls">
            <input type ="text" class="span11" name="kartsahibi"
            value=""/>
</div>
</div>

<div class="control-group">
            <label class="control-label">Kredi Kart Numarası</label>
            <div class ="controls">
            <input type ="text" class="span11"  name="kredikartı"
            value=""
            />
</div>
</div>

<div class="control-group">
            <label class="control-label">Son Kullanma Tarihi:</label>
            <div class ="controls">
            <input type ="text" class="span11" placeholder="Ay/Yıl" name="skt"
            value=""
            />
</div>
</div>

<div class="control-group">
            <label class="control-label">CVV2:</label>
            <div class ="controls">
            <input type ="password" class="span11" placeholder="***" name="cvv2"
            value=""/>
</div>
</div>



<div class="form-actions">
    <button type="submit" name="submit" class="btn btn-success">Onay</button>
</div>



</div>
</div>
</div>



<?php

 $id = $_GET["id"];

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) ;
$res = mysqli_query($con,"SELECT *FROM images where id=$id");

while ($row= mysqli_fetch_array($res)){
    $total=0;
    $total = $total + $row["price"];
    echo 'Tutar:'.$total;
}


?>



<?php 
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) ;
 if(isset($_POST["submit"])){
     mysqli_query($con,"DELETE from images where id=$id");
     echo '<script>alert("Satın Alma İşleminiz Başarıyla Gerçekleştirildi!")</script>';
				echo '<script>window.location="home3.php"</script>';
 }

?>