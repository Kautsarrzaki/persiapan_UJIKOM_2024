<?php
session_start();
require('config/koneksi.php');
$cek = new Koneksi;
class Auth{

    public function register($UserId, $Username, $Password, $Email, $NamaLengkap, $Alamat, $Role){

        $cek = new Koneksi;
         $sql = "INSERT INTO user VALUES ($UserId, '$Username', '$Password','$Email','$NamaLengkap','$Alamat','$Role')";
         $query = mysqli_query($cek->koneksi(), $sql);
 
         if ($query) {
             echo "<script>alert('Data Berhasil Ditambahkan');window.location='index.php?page=login'</script>";
      } else {
             echo "data gagal ditambahkan";
      }
 }
    public function login($email, $password){
        $cek = new Koneksi;
        $sql = "select * from user WHERE email = '$email'";
        $query = mysqli_query($cek->koneksi(), $sql);
        $data = mysqli_fetch_assoc($query);
        $datapassword = isset($data['Password']) ? $data['Password'] : "";
    if(password_verify($password, $datapassword)){

        if($data['Role'] == 'admin'){
            $_SESSION['data'] = $data;
            header('location: dashboard.php?page=user');

        }elseif($data['Role'] == 'petugas'){
            $_SESSION['data'] = $data;
            header('location: dashboard.php?page=user');

        } else {
            $_SESSION['data'] = $data;
            header('location: dashboard.php?page=user');
        }
    } else {
         echo "<script>";
       echo "alert('Login Gagal!');";
         echo "window.location.href ='index.php?page=login';";
         echo "</script>";
    }
    }
    public function logout()
    {
        session_destroy();
        header('location: index.php');
        echo "<script>";
       echo "alert('Berhasil Logout!');";
         echo "window.location.href ='index.php?page=login';";
         echo "</script>";
    }

}