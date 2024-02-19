<div class="card">
    <div class="card-body"><h1> Data Buku </h1>
    <hr>
    <?php
    if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
        <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdatabuku">Tambah Buku
</button>
</div>
<?php } ?>
<div class="table-responsive">
</hr>

<div class="card-body"> 
    <table class= "table table-bordered" id="datatable" width="100%" cellspacing="0">
        <thead>
            <tr>
               <th>No</th>
               <th>Judul</th>
               <th>Penulis</th>
               <th>Penerbit</th>
               <th>Tahun Terbit</th>
               <th>Kategori</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
                foreach($fung->viewbuku() as $b){ ?> 
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b['Judul'] ?></td>
                    <td><?= $b['Penulis'] ?></td>
                    <td><?= $b['Penerbit'] ?></td>
                    <td><?= $b['TahunTerbit'] ?></td>
                    <td><?php 
                            foreach($fung->katbuku($b['BukuID']) as $b){ ?>
                            <span class="badge badge-primary"><?= $b['NamaKategori']; ?></span>
                        
                        <?php    }
                    ?>
                    </td>
                    <td>
                    <!-- star masalah  -->
                    <?php 
                        if($_SESSION['data']['Role'] == 'peminjam'){ ?>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#pinjam<?= $b['BukuID'] ?>">Pinjam</button>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ulas<?= $b['BukuID'] ?>">Ulas</button>
                    <?php } ?>
                    <?php 
                        if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $b['BukuID'] ?>">Edit</button>
                  <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapusdatabuku&BukuID=<?= $b['BukuID'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
              <?php } ?>
                    <!-- end masalah -->

        
                </td>
                </tr>
             <?php   }
            ?>
        </tbody>
    </table>
</div>
   <!-- Modal Data -->
   <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Buku</title>
  </head>

  <body>

  <div class="modal fade" id="tambahdatabuku">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Tambah Buku</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="dashboard.php?page=postdatabuku" method="post">
                

                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="Judul" placeholder="Masukkan Judul " class="form-control">
                </div>

                <div class="form-group">
                  <label>Penulis</label>
                  <input type="text" name="Penulis" placeholder="Masukkan Penulis"class="form-control">
                </div>

                <div class="form-group">
                  <label>Penerbit</label>
                  <input type="text" name="Penerbit" placeholder="Masukkan Penerbit"class="form-control">
                </div>

                <div class="form-group">
                  <label>Tahun Terbit</label>
                  <input type="number" name="TahunTerbit" placeholder="Masukkan Tahun Terbit"class="form-control">
                </div>
                <div class="form-group">
                <?php 
                        foreach($fung->viewKategori() as $b){ ?>
                            <div><input type="checkbox" name="Kategori" value="<?= $b['KategoriID'] ?>"> <?= $b['NamaKategori'] ?></div>
                      <?php  }
                    ?>
              </div>
            </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>

              </div>
            </div>
          </div>
        </form>
</div>
</div>

</div>
</div>


    <!-- /.modal untuk edit  -->
    
    <?php 
            foreach($fung->viewbuku() as $b){ ?>
<div class="modal fade" id="edit<?= $b['BukuID']?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Buku</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <form action="dashboard.php?page=updatedatabuku" method="post">
                            <div class="modal-body">
                        
                                <input type="text" name="BukuID" value="<?= $b['BukuID']; ?>" hidden>
                                <div class="form-group">
                                    <label for="">Data Buku</label>
                                    <input type="text" class="form-control" name="Judul" value="<?= $b['Judul']; ?>" required="">
                                    <input type="text" class="form-control" name="Penulis" value="<?= $b['Penulis']; ?>" required="">
                                    <input type="text" class="form-control" name="Penerbit" value="<?= $b['Penerbit']; ?>" required="">
                                    <input type="text" class="form-control" name="TahunTerbit" value="<?= $b['TahunTerbit']; ?>" required="">
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                   
                                </div>
                                
                               
                        </form>
                        
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            </div>
            </div>
            
          <?php  }
            ?>
            
            <!-- /.modal peminjaman -->

            <?php 
        foreach($fung->viewbuku() as $b) { ?>
            <div class="modal fade" id="pinjam<?= $b['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=ajukanpeminjaman" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $b['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $b['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?= $b['Penulis'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $b['Penerbit'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="number" class="form-control" name="tahun" value="<?= $b['TahunTerbit'] ?>" disabled>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ajukan Pinjam Buku</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php  }
    ?>

<?php 
        foreach($fung->viewbuku() as $b) { ?>
            <div class="modal fade" id="ulas<?= $b['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=postulasanbuku" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $b['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $b['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Ulasan</label>
                <textarea name="ulasan" class="form-control" cols="30" rows="10" required></textarea>
              </div>
              <div class="form-group">
                <label for="">Rating</label>
                <select name="rating" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php  }
    ?>