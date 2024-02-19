<?php
class Koneksi
{
    public function koneksi(){
        $kon = mysqli_connect('localhost','root','','db_perpustakaan');
        return $kon;
    }
}