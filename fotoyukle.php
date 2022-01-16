<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="image.css" rel="stylesheet" type="text/css">
        <link href="home.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>

    <style>
		body{
			background-image: url("images/fotobg.jpeg");
			background-color: #cccccc;
            height: 500px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
			   
		}
	.container{
		display: flex;
		width:calc(100%);
		flex-wrap: wrap;
	}
	.container img{
	    width: calc(18%);
	    height: 15vw;
	    object-fit: contain;
	    background: gray;
	    border: 1px solid black;
	    margin: 5px;
	}
	form {
	width:400px;
	margin: 0 auto;
	padding-top: 0;
    margin-top: 50px;
	

}



</style>


	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>FOTOĞRAF DÜNYASI</h1>
				<?php session_start()?>
                <a href="home3.php"><i class="fas fa-home"></i>Ana Sayfa</a>
				
				<a href="profile.php?id=<?php echo $_SESSION['id'];?>"><i class="fas fa-user-circle"></i>Profil</a>
				<a href="fotoyukle.php"><i class="fas fa-camera"></i>Fotoğraf Yükle</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>

			</div>
		</nav>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	Fotoğraf Adı:  <input type="text"  name="photoname" placeholder="Fotoğraf adını giriniz" ><br>
	Satış Fiyatı: <input type="text" name="price" placeholder="Satış fiyatını giriniz" ><br>
    <label>Yüklenecek Fotoğrafı Seçiniz:</label>
    <input type="file" name="image"><input type="submit" name="submit" value="Yükle">
</form>
	</body>
</html>

