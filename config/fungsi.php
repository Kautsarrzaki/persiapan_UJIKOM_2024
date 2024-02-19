<?php
require "config/koneksi.php";

//kategori buku
class Fungsi {
    public function viewKategori(){
        $cek = new Koneksi;
        $sql = "SELECT * FROM Kategoribuku";
        $query = mysqli_query($cek->koneksi(),$sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
        $select[] = $d;}
        return $select;
    }
    public function tambahKategori($NamaKategori){
        $cek = new Koneksi;
        $sql = "INSERT INTO kategoribuku VALUES (null, '$NamaKategori')" ;
        $hitung = mysqli_num_rows(mysqli_query($cek->koneksi(), "SELECT * FROM kategoribuku WHERE NamaKategori = '$NamaKategori'"));
        
        if ($hitung < 1){
            $query = mysqli_query($cek->koneksi(), $sql);
                echo "<script>";
                echo 'alert(" Berhasil Ditambahkan!"); ' ;
                echo 'window.location.href = "dashboard.php?page=kategoribuku";';
                echo '</script>';
                // echo '<script>window.location="dashboard.php?page=kategoribuku"</script>';
        }else{
             echo "<script>";
             echo 'alert("Tambah Kategori Berhasil!"); ' ;
             echo 'window.location.href = "dashboard.php?page=kategoribuku";';
             echo '</script>';  
            //  echo '<script>window.location="dashboard.php?page=kategoribuku"</script>';

        }
    }
    public function editKategori($KategoriID)
    {
        $cek = new Koneksi;
        $sql = "SELECT * FROM kategoribuku WHERE KategoriID = '$KategoriID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        $data = mysqli_fetch_assoc($query);

        return $data;

            echo "<script>";
            // echo 'alert("Kategori gagal ditambahkan");';
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=kategoribuku"</script>';

    }
    public function updateKategori($KategoriID, $NamaKategori)
    {
        $cek = new Koneksi;
        $sql = "UPDATE kategoribuku SET NamaKategori = '$NamaKategori' WHERE KategoriID='$KategoriID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        if($query){
            echo "<script>";
            // echo 'alert("berhasil edit data");';
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=kategoribuku"</script>';

         }else{
            echo "<script>";
            // echo 'alert("berhasil edit data");';
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=kategoribuku"</script>';

         }
    }
        
    public function hapusKategori($KategoriID)
    {
        $cek = new Koneksi;
        $sql = "DELETE FROM kategoribuku WHERE KategoriID = '$KategoriID'";
        $query = mysqli_query($cek->koneksi(), $sql);
        
        echo "<script>";
        // echo 'alert("Kategori berhasil dihapus"); ' ;
        // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
        echo '</script>';

        echo '<script>window.location="dashboard.php?page=kategoribuku"</script>';
    }



    //data buku
    public function viewbuku(){
        $cek = new Koneksi;
        $sql = "SELECT * FROM buku";
        $query = mysqli_query($cek->koneksi(),$sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
        $select[] = $d;}
        return $select;
    }

    public function katbuku($BukuID){
        $set = new Koneksi;
        $sql = "SELECT * FROM kategoribuku_relasi LEFT JOIN kategoribuku ON kategoribuku_relasi.KategoriID=kategoribuku.KategoriID WHERE kategoribuku_relasi.BukuID='$BukuID'";
        $query = mysqli_query($set->koneksi(), $sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
            $select[] = $d;}
            return $select;
    }

    public function tambahdatabuku($Judul, $Penulis, $Penerbit, $TahunTerbit, $Kategori){
        $set = new Koneksi;
        $sql = "INSERT INTO buku VALUES (NULL,'$Judul', '$Penulis', '$Penerbit', '$TahunTerbit')";

        mysqli_query($set->koneksi(), $sql);
        $buk = "SELECT * FROM buku order by BukuID desc limit 1";
        $qkat = mysqli_query($set->koneksi(), $buk);
        $data = mysqli_fetch_assoc($qkat);
        $BukuID = $data['BukuID'];

        // foreach($data as $k){
            $sql2 = "INSERT INTO kategoribuku_relasi VALUES (NULL,'$BukuID', '$Kategori')";
            var_dump($sql2);
            $query2 = mysqli_query($set->koneksi(), $sql2);
        // }
        if($query2){
            echo "<script>";
            echo 'alert("Berhasil Tambah Data!");';
           echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
        } else {
            echo "<script>";
            echo 'alert("Berhasil Tambah Data!");';
            echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
        }
    }
    public function editdatabuku($BukuID)
    {
        $cek = new Koneksi;
        $sql = "SELECT * FROM buku WHERE BukuID = '$BukuID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        $data = mysqli_fetch_assoc($query);

        return $data;

            echo "<script>";
            // echo 'alert("Buku gagal ditambahkan"); ' ;
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=databuku"</script>';

    }
    public function updatedatabuku($BukuID, $Judul, $Penulis, $Penerbit, $TahunTerbit)
    {
        $cek = new Koneksi;
        $sql = "UPDATE buku SET Judul = '$Judul', Penulis = '$Penulis', Penerbit = '$Penerbit', TahunTerbit = '$TahunTerbit' WHERE BukuID='$BukuID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        if($query){
            echo "<script>";
            // echo 'alert("berhasil edit data");';
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=databuku"</script>';

         }else{
            echo "<script>";
            // echo 'alert("berhasil edit data");';
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
         }
         echo '<script>window.location="dashboard.php?page=databuku"</script>';

    }
    public function hapusdatabuku($BukuID)
    {
        $cek = new Koneksi;
        $sql = "DELETE FROM buku WHERE BukuID = '$BukuID'";
        $query = mysqli_query($cek->koneksi(), $sql);
        
        echo "<script>";
        // echo 'alert("Buku berhasil dihapus"); ' ;
        // echo 'window.location.href = "dashboard.php?page=databuku";';
        echo '</script>';

        echo '<script>window.location="dashboard.php?page=databuku"</script>';
    }
    public function ajukanpinjam($UserID, $BukuID, $TanggalPeminjaman, $TanggalPengembalian){
        $TanggalPengembalian = date('Y-m', strtotime($TanggalPeminjaman)).'-'.date('d', strtotime($TanggalPengembalian)) + 3;
        $set = new Koneksi;
        $sql = "INSERT INTO peminjaman VALUES (NULL, '$UserID', '$BukuID', '$TanggalPeminjaman', '$TanggalPengembalian', 'wait')";
        $query = mysqli_query($set->koneksi(), $sql);
        if($query){
            echo "<script>";
            echo 'alert("Berhasil Pinjam Buku menunggu persetujuan!");';
            echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
        } else {
            echo "<script>";
            echo 'alert("Gagal Pinjam Buku!");';
            echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
        }
    }
