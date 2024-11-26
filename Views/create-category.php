<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';

if(!isset($_SESSION["full_name"])) {
  header("Location: login.php");
  exit;
}

if (isset($_POST["submit"])) {
  $category = [
    "name_category" => $_POST["name_category"]
  ];
  if(strlen($_POST["name_category"]) > 225){
    echo "<script>alert('Kategori harus dibawah 225 karakter!'); window.location.href = 'create-category.php';</script>";
    die;  
  }
  $categories = new Category();
  $result = $categories->create($category);
  if($result !== false){
    echo "<script>alert('Kategori baru ditambahkan dengan nama {$result['name_category']}'); window.location.href = 'create-category.php';</script>";
  } else{
    echo "<script>alert('Kategori gagal ditambahkan'); window.location.href = 'create-category.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include('../components/layout/navbar.php'); ?>

      <?php include('../components/layout/sidebar.php'); ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Kategori</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6 p-2 d-flex justify-content-center align-items-center">
                <img src="../assets/img/illustrations/fastfood.png" style="width: 300px;" alt="">
              </div>
              <div class="col-12 col-md-6 col-lg-6 mx-auto">
                <div class="card w-full">
                  <form action="" method="POST" class="card-body">
                    <div class="form-group">
                      <label for="name_category">Nama Kategori</label>
                      <input type="text" name="name_category" id="name_category" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                      <button type="submit" name="submit" class="btn btn-primary ">Tambahkan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include('../components/layout/footer.php'); ?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>

</html>