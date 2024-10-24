<?php 
include 'koneksi.php' ;
session_start();

$queryPengaturan = mysqli_query($koneksi, "SELECT * FROM general_setting ORDER BY id DESC");
$rowPengaturan = mysqli_fetch_assoc($queryPengaturan);
if (isset($_POST['simpan'])) {
    $website_name = $_POST['website_name'];
    $website_link = $_POST['website_link'];
    $id = $_POST['id'];
    $website_phone = $_POST['website_phone'];
    $website_email = $_POST['website_email'];
    $website_address = $_POST['website_address'];
    
    //mencari data dalam table pangaturan. Jika ada maka akan di UPDATE, jika tidak ada akan di INSERT

    if(mysqli_num_rows($queryPengaturan) > 0 ) {
        if(!empty($_FILES['foto']['name'])) {
            $nama_foto = $_FILES['foto']['name'];
            $ukuran_foto = $_FILES['foto']['size'];
    
            //img extension
            $ext = array('png','jpg','jpeg');
            $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);
    
            //Jika Extensi Foto tidak ada yang terdaftar di array extension
        if(!in_array($extFoto, $ext)) {
                echo 'Extention Tidak Ditemukan';
                die();
            }else{
                // pindahkan gambar 
                move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/'.$nama_foto);
                
                $update = mysqli_query($koneksi,"UPDATE general_setting SET website_name= '$website_name', website_link='$website_link', logo='$$nama_foto' ,website_phone='$website_phone', website_email='$website_email' , website_address='$website_address' WHERE id='$id'");
                
            }
        }else{
            $update = mysqli_query($koneksi,"UPDATE general_setting SET website_name= '$website_name', website_link='$website_link', website_phone='$website_phone', website_email='$website_email' , website_address='$website_address' WHERE id='$id'");
            
        }
    }else {
        if(!empty($_FILES['foto']['name'])) {
            $nama_foto = $_FILES['foto']['name'];
            $ukuran_foto = $_FILES['foto']['size'];
    
            //img extension
            $ext = array('png','jpg','jpeg');
            $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);
    
            //Jika Extensi Foto tidak ada yang terdaftar di array extension
        if(!in_array($extFoto, $ext)) {
                echo 'Extention Tidak Ditemukan';
                die();
            }else{
                // pindahkan gambar 
                move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/'.$nama_foto);
                $sql = mysqli_query($koneksi, "INSERT INTO general_setting (website_name, website_link,logo) VALUES ('$website_name','$website_link','$nama_foto')");
                
            }
        }else{
            $sql = mysqli_query($koneksi,"INSERT INTO general_setting(website_name,website_link) VALUES ('$website_name','$website_link')");
            
        }
       
    }
        header('location:pengaturan-website.php');
 
}
$rowPengaturan = mysqli_fetch_assoc($queryPengaturan);

// Parameter Edit
// $id = isset($_GET['edit']) ? $_GET['edit']: '';
// $queryEdit = mysqli_query($koneksi, "SELECT * FROM general_setting WHERE id = '$id'");
// $rowEdit = mysqli_fetch_assoc($queryEdit);

// if (isset($_POST['edit'])) {
//     $nama = $_POST['nama'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     //jika password di isi oleh user
//     if($_POST['password']){
//         $password = $_POST['password'];
//     }else{
//         $password = $rowEdit['password'];
//     }

//     $update = mysqli_query($koneksi,"UPDATE users SET nama='$nama', email='$email', password='$password' WHERE id='$id'");
//     header("location:user.php?ubah=berhasil");

// }
?>

<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../asset/admin/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php include 'inc/head.php' ?>
  </head>
    <style>
        placeholder{
            margin-top: 2rem;
        }
    </style>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

       <?php include 'inc/sidebar.php'?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include 'inc/nav.php' ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
              <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card mt-5">
                      <div class="card-header fs-4"><?php echo isset($_rowPengaturan['edit']) ? 'Edit' : 'Tambah' ?> User</div>
                      <div class="card-body">
                      <?php if(isset($_GET['hapus'])) : ?>
                        <div class="alert alert-success" role="alert">
                         Data berhasil Di hapus
                        </div>
                      <?php endif ; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id" id="" value="<?php echo isset($rowPengaturan['id']) ? $rowPengaturan['id'] : '' ?>" required>
                            <div class="mb-3 row">
                              <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="">Name Website</label>
                                    <input type="text" class="form-control" name="website_name" id="" placeholder="Masukan Nama website" value="<?php echo isset($rowPengaturan['website_name']) ? $rowPengaturan['website_name'] : '' ?>" required>

                                </div>
                                <div class="mb-3">
                                    <label for="">Nomor Telepon</label>
                                    <input type="number" class="form-control" name="website_phone" id="" placeholder="Masukan nomor telepon" value="<?php echo isset($rowPengaturan['website_phone']) ? $rowPengaturan['website_phone'] : '' ?>" required>

                                </div>
                                <div class="mb-3">
                                    <label for="">Email Address</label>
                                    <input type="email" class="form-control" name="website_email" id="" placeholder="Masukan email website" value="<?php echo isset($rowPengaturan['website_email']) ? $rowPengaturan['website_email'] : '' ?>" required>

                                </div>
                                
                              </div>
                              <div class="col-sm-6 mb-4">
                              <div class="mb-3">
                              <label for="">Link Website</label>
                              <input type="url" class="form-control" name="website_link" id="" placeholder="Masukan Link Website anda" value="<?php echo isset($rowPengaturan['website_link']) ? $rowPengaturan['website_link'] : '' ?>" required>
                              </div>
                              <div class="mb-3">
                                    <label for="">Website Address</label>
                                    <input type="text" class="form-control" name="website_address" id="" placeholder="Masukan alamat webn" value="<?php echo isset($rowPengaturan['website_address']) ? $rowPengaturan['website_address'] : '' ?>" required>

                                </div>
                                <div class="mb-3">
                                <label for="">Uplode Foto</label>
                                <input type="file" class="form-control" name="foto" id="" >
                                </div>
                              </div>
                              <div class="col-sm-6">
                             <div class="mb-3">
                             <label for="">Password</label>
                             <input type="password" class="form-control" name="password" id="" placeholder="Masukan password anda" >
                             </div>
                              </div>
                              <div class="col-sm-6">
                                
                              </div>
                              <div class="col-sm-6">
                              <button type="submit" class=" btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>
                              </div>
                            </div>
                        </form>
                          
                      </div>
                    </div>
                  </div>
                </div>
              </div>
         
            <!-- / Content -->

            <!-- Footer -->
             <div class="container">
              <div class="row ">
              <?php include 'inc/footer.php'?>
              </div>
             </div>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../asset/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../asset/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="../asset/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="../asset/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../asset/admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../asset/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../asset/admin/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../asset/admin/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
