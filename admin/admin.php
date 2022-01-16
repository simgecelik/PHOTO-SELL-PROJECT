<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styleadmin.css" rel="stylesheet" type="text/css">
    <title>Document</title>

</head>




<body>


<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>FOTOĞRAF DÜNYASI</h1>
				<a href="admin.php"><i class="fas fa-home"></i>Ana Sayfa</a>
                <a href="../fotoyukle.php"><i class="fas fa-home"></i>Fotoğraf Ekle</a>
                <a href="fotosildüzenle.php"><i class="fas fa-home"></i>Fotoğraf Düzenle/Sil</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>

			</div>
		</nav>
 


<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) ;
$res = mysqli_query($con,"SELECT *from accounts ");

while ($row= mysqli_fetch_array($res)){
    ?>

<table style="border-collapse: collapse;border: 1px solid #69899F; align:center">
  <tr >
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Kullanıcı Adı</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Kullanıcı İd</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Şifre</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Mail</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Düzenle</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Sil</th>
  </tr>
  <tr>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['username']; ?></td>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['id']; ?></td>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['password'];?></td>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['email'];?></td>
      <td style="padding:15px;border: 1px ;color: #002F5E;"><a href="edit.php?id=<?php echo $row["id"];?>">Düzenle</a></td>
      <td style="padding:15px;border: 1px ;color: #002F5E;"><a href="delete.php?id=<?php echo $row["id"];?>">Sil</a></td>
  </tr>
   <br>




    
    <?php

}


?>

    
</body>
</html>