<?php 
//App global vars
include 'data/vars.php'; 
//Required classes
require_once 'data/class/Product.php';
//Objects
$products = Product::getAll();
//Save new product script
if(isset( $_POST['save'] ) == 'new'){
  $new_product = new Product($_POST['name'], $_POST['description'],"", 1, $_POST['real_price'], $_POST['sale_price']);
  $new_product->save();
  Product::setStock($_POST['quantity'],$_POST['quantity_min'],$_POST['save']);
  header('Location: stock.php');
}
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
echo '<a class="waves-effect waves-light btn right z-depth-3 modal-trigger" href="#modal_new" style="margin-top: -10px;background-color:'.$main_color.'">nuevo producto</a>';
echo '</div>';     

echo '<div class="row">'; 
 echo '<div class="col s12">';      
    echo '<div class="card-panel">';        
      echo '<form action="">';
        echo '<table class"responsive-table">';  
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
//Product modal
  echo '<div id="modal_new" class="modal" style="max-height: 80%;">';
    echo '<div class="modal-content">';
      echo '<h4>Nuevo producto</h4>';
      echo '<p>Registra un nuevo producto en tu inventario</p>';
      echo '<form action="stock.php" class="col s12" method="post">';
          echo '<div class="row">';
            echo '<div class="input-field col s12">';
            echo '<input id="name" name="name" type="text" class="validate">';
            echo '<label for="name">Nombre del producto</label>';
            echo '</div>'; 
          echo '</div>';
          echo '<div class="row">';
            echo '<div class="input-field col s12">';
            echo '<input id="description" name="description" type="text" class="validate">';
            echo '<label for="description">Descripción</label>';
            echo '</div>';
          echo '</div>'; 
          echo '<div class="row">';
            echo '<div class="input-field col s12 m6">';
            echo '<input id="real_price" name="real_price" type="text" class="validate">';
            echo '<label for="real_price">Precio de compra</label>';
            echo '</div>';
            echo '<div class="input-field col s12 m6">';
            echo '<input id="sale_price" name="sale_price" type="text" class="validate">';
            echo '<label for="sale_price">Precio de venta</label>';
            echo '</div>';
          echo '</div>'; 
          echo '<div class="row">';
            echo '<div class="input-field col s12 m6">';
            echo '<input id="quantity" name="quantity" type="text" class="validate">';
            echo '<label for="quantity">Inventario</label>';
            echo '</div>';
            echo '<div class="input-field col s12 m6">';
            echo '<input id="quantity_min" name="quantity_min" type="text" class="validate">';
            echo '<label for="quantity_min">Inventario minimo</label>';
            echo '</div>';
          echo '</div>'; 
    echo '</div>';
    echo '<input type="hidden" name="save" id="save" value="new">';
    echo '<div class="modal-footer">';
      echo '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>';
      echo '<button class="modal-action modal-close waves-effect waves-green btn-flat right" type="submit" name="action" style="color:'.$main_color.'">Guardar';
      echo '<i class="material-icons right">check</i>';
      echo '</button>';
    echo '</div>';
      echo '</form>'; 
  echo '</div>';
//Footer
include 'element/footer.php';
?>       