
<div class="header-inner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="nav-area">
          <!-- Main Menu -->
          <nav class="mainmenu">
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">

<?php
$url    = $_SERVER["REQUEST_URI"];
$cadena = substr($url, 15);
print_r($cadena);

switch ($cadena) {
    case 'index.php':
        echo "<li class='active'><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'nosotros.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li class='active'><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'servicios.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li class='active'><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'catalogo.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li class='active'><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'cursos.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "
                <li  class='active'><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'diplomados.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "
                <li  class='active'><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li><a href='cursos.php'>Cursos</a></li>
                        <li class='active'><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'intranet.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li class='active'><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'aulaVirtual.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li class='active'><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'contacto.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li class='active'><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'cosecha-de-agua.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'matricula.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
    case 'asesor.php':
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='nosotros.php'>Quienes somos</a></li>";
        echo "<li><a href='servicios.php'>Servicios</a></li>";
        echo "<li><a href='catalogo.php'>Catálogo</a></li>";
        echo "<li><a href='cursos.php'>Capacitación<i class='fa fa-angle-down'></i></a>
                    <ul class='drop-down'>
                        <li class='active'><a href='cursos.php'>Cursos</a></li>
                        <li><a href='diplomados.php'>Diplomados</a></li>
                    </ul>
                </li>";
        echo "<li><a href='intranet.php'>Intranet</a></li>";
        echo "<li><a href='aulaVirtual.php'>Aula Virtual</a></li>";
        echo "<li><a href='contacto.php'>Contacto</a></li>";
        break;
}
?>

              </ul>
            </div>
          </nav>
          <!--/ End Main Menu -->
          <!-- Social -->
          <ul class="social">
            <!--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
            <li><a href="https://www.facebook.com/OELT-Constructora-145056969537957"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/oeltconstructora/"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://twitter.com/OConstructora"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/embed/OqP30cAeLQc"><i class="fa fa-youtube"></i></a></li>
            <li><a href="https://www.linkedin.com/in/oelt-constructora-0b0b29167/"><i class="fa fa-linkedin"></i></a></li>
            <!--<li><a href="#"><i class="fa fa-behance"></i></a></li>-->
          </ul>
          <!--/ End Social -->
        </div>
      </div>
    </div>
  </div>
</div>
