<?php 
//App global vars
include 'data/vars.php'; 
//Required classes
require_once 'data/class/Product.php';
//Objects
$products = Product::getAll();
//Html head
include 'element/head.php'; 
//CSS
echo '<link rel="stylesheet" href="css/cards.css">';
//Navbar
include_once 'element/navbar.php';
//Side bar
include_once 'element/sidebar.php';
//Html tags
echo '<div class="sub-head teal">';
  echo '<p>Inventario</p>';
echo '</div>'; 

echo '<div class="row">';
  echo '<div class="col s12">';        
    echo '<p class="center-align" style="margin-bottom: 20px;font-weight: bold;">Administra tus productos o servicios de manera sencilla.</p>';        
  echo '</div>';        
echo '</div>';     

echo '<div class="row">'; 
 echo '<div class="col s12">';      
    echo '<div class="card-panel">';        
      echo '<form action="inventory.php">';
        echo '<table class"highlight">';  
          echo '<thead>';
            echo '<tr>';
              echo '<th>Nombre</th>';
              echo '<th>Precio compra</th>';
              echo '<th>Precio venta</th>';
              echo '<th>Inventario minimo</th>';
              echo '<th>Inventario actual</th>';
            echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
            if(!$products){
              echo 'Sin productos';
            }else{
              foreach($products as $item):
                echo '<tr>';
                  echo '<td>'.$item['name'].'</td>';
                  echo '<td>$ '.$item['real_price'].'</td>';
                  echo '<td>$ '.$item['sale_price'].'</td>';
                  echo '<td>'.$item['stock'].'</td>';
                  echo '<td>'.$item['min_stock'].'</td>';
                echo '</tr>';
              endforeach;
            }
          echo '</tbody>';
       echo '</table>';
      echo '</form>';    
    echo '</div>';    
  echo '</div>'; 
echo '</div>'; 
//Footer
include 'element/footer.php';
?>       