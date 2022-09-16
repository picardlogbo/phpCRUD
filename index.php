<!doctype html>
<html lang="zxx">

<head>
  <?php 
   require_once('database/Connect_dataBase.php');
  include('old/layout/head.php')
  ?>
</head>

<body>
   <!--::header part start::-->
   <?php include('old/layout/header.php')?>

  
    <!-- Header part end-->

  <div class="list">
    <div class="container">
      <div class="d-flex justify-content-between">
        <h4>Listes des Articles</h4>
        <a href="" class="btn btn-primary">Ajouter
        </a>
        <?php

              $sql = "SELECT * FROM produit";
              $result = $conn->query($sql);
              if ($result !== false) {

                  foreach ($result as $item) {

              ?>
                      <div class="single_product_item">
                          <img src="img/product/product_1.png" alt="">
                          <div class="single_product_text">
                              <h4><?= $item['libelle']?></h4>
                              <h3><?= $item['code']?> F</h3>
                              <h4><?= $item['prix']?></h4>
                              <h3><?= $item['description']?> F</h3>
                          </div>
                      </div>
              <?php                     }
              }
               ?>
      </div>
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Libelle</th>
            <th scope="col">Code</th>
            <th scope="col">Prix</th>
            <th scope="col">Designation</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Shoes</td>
            <td>2C6357</td>
            <td>1500</td>
            <td>Produit excellent</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
 
   
  <!-- breadcrumb start-->
  <!--================End Home Banner Area =================-->

  <!--::footer_part start::-->
  <?php include('old/layout/footer.php')?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <!-- jquery -->
  <script src="old/js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="old/js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="old/js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="old/js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="old/js/lightslider.min.js"></script>
  <!-- swiper js -->
  <script src="old/js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="old/js/owl.carousel.min.js"></script>
  <script src="old/js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="old/js/slick.min.js"></script>
  <script src="old/js/swiper.jquery.js"></script>
  <script src="old/js/jquery.counterup.min.js"></script>
  <script src="old/js/waypoints.min.js"></script>
  <script src="old/js/contact.js"></script>
  <script src="old/js/jquery.ajaxchimp.min.js"></script>
  <script src="old/js/jquery.form.js"></script>
  <script src="old/js/jquery.validate.min.js"></script>
  <script src="old/js/mail-script.js"></script>
  <script src="old/js/stellar.js"></script>
  <!-- custom js -->
  <script src="old/js/theme.js"></script>
  <script src="old/js/custom.js"></script>
</body>

</html>