//koleksi
public function viewkoleksi(){
    $set = new Koneksi;
    $UserID = $_SESSION['data']['UserID'];
    $sql = "SELECT * FROM koleksipribadi LEFT JOIN user ON koleksipribadi.UserID=user.UserID LEFT JOIN buku ON koleksipribadi.BukuID=buku.BukuID LEFT JOIN peminjaman ON koleksipribadi.UserID=peminjaman.UserID WHERE koleksipribadi.UserID='$UserID'";
    $query = mysqli_query($set->koneksi(), $sql);
    $select = [];
    while($d = mysqli_fetch_assoc($query)){
        $select[] = $d;}
        return $select;
}


//ulasan buku


public function viewulasanbuku(){
    $cek = new Koneksi;
    $sql = "SELECT * FROM ulasanbuku LEFT JOIN user ON ulasanbuku.UserID=user.UserID LEFT JOIN buku ON ulasanbuku.
    BukuID=buku.BukuID";
    $query = mysqli_query($cek->koneksi(),$sql);
    $select = [];
    while($d = mysqli_fetch_assoc($query)){
    $select[] = $d;
}
    return $select;
}

public function ulasanbuku($UserID,$BukuID,$Ulasan,$Rating)
{
    $cek = new Koneksi;
    $sql = "INSERT INTO ulasanbuku VALUES (null,'$UserID','$BukuID','$Ulasan','$Rating')";
    // $query = mysqli_query($cek->koneksi(), $sql);
    $ulasan = mysqli_num_rows (mysqli_query($cek->Koneksi(), "SELECT * FROM ulasanbuku WHERE UserID = '$UserID'"));

    if ($ulasan < 1){
        $query = mysqli_query($cek->koneksi(), $sql);
            echo "<script>";
            // echo 'alert("Buku berhasil ditambahkan"); ' ;
            // echo 'window.location.href = "dashboard.php?page=ulasanbuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=ulasabuku"</script>';

        }else{
            echo "<script>";
            // echo 'alert("Buku gagal ditambahkan"); ' ;
            // echo 'window.location.href = "dashboard.php?page=ulasanbuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=ulasanbuku"</script>';


        }
    }

    public function postulasanbuku($UserID, $BukuID, $Ulasan, $Rating){
        $set = new Koneksi;
        $sql = "INSERT INTO ulasanbuku VALUES (0, '$UserID', '$BukuID', '$Ulasan', '$Rating')";
        // var_dump($sql);
        $query = mysqli_query($set->koneksi(), $sql);
        
        if($query){
            echo "<script>";
            echo 'alert("Berhasil Memberikan Ulasan!");';
            echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
        } else {
            echo "<script>";
            echo 'alert("Gagal Memberikan Ulasan!");';
            echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
        }
    }

    public function editulasanbuku($UlasanID)
    {
        $cek = new Koneksi;
        $sql = "SELECT * FROM ulasanbuku WHERE UlasanID = '$UlasanID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        $data = mysqli_fetch_assoc($query);

        return $data;

            echo "<script>";
            // echo 'alert("Buku gagal ditambahkan"); ' ;
            // echo 'window.location.href = "dashboard.php?page=ulasanbuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=ulasanbuku"</script>';

    }
    public function updateulasanbuku($UlasanID,$UserID,$BukuID,$Ulasan,$Rating)
    {
        $cek = new Koneksi;
        $sql = "UPDATE ulasanbuku SET UserID = '$UserID', BukuID = '$BukuID', Ulasan = '$Ulasan', Rating = '$Rating' WHERE UlasanID='$UlasanID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        if($query){
            echo "<script>";
            // echo 'alert("berhasil edit ulasan");';
            // echo 'window.location.href = "dashboard.php?page=ulasanbuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=ulasanbuku"</script>';

         }else{
            echo "<script>";
            // echo 'alert("berhasil edit ulasan");';
            // echo 'window.location.href = "dashboard.php?page=ulasanbuku";';
            echo '</script>';
         }
         echo '<script>window.location="dashboard.php?page=ulasanbuku"</script>';

    }
    public function hapusulasanbuku($UlasanID)
    {
        $cek = new Koneksi;
        $sql = "DELETE FROM ulasanbuku WHERE UlasanID = '$UlasanID'";
        $query = mysqli_query($cek->koneksi(), $sql);
        
        echo "<script>";
        // echo 'alert("Ulasan berhasil dihapus"); ' ;
        // echo 'window.location.href = "dashboard.php?page=ulasanbuku";';
        echo '</script>';

        echo '<script>window.location="dashboard.php?page=ulasanbuku"</script>';
    }


    //peminjaman

    public function viewpeminjaman(){
        $set = new Koneksi;
        $sql = "SELECT * FROM peminjaman LEFT JOIN user ON peminjaman.UserID=user.UserID LEFT JOIN buku ON peminjaman.BukuID=buku.BukuID";
        $query = mysqli_query($set->koneksi(), $sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
            $select[] = $d;}
            return $select;
    }
    
    public function peminjaman($UserID,$BukuID,$TanggalPeminjaman,$TanggalPengembalian,$StatusPeminjaman)
    {
        $cek = new Koneksi;
        $sql = "INSERT INTO peminjaman VALUES (null,'$UserID','$BukuID','$TanggalPeminjaman','$TanggalPengembalian','$StatusPeminjaman')";
        // $query = mysqli_query($cek->koneksi(), $sql);
        $ulasan = mysqli_num_rows (mysqli_query($cek->Koneksi(), "SELECT * FROM peminjaman WHERE UserID = '$UserID'"));
    
        if ($ulasan < 1){
            $query = mysqli_query($cek->koneksi(), $sql);
                echo "<script>";
                // echo 'alert("Buku berhasil ditambahkan"); ' ;
                // echo 'window.location.href = "dashboard.php?page=peminjaman";';
                echo '</script>';
                echo '<script>window.location="dashboard.php?page=peminjaman"</script>';
    
            }else{
                echo "<script>";
                // echo 'alert("Buku gagal ditambahkan"); ' ;
                // echo 'window.location.href = "dashboard.php?page=peminjaman";';
                echo '</script>';
                echo '<script>window.location="dashboard.php?page=peminjaman"</script>';
    
    
            }
        }

        public function ajukanpeminjaman($UserID, $BukuID, $TanggalPeminjaman){
            $TanggalPengembalian = date('Y-m', strtotime($TanggalPeminjaman)).'-'.date('d', strtotime($TanggalPeminjaman)) + 3;
            $set = new Koneksi;
            $sql = "INSERT INTO peminjaman VALUES (NULL, '$UserID', '$BukuID', '$TanggalPeminjaman', '$TanggalPengembalian', 'wait')";
            $query = mysqli_query($set->koneksi(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Pinjam Buku menunggu persetujuan!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Pinjam Buku!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            }
        }
        public function konfirmasipeminjaman($PeminjamanID,$UserID,$BukuID,$TanggalPengembalian){
            $set = new Koneksi;
            $sql = "UPDATE peminjaman SET UserID='$UserID', BukuID='$BukuID',TanggalPengembalian='$TanggalPengembalian',StatusPeminjaman='pinjam' WHERE PeminjamanID='$PeminjamanID'";
            $query = mysqli_query($set->koneksi(), $sql);

            $sql2 = "insert into koleksipribadi VALUES (NULL, '$UserID', '$BukuID')";
            $query2 = mysqli_query($set->koneksi(), $sql2);
            if($query2){
                echo "<script>";
                echo 'alert("Berhasil konfirmasi dan masuk ke Koleksi Pribadi User!");';
                echo 'window.location.href = "dashboard.php?page=peminjaman";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal konfirmasi!");';
                echo 'window.location.href = "dashboard.php?page=peminjaman";';
                echo '</script>';
            }
        }
        public function konfirmasipengembalian($PeminjamanID){
            $set = new Koneksi;
            $sql = "update peminjaman SET StatusPeminjaman='selesai' WHERE PeminjamanID='$PeminjamanID'";
            $query = mysqli_query($set->koneksi(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Konfirmasi!");';
                echo 'window.location.href = "dashboard.php?page=peminjaman";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Konfirmasi!");';
                echo 'window.location.href = "dashboard.php?page=peminjaman";';
                echo '</script>';
            }
        }
        public function hapuspeminjaman($PeminjamanID)
        {
            $cek = new Koneksi;
            $sql = "DELETE FROM peminjaman WHERE PeminjamanID = '$PeminjamanID'";
            $query = mysqli_query($cek->koneksi(), $sql);
            
            echo "<script>";
            // echo 'alert("Peminjaman berhasil dihapus"); ' ;
            // echo 'window.location.href = "dashboard.php?page=peminjaman";';
            echo '</script>';
    
            echo '<script>window.location="dashboard.php?page=peminjaman"</script>';
        }
    

}