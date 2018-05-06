<div navbar-fixed>
<nav>
    <div class="nav-wrapper white">
      <a href="/app_nimble/" class="brand-logo hide-on-large-only" <?php echo 'style="color: '.$main_color.'"' ?>><?php echo $app_name ?></a>
      <a href="/app_nimble/" class="brand-logo hide-on-med-and-down" <?php echo 'style="color: '.$main_color.'"' ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $app_name ?><span style="font-size:22px;color:#929292;margin-left:6px;" id="module-name"></span></a>
      <a href="#" data-activates="slide-out" class="button-collapse show-on-large" style="color:#929292;"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <!--<li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="sass.html"><i class="material-icons">stars</i></a></li>
       <li><a href="sass.html"><i class="material-icons">restaurant_menu</i></a></li>-->
        <li></li><p style="color:#929292;position: fixed;margin-top: -3px;right: 60px;font-size:11px;"><?php echo strftime("%d/%m/%Y");?></p></li>
        <li></li><p style="color:#929292;position: fixed;margin-top: 10px;right: 70px;font-size:10px;" id="time"></p></li>
        <li></li><a href="#!user"><img class="circle responsive-img" style="height: 32px;position: fixed;margin-top: 18px;right: 20px;" src="../app_nimble/images/profile/0.jpg"></a></li>
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
    var pathname = window.location.pathname;
    if(pathname == '/nimble_pos/'){
      $('#module-name').text('Punto de venta');
       }else if(pathname == '/nimble_tickets/'){
      $('#module-name').text('Tickets de servicio');
       }
    $('.tooltipped').tooltip();
  });
    
    function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();
  </script>
  
  </nav>
   </div>