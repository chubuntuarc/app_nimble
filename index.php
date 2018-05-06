<?php 
//App global vars
include 'data/vars.php'; 
//Html head
include 'element/head.php'; 
//CSS
echo '<link rel="stylesheet" href="css/cards.css">';
//Navbar
include_once 'element/navbar.php';
//Side bar
include_once 'element/sidebar.php';
//html tags
echo '<div class="row" style="height: 30px;margin-top: 50px;background-color: '.$main_color.';margin-bottom: 0px;"></div>';
?>

<div class="row">
  <div class="col s12 m3">
    <div class="card horizontal">
      <div class="card-image">
        <img src="images/pos.PNG">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Modulo de punto de venta.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col s12 m9">
    <div class="card horizontal">
      <div class="card-image">
        <img src="images/pos.PNG">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <h5>Más información</h5>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
//Footer
include 'element/footer.php';
?>