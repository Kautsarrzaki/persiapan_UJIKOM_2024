<!-- Default box -->
   

<div class="card">
            <div class="card-body">
                <h1> Data Petugas</h1>
<hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#petugas">Tambah Petugas</button>
</div>
<div class="table-responsive">

<table class= "table table-bordered" id="example1" width="100%" cellspacing="0">
        <thead>
            <tr>
               <th>No</th>
               <th>Nama Lengkap</th>
               <th>Username</th>
                <th>Email</th>
               <th>Alamat</th>
               <th>Aksi</th>
            </tr>
        </thead>
        <tbody> 

        <?php 
         $no = 1;
                    foreach($fung->datapetugas() as $d){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['NamaLengkap']?></td>
                        <td><?= $d['Username']?></td>
                          <td><?= $d['Email']?></td>
                        <td><?= $d['Alamat']?></td>
                        
                <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reset">Reset</button>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $d['UserID'] ?>">Edit</button>
                <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapuspetugas&UserID=<?=$d['UserID']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus </a>
              </td>
                    </tr>
                <?php }
                ?>
                <tbody>
                    </table>
                     </div>
                     </div>

<div class="modal fade" id="petugas">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Petugas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="dashboard.php?page=postregisterpetugas" method="post" id="logform">
<div class="card-body">
    <div class="form-group">
<input type="text" class="form-control" name="UserID" hidden>
        </div>
        <div class="form-group">
            <label>Nama Lengkap </label>
<input type="text" class="form-control" name="NamaLengkap">
        </div>
        <div class="form-group">
            <label>Username</label>
<input type="text" class="form-control" name="Username">
        </div>
        <div class="form-group">
            <label>Password </label>
<input type="text" class="form-control" name="Password">
        </div>
        <div class="form-group">
            <label>Email</label>
<input type="text" class="form-control" name="Email">
        </div>
        <div class="form-group">
            <label>Alamat</label>
<textarea name="Alamat" class="form-control" cols="30" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Daftar</button>

</div>
 </form> 
    </div> 
    </div>
    </div>
        <?php

        foreach ($fung->datapetugas() as $k) { ?>
        <div class="modal fade" id="edit<?= $k['UserID'] ?>">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Edit Petugas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"></span>
    </button>
    </div>

            <form action="dashboard.php?page=updatepetugas" method="post">
                <div class="card-body">
            <div class="modal-body">
            <input type="text" name="UserID" value="<?= $k['UserID']; ?>" hidden>
            </div>

            <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="NamaLengkap" value="<?= $k['NamaLengkap']; ?>" required="">
            </div>

            <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="Username" value="<?= $k['Username']; ?>" required="">
            </div>

          
            <input type="password" class="form-control" name="Password" value="<?= $k['Password']; ?>" hidden>
           

            <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="Email" value="<?= $k['Email']; ?>" required="">
            </div>

            <div class="form-group">
            <label>Alamat</label>
            <textarea name="Alamat" class="form-control" cols="30" rows="5" required=""><?= $k['Alamat']; ?></textarea>
            </div>
            <div class="modal-fonter justify-content-heturen">

             <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>                        
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
        
<?php }
    ?>
    <!-- modal reset -->
<?php
foreach ($fung->datapetugas() as $k) { ?>
    <div class="modal fade" id="reset">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="dashboard.php?page=resetpassword" method="POST" id="logForm">
                    <div class="card-body">
                        <input type="hidden" name="UserID" value="<?= $k['UserID']; ?>">
                        <div class="form-group">
                            <p>
                                Apakah anda yakin mengatur ulang kata sandi?
                            </p>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reset Password</button>
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
<!-- /.modal -->