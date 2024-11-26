<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';
require_once __DIR__ . '/../Model/Items.php';

if (!isset($_SESSION["full_name"])) {
  header('Location: login.php');
  exit;
}

$categories = new Category();
$categories = $categories->all();

$menu = new Item();

  if(isset($_POST["submit"])){
    $data = [
    "post" => $_POST,
    "files" => $_FILES
  ];

  $result = $menu->create($data);

  if (gettype($result) == "string") {
    echo "<script>
    alert('{$result}');
    window.location.href = 'create-menu.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Berhasil Ditambahkan');
    window.location.href = 'create-menu.php';
    </script>";
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
   
  <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include ('../components/layout/navbar.php')?>
      <?php include ('../components/layout/sidebar.php')?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Menu</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-body d-flex justify-content-center align-items-center">
                    <img src="../skate.png" style="width: 400px;">
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <form class="card-body" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name_item">Nama Menu</label>
                      <input name="name_item" id="name_item" type="text" class="form-control">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="attachment" class="form-control-label">Gambar</label>
                          <div class="custom-file">
                            <input type="file" name="attachment" class="custom-file-input" id="attachment">
                            <label class="custom-file-label">Choose File</label>
                          </div>
                      </div>
                    <div class="form-group">
                      <label for="category_id">Pilih Kategori</label>
                      <select  name="category_id" id="category_id" class="form-control selectric">
                        <?php foreach ($categories as $category) : ?>
                          <option value="<?= $category['id_category'] ?>" ><?= $category['name_category'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="price">Harga</label>
                      <input name="price" id="price" type="number" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                      <button name="submit" type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include ('../components/layout/footer.php')?>
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
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>


  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>
</html>