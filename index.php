<?php
 include('config/auth.php');
 $cek = new Auth;
 
    include('layout/auth/header.php');

     if(!isset($_GET['page'])){
      echo "<script>";
      echo "alert('Harus Login Dulu!');";
        echo "window.location.href ='index.php?page=login';";
        echo "</script>";
     }

     
     if($_GET['page'] == 'login'){
        include('login.php');
     } elseif ($_GET['page'] == 'register'){
       include('register.php');
     } elseif($_GET['page'] == 'postlogin'){
     $cek->login($_POST['email'],$_POST['password']);
     } elseif($_GET['page'] == 'postregister'){
    $cek->register($_POST['userid']=0,
                  $_POST['username'],
                 password_hash($_POST['password'],PASSWORD_DEFAULT),
                  $_POST['email'],
                  $_POST['namalengkap'],
                  $_POST['alamat'],
                  $_POST['role']);}
    elseif($_GET['page'] == 'logout'){
    $cek->logout();
     }

     include('layout/auth/footer.php');
?>