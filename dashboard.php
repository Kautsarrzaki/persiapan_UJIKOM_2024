<?php 
session_start();
require('config/fungsi.php');
$fung = new Fungsi;
if(!isset($_SESSION['data'])){
    echo "<script>";
    echo "alert('Harus Login Dulu!');";
      echo "window.location.href ='index.php?page=login';";
      echo "</script>";
}
require('layout/dashboard/header.php');


if($_GET['page'] == 'admin'){
    include('auth/user.php');
} elseif($_GET['page'] == 'petugas'){
    include('auth/user.php');
} elseif($_GET['page'] == 'user'){
    include('auth/user.php');
}


//kategori buku
elseif($_GET['page'] == 'kategoribuku'){
    include('auth/kategoribuku.php');
} elseif($_GET['page'] == 'viewKategori'){
    $fung->viewKategori();
}elseif ($_GET['page'] == 'postKategori'){
    $NamaKategori = $_POST ['NamaKategori'];
    $fung->tambahKategori($NamaKategori);
}elseif($_GET['page'] == 'editKategori'){
    $KategoriID = $_POST ['KategoriID'];
    $fung->editKategori($KategoriID);
}elseif($_GET['page'] == 'updateKategori'){
    $KategoriID = $_POST ['KategoriID'];
    $NamaKategori = $_POST ['NamaKategori'];
    $fung->updateKategori($KategoriID, $NamaKategori);
}elseif($_GET['page'] == 'hapusKategori'){
    $fung->hapusKategori($_GET['KategoriID']);
}
//data buku
elseif($_GET['page'] == 'databuku'){
    include('auth/databuku.php');
} elseif($_GET['page'] == 'viewbuku'){
    $fung->viewbuku();
}elseif ($_GET['page'] == 'postdatabuku') {
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $Kategori = $_POST['Kategori'];
    $fung->tambahdatabuku($Judul, $Penulis, $Penerbit, $TahunTerbit, $Kategori);
}elseif($_GET['page'] == 'editdatabuku'){
    $BukuID = $_POST ['BukuID'];
    $Judul = $_POST ['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $Kategori = $_POST['Kategori'];
    $fung->editdatabuku($BukuID);
}elseif($_GET['page'] == 'updatedatabuku'){
    $BukuID = $_POST ['BukuID'];
    $Judul = $_POST ['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $Kategori = $_POST['Kategori'];
    $fung->updatedatabuku($BukuID, $Judul, $Penulis, $Penerbit, $TahunTerbit, $Kategori);
}elseif($_GET['page'] == 'hapusdatabuku'){
    $fung->hapusdatabuku($_GET['BukuID']);
}elseif($_GET['page'] == 'ajukanpinjam'){
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST ['BukuID'];
    $tanggalPeminjaman = $_POST['TanggalPeminjaman'];
    $tanggalPengembalian = $_POST['TanggalPengembalian'];
    $fung->ajukanpinjam($UserID, $BukuID, $TanggalPeminjaman, $TanggalPengembalian);
}

//peminjaman
elseif($_GET['page'] == 'peminjaman'){
    include('auth/peminjaman.php');
} elseif($_GET['page'] == 'viewpeminjaman'){
    $fung->viewpeminjaman();
}elseif($_GET['page'] == 'konfirmasipeminjaman'){
    $PeminjamanID = $_POST ['PeminjamanID'];
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST['BukuID'];
    $TanggalPengembalian = $_POST['TanggalPengembalian'];
    $fung->konfirmasipeminjaman($PeminjamanID,$UserID,$BukuID,$TanggalPengembalian);
}elseif($_GET['page'] == 'ajukanpeminjaman'){
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST['BukuID'];
    $TanggalPeminjaman = $_POST['TanggalPeminjaman'];
    $fung->ajukanpeminjaman($UserID,$BukuID,$TanggalPeminjaman);
}elseif($_GET['page'] == 'konfirmasipengembalian'){
    $PeminjamanID = $_POST ['PeminjamanID'];
    $fung->konfirmasipengembalian($PeminjamanID);
}elseif($_GET['page'] == 'hapuspeminjaman'){
    $fung->hapuspeminjaman($_GET['PeminjamanID']);
}



//ulasan buku
elseif($_GET['page'] == 'ulasanbuku'){
    include('auth/ulasanbuku.php');
} elseif($_GET['page'] == 'viewulasanbuku'){
    $fung->viewulasanbuku();
}elseif($_GET['page'] == 'editulasanbuku'){
    $UlasanID = $_POST ['UlasanID'];
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];
    $fung->editulasanbuku($UlasanID);
}elseif($_GET['page'] == 'updateulasanbuku'){
    $UlasanID = $_POST ['UlasanID'];
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];
    $fung->updateulasanbuku($UlasanID, $UserID, $BukuID, $Ulasan, $Rating);
}elseif($_GET['page'] == 'postulasanbuku'){
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['ulasan'];
    $Rating = $_POST['rating'];
    $fung->postulasanbuku($UserID, $BukuID, $Ulasan, $Rating);
}elseif($_GET['page'] == 'hapusulasanbuku'){
    $fung->hapusulasanbuku($_GET['UlasanID']);
}
// print
elseif($_GET['page'] == 'printlaporan'){
    include('auth/print.php');
}

// koleksi
elseif($_GET['page'] == 'koleksi'){
    include('auth/koleksi.php');
}elseif($_GET['page'] == 'viewkoleksi'){
    $fung->viewkoleksi();
}
include "layout/dashboard/footer.php";