<?php
session_start();
$id=$_GET['id'];
$connect = mysqli_connect("localhost", "root", "", "phplogin");
$result = mysqli_query($connect,"SELECT *FROM images WHERE userid=$id ORDER BY id DESC");


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="home.css" rel="stylesheet" type="text/css">
		<link href="image.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>

	<style>


   body {
   
           background-size: 100% 100%; 
           background-image: url("images/arı.jfif");
		   background-color: #cccccc;
		   height: 500px;
		   background-position: center;
		   background-repeat: no-repeat;
		   background-size: cover;
		   position: relative;
		   
}
	.container{
		display: flex;
		width:calc(500%);
		flex-wrap: wrap;
	}
	.container img{
	    width: calc(75%);
	    height: 15vw;
	    object-fit: cover;
	    margin: 65px;
	}

</style>

	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>FOTOĞRAF DÜNYASI</h1>
				<a href="home3.php"><i class="fas fa-home"></i>Ana Sayfa</a>
				<a href="fotoyukle.php"><i class="fas fa-camera"></i>Fotoğraf Yükle</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>
			</div>
		</nav>


     <div class="container" >
			 <?php if($result -> num_rows>0){
					while($row= $result->fetch_assoc()){
                ?>

<div class="col-md-4">
				<form method="post" >
					<div style="border:1px solid #333; background-color:#fffff; border-radius:5px; padding:16px;" align="center">
					<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="img-responsive" /><br />

						<h4 class="text-info">Fotoğraf Adı:<?php echo $row["photoname"]; ?></h4>
						<h4 class="text-danger"> Fotoğraf Fiyatı: <?php echo $row["price"] ; ?></h4>

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>

	
	</body>
</html>



