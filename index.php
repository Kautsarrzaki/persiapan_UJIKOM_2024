<?php
include('config/auth.php');
$cek = new Auth;

if (isset($_SESSION['data'])) {
    header('location: dashboard.php?page=' . $_SESSION['data']['Role']);
}

include('layout/auth/header.php');

if (!isset($_GET['page'])) {
    echo "<script>";
    echo "alert('Harus Login Dulu!');";
    echo "window.location.href ='index.php?page=login';";
    echo "</script>";
}

if ($_GET['page'] == 'login') {
    include('login.php');
} elseif ($_GET['page'] == 'register') {
    include('register.php');
} elseif ($_GET['page'] == 'postlogin') {
    $cek->login($_POST['email'], $_POST['password']);
} elseif ($_GET['page'] == 'logout') {
    $cek->logout();
}

if ($_GET['page'] == 'postregister') {
    if (!isset($_POST['Username'])) {
      echo "<script>window.location='index.php'</script>";
    } else {

       $data['Username'] = $_POST['Username'];
       $data['Password'] = $_POST['Password'];
       $data['Email'] = $_POST['Email'];
       $data['NamaLengkap'] = $_POST['NamaLengkap'];
       $data['Alamat'] = $_POST['Alamat'];
       $cek->register($data);
    }
}

include('layout/auth/footer.php');
?>
