<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) ;
if ( mysqli_connect_errno() ) {
	exit('Veritabanına bağlanma başarısız: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {

	exit('Lütfen kullanıcı adı ve şifre kısımlarını doldurun!');
}
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            if( $_SESSION['name'] == "Admin" ){
            header('Location: admin/admin.php');
            }
            else{
                header('Location: home3.php');
            }
        } else {
            echo 'Yanlış kullanıcı adı ya da şifre!';
        }
    } else {
        
        echo 'Yanlış kullanıcı adı ya da şifre!';
    }


	$stmt->close();
}
?>