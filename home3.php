<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$connect = mysqli_connect("localhost", "root", "", "phplogin");
require_once 'dbConfig.php'; 

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Fotoğraf, Alınacaklar Listesine Çoktan Eklendi")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Fotoğraf, Listeden Kaldırıldı")</script>';
				echo '<script>window.location="home3.php"</script>';
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<link href="home.css" rel="stylesheet" type="text/css">
		<link href="image.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>

<style>
   body {
   
           background-size: 100% 100%; 
           background-image: url("images/sky4.jfif");
		   background-color: #cccccc;
		   height: 500px;
		   background-position: center;
		   background-repeat: no-repeat;
		   background-size: cover;
		   position: relative;
		   
}
</style>

	
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>FOTOĞRAF DÜNYASI</h1>
				<a href="profile.php?id=<?php echo $_SESSION['id'];?>"><i class="fas fa-user-circle"></i>Profil</a>
				<a href="fotoyukle.php"><i class="fas fa-camera"></i>Fotoğraf Yükle</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>

			</div>
		</nav>
		<div class="content">
			<h2>Hoşgeldin, <?=$_SESSION['name']?>!</h2>
		</div>


     <div class="container" >
			 <?php 
             $query = "SELECT * FROM images ORDER BY id ASC ";
             $result = mysqli_query($connect, $query);
             if(mysqli_num_rows($result) > 0)
             {
                 while($row = mysqli_fetch_array($result))
                 {
             ?>

      <div class="col-md-4">
         <form method="post" action="home3.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#fffff; border-radius:5px; padding:16px;" align="center">
					<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="img-responsive" /><br />

						<h4 class="text-info">Fotoğraf Adı:<?php echo $row["photoname"]; ?></h4>
						<h4 class="text-danger"> Fotoğraf Fiyatı: <?php echo $row["price"] ; ?></h4>
                        <input type="hidden" name="id_director" value="<?= $id ?>" />
						<input type="hidden" name="id_director" value="<?= $id ?>" />
                        <input type="hidden" name="hidden_name" value="<?php echo $row["photoname"]; ?>" />
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Satın Al" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>


<div style="clear:both"></div>
			<br />
			<h3>Alınacaklar Listesi</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Fotoğraf</th>
						<th width="20%">Fiyat</th>
						<th width="15%">Toplam</th>
						<th width="5%">Kaldır</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>

					
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_price"]; ?> TL</td>
						<td><?php echo number_format($values["item_price"], 2);?> TL</td>
						<td><a href="onay2.php?action=onay&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Onayla</span></a></td>
						<td><a href="home3.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Kaldır</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_price"]);
						}
					?>
					<tr>
						<td colspan="2" align="right">Toplam</td>
						<td align="right"><?php echo number_format($total, 2); ?> TL</td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	<br />

	
	</body>
</html>
