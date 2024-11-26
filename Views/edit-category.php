<?php


require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';

$id = $_GET['id'];
// if(empty($id)) {
//     header("Location: index-category.php");
//     exit;
// }

$categories = new Category(); 
$detail_category = $categories->find($id);


if (isset($_POST["submit"])) {

  $category = [
    "name_category" => $_POST["name_category"]
  ];

  if(strlen(($_POST["name_category"])) > 255){
    echo "<script>alert('Kategori tidak boleh melebihi 255 karakter.');
    window.location.href = 'create-category.php';
    </script>";
    die();
  }

  $result = $categories->update($id, $category);
  if ($result !== false) {
    echo "<script>alert('Kategori berhasil diedit dengan nama {$result['name_category']}.');
    window.location.href = 'index-category.php';
    </script>";
  } else {
    echo "<script>alert('Kategori gagal diedit.');
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
            <h1>Edit Kategori</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-body d-flex justify-content-center align-items-center">
                    <img src="../Fastfood.png" style="width: 400px;">
                    </div>
                  </div>
                </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <form action="" method="post" class="card-body">
                    <div class="form-group">
                      <label for="name_category">Nama Kategori Baru</label>
                      <input type="text" name="name_category" id="name_category" class="form-control" value="<?= $detail_category[0]['name_category']?>">
                      <div class="d-flex justify-content-end mt-3">
                      <button class="btn btn-primary" type="submit" name="submit">Edit</button>
                    </div>
                    </div>

                    </form>
                  </div>
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

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>
</html>