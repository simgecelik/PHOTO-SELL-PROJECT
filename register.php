<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('MySQLe bağlantı başarısız: ' . mysqli_connect_error());
}
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	exit('Lütfen kayıt formunu doldurunuz!');
}
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	exit('Lütfen kayıt formunu doldurunuz!');
}


if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Lütfen geçerli bir mail adresi giriniz!');
}
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Geçersiz kullanıcı adı!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Şifre 5-20 karakter arası olmalıdır!');
}
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		
	} else {
      if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
	 $stmt->bind_param('sss', $_POST['username'], $_POST['password'], $_POST['email']);
	 $stmt->execute();
	echo 'Sisteme kaydınız başarıyla gerçekleşmiştir';
} else {
	echo 'Hata';
}
	}
	$stmt->close();
} else {
	echo 'Hata';
}
$con->close();
?>