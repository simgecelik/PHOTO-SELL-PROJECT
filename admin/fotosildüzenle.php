<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styleadmin.css" rel="stylesheet" type="text/css">
    <title>Document</title>

</head>

<style>

    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left; 
    
    
}

.styled-table td {
    padding: 18px 30px;
    text-align: center;
    vertical-align: middle;
    
}

.styled-table th {
    padding: 18px 30px;
    text-align: center;
    vertical-align: middle;
    
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
    text-align: center;
    vertical-align: middle;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
</style>


<body>


<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>FOTOĞRAF DÜNYASI</h1>
				<a href="admin.php"><i class="fas fa-home"></i>Ana Sayfa</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>

			</div>
		</nav>
 

<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) ;
$res = mysqli_query($con,"SELECT accounts.id AS kullanıcıid,accounts.username,images.id,images.image,images.photoname,images.price FROM accounts
   INNER JOIN images ON accounts.id = images.userid ");

while ($row= mysqli_fetch_array($res)){
    ?>
    <table style="border-collapse: collapse;border: 1px solid #69899F; align:center">
  <tr >
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Kullanıcı Id</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Kullanıcı Adı</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Fotoğraf Id</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Fotoğraf Adı</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Fiyatı</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Düzenle</th>
      <th style="border: 1px solid #69899F;color: #3E5260;padding:10px;">Sil</th>
  </tr>
  <tr>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['kullanıcıid']; ?></td>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['username']; ?></td>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['id'];?></td>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['photoname'];?></td>
      <td style="padding:15px;border: 1px  ;color: #002F5E;"><?php echo $row['price'];?></td>
      <td style="padding:15px;border: 1px ;color: #002F5E;"><a href="editfoto.php?id=<?php echo $row["id"];?>">Düzenle</a></td>
      <td style="padding:15px;border: 1px ;color: #002F5E;"><a href="deletefoto.php?id=<?php echo $row["id"];?>">Sil</a></td>
  </tr>
   <br>
</table>
    <?php

}







?>

    
</body>
</html>