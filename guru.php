<?php
include('koneksi.php');
$nama_guru_edit       = "";
$jenis_kelamin_edit      = "";
$tempat_lahir_edit     = "";
$tanggal_lahir_edit   = "";
$alamat_edit = "";
$agama_edit = "";

if (isset($_GET['proses'])) 
{
        $id = $_GET['id'];
        if ($_GET['proses']=='hapus') 
    {
        $sql = "DELETE FROM guru WHERE id_guru='$id'";
        $delete = mysqli_query($koneksi,$sql);
        if (!$delete) 
        {
            echo "Gagal di Delete";
        }
            else 
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil Di Delete!</strong> Mudah-mudahan datanya sudah ke delete.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
            ?>
            <script>
                setTimeout(function () 
                {
                    window.location.href= 'http://localhost/20-siakad-ferdi/guru.php';
                }   ,1500); // 1,5 seconds
            </script>
            <?php

    }
        if ($_GET['proses']=='edit') 
    {   
        $sql = "SELECT * FROM guru WHERE id_guru = '$id'";
        $select = mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($select);
        $nama_guru_edit        = $data    ['nama_guru'];
        $jenis_kelamin_edit    = $data    ['jenis_kelamin'];
        $tempat_lahir_edit     = $data    ['tempat_lahir'];
        $tanggal_lahir_edit    = $data    ['tanggal_lahir'];
        $alamat_edit           = $data    ['alamat'];
        $agama_edit            = $data    ['agama'];
    }
}


        if (isset($_POST['simpan'])) 
{
        $nama = $_POST['nama_guru'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];

        if (isset($_GET['proses']))
    {
        $id = $_GET['id'];
        $sql = "UPDATE guru SET nama_guru = '$nama',
        jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', agama = '$agama'
        WHERE id_guru = '$id'";
        $update = mysqli_query($koneksi,$sql);
    }   else
    {

            $sql = "INSERT INTO guru(nama_guru,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,agama) values('$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat','$agama')";   
            $insert = mysqli_query($koneksi,$sql);
    
            if(!$insert)
        {
            echo $gagal = "Data Gagal Disimpan";
        }   
            else
        {
            echo $sukses ='
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil Di Simpan!</strong> Selamat data anda telah disimpan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
        }
    }
}
?>
<div class="alert alert-primary" role="alert">

</div>
    <div class="container">
        <div class="row"><!--row ke-1 -->
            <div class="col-5">
                <div class="card text-bg-info" style="max-width: 100rem;">
                    <div class="card-header"><h2>Data Guru</h2>
                        <div class="card-body">
                            
                            <form action="" method="post">
                                    <div class="form-floating mb-5">
                                        <input placeholder="nama_guru" value="<?php echo $nama_guru_edit ?>" class="form-control" type="text" name="nama_guru" id="floatingInput" required>
                                        <label for="floatingInput">Nama Guru</label>
                                    </div>
                                    
                                    <div class="form-floating mb-5">
                                        <input placeholder="jenis_kelamin" value="<?php echo $jenis_kelamin_edit ?>" class="form-control" type="text" name="jenis_kelamin" id="floatingInput" required>
                                        <label for="floatingInput">Jenis Kelamin</label>
                                    </div>

                                    <div class="form-floating mb-5">
                                        <input placeholder="tempat_lahir" value="<?php echo $tempat_lahir_edit ?>" class="form-control" type="text" name="tempat_lahir" id="floatingInput" required>
                                        <label for="floatingInput">Tempat Lahir</label>
                                    </div>

                                    <div class="form-floating mb-5">
                                        <input placeholder="tanggal_lahir" value="<?php echo $tanggal_lahir_edit ?>" class="form-control" type="text" name="tanggal_lahir" id="floatingInput" required>
                                        <label for="floatingInput">Tanggal Lahir</label>
                                    </div>

                                    <div class="form-floating mb-5">
                                        <input placeholder="alamat" value="<?php echo $alamat_edit ?>" class="form-control" type="text" name="alamat" id="floatingInput" required>
                                        <label for="floatingInput">Alamat</label>
                                    </div>

                                    <div class="form-floating mb-5">
                                        <input placeholder="agama" value="<?php echo $agama_edit ?>" class="form-control" type="text" name="agama" id="floatingInput" required>
                                        <label for="floatingInput">Agama</label>
                                    </div>
                                    <div class="form-group">
                                    <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-7">
                <table class="table table-striped">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Jenis Kelamin</td>
                        <td>Tempat Lahir</td>
                        <td>Tanggal Lahir</td>
                        <td>Alamat</td>
                        <td>Agama</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM guru";
                    $select = mysqli_query($koneksi,$sql);
                    $no = 1;

                    while ($data = mysqli_fetch_assoc($select)) 
                {
                        
                    

                    ?>
                     <tr>
                        <td><?php echo $no ;?></td>
                        <td><?php echo $data['nama_guru'];?></td>
                        <td><?php echo $data['jenis_kelamin'];?> </td>
                        <td><?php echo $data['tempat_lahir'];?></td>
                        <td><?php echo $data['tanggal_lahir'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['agama'];?></td>
                        <td>
                            <a href="?proses=edit&id=<?php echo $data['id_guru'];?>">
                            <button class="btn btn-warning">Edit</button>
                            </a>
                            <a href="?proses=hapus&id=<?php echo $data['id_guru'];?>">
                            <button class="btn btn-danger">Hapus</button>
                           </a>
                        </td>
                     </tr>
                        <?php
                         $no++;
                }
                    ?>
    
                </table>
           </div>
           <div class="col-6"></div>
         </div><!--penutup row ke-2 -->
            </div>
        </div>
    </div><!--penutup tag row 1-->

 
    </div>
