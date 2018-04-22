<div navbar-fixed>
<nav>
    <div class="nav-wrapper" <?php echo 'style="background-color: '.$main_color.'"' ?>>
      <a href="/app_nimble/" class="brand-logo"><?php echo $app_name ?><span style="font-size:10px;" class="hide-on-med-and-down">Agiliza tus ideas</span></a>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <!--<li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="sass.html"><i class="material-icons">stars</i></a></li>
       <li><a href="sass.html"><i class="material-icons">restaurant_menu</i></a></li>
       <li><a href="sass.html"><i class="material-icons">favorite</i></a></li>-->
        <li><a class="tooltipped" data-position="bottom" data-tooltip="Mis gustos" href="likes.php"><i class="material-icons">grade</i></a></li>
        <li><a class="tooltipped" data-position="bottom" data-tooltip="Inventario" href="inventory.php"><i class="material-icons">description</i></a></li>
       <li><a class="tooltipped" data-position="bottom" data-tooltip="Lista de compras" href="list.php"><i class="material-icons">shopping_cart</i></a></li>
        <li><a href="#!" data-activates="slide-out" class="account">Mi cuenta</a></li> 
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Recomendaciones</a></li>
        <li><a href="badges.html">Inventario</a></li>
        <li><a href="collapsible.html">Favoritos</a></li>
        <li><a href="#!" data-activates="slide-out">Mi cuenta</a></li>
      </ul>
    </div>
  
  <script>
  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
  </script>
  
  </nav>
   </div>