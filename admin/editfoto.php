<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) ;
$id = $_GET["id"];
$photoname="";
$price="";
$res= mysqli_query($con,"SELECT *from images where id=$id");
while ($row= mysqli_fetch_array($res)){
    $photoname= $row["photoname"];
    $price=$row["price"];
    

}

?>

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
                   <h5>Fotoğraf Bilgileri Güncelleme</h5>
</div>
<div class="widget-content nopadding">
    <form name="form1" action ="" method="post" class="form-horizontal">


<div class="control-group">
            <label class="control-label">Photo Name:</label>
            <div class ="controls">
            <input type ="text" class="span11" placeholder="Fotoğraf Adı" name="photoname"
            value="<?php echo $photoname; ?>"
            />
</div>
</div>

<div class="control-group">
            <label class="control-label">Price:</label>
            <div class ="controls">
            <input type ="text" class="span11" placeholder="Fiyatı" name="price"
            value="<?php echo $price; ?>"/>
</div>
</div>




<div class="form-actions">
    <button type="submit" name="submit" class="btn btn-success">Güncelle</button>
</div>



</div>
</div>
</div>


<?php 
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) ;
 if(isset($_POST["submit"])){
     mysqli_query($con,"UPDATE images SET photoname='$_POST[photoname]',price='$_POST[price]' where id=$id ")
     or die (mysqli_error($con));
     header("Location: fotosildüzenle.php");
 }

?>




