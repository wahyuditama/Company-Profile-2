<?php 
include 'koneksi.php' ;
session_start();
// Munculkan / Pilih sebuah kolom dari tabel users(database)
$query = mysqli_query($koneksi, "SELECT * FROM instruktur ");
//untuk menjadikan hasil query(data dari queryUser) = menjadi sebuah data objek
//Delete 
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = mysqli_query($koneksi, "DELETE FROM instruktur WHERE id = '$id'");
  header("Location:instruktur.php?login=berhasil");
}
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
                      <div class="card-header">Data Instruktur </div>
                      <div class="card-body">
                      <?php if(isset($_GET['hapus'])) : ?>
                        <div class="alert alert-success" role="alert">
                         Data berhasil Di hapus
                        </div>
                      <?php endif ; ?>
                      <div align="right" class="mb-3">
                        <a href="tambah-instruktur.php" class="btn btn-primary">Tambah</a>
                      </div>
                          <div class="table">
                            <table class="table table-responsive table-bordered">
                              <thead>
                                <tr>
                                  <th>Nomor</th>
                                  <th>Nama </th>
                                  <th>Jurusan</th>
                                  <th>Foto</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $no = 1;
                                while($row = mysqli_fetch_assoc($query)) { ?> 
                                <tr>
                                 <td><?php echo $no++ ?></td>
                                 <td><?php echo $row['nama_instruktur'] ?></td>
                                 <td><?php echo $row['jurusan_instruktur'] ?></td>
                                 <td>
                                    <img width="200" src="upload/<?php echo $row['foto'] ?>" alt="">
                                 </td>
                                 
                                 <td>
                                  <a  href="tambah-instruktur.php?edit=<?php echo $row['id'] ?>"> 
                                      <span class="tf-icon btn btn-success bx bx-pencil"></span>
                                    </a> |
                                  <a  onclick="return confirm('Apakah antum yakin akan menghapus data ini??')" href="instruktur.php?delete=<?php echo $row['id'] ?>"></a>
                                     <span class="tf-icon btn btn-danger bx bx-trash bx-12px"></span>
                                    </a>
                                 </td>
                                 </tr>
                                 <?php } ?>
                                </tbody>
                                </table>
                         
                        </div>
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